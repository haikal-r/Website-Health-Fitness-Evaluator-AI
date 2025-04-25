@extends('admin.layouts.base')

@section('title', 'User Management')

@section('content')
<!-- Main Content -->
<div class="flex-1 overflow-auto">
    <!-- Top Nav -->
    <div class="bg-white p-4 flex justify-between items-center border-b border-gray-200">
        <div class="flex-1 mx-4">
            <form action="{{ route('admin.user-management') }}" method="GET">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" name="search" placeholder="Search users..." value="{{ request('search') }}" class="pl-10 pr-4 py-2 border border-gray-300 rounded-md w-64 focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
            </form>
        </div>
    </div>

    <!-- User Management Content -->
    <div class="p-12">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">User Management</h1>
            <div class="flex items-center space-x-2">
                <button id="add-user-button" class="bg-orange-500 text-white px-4 py-2 rounded-md flex items-center hover:bg-orange-600">
                    <i class="fas fa-plus mr-2"></i> Add New User
                </button>
            </div>
        </div>

        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif

        <!-- Users Table -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <th class="p-4">No.</th>
                            <th class="p-4">Name</th>
                            <th class="p-4">Email</th>
                            <th class="p-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($users as $key => $user)
                        <tr>
                            <td class="p-4 text-sm">{{ $users->firstItem() + $key }}</td>
                            <td class="p-4">
                                <div class="font-medium text-gray-900">{{ $user->name }}</div>
                            </td>
                            <td class="p-4 text-sm text-gray-500">{{ $user->email }}</td>
                            <td class="p-4 text-sm text-gray-500">
                                <div class="flex justify-end space-x-2">
                                    <button type="button" class="text-blue-500 hover:text-blue-700 edit-user"
                                            data-user-id="{{ $user->id }}"
                                            data-user-name="{{ $user->name }}"
                                            data-user-email="{{ $user->email }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="text-red-500 hover:text-red-700 delete-user" data-user-id="{{ $user->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="p-4 text-center text-gray-500">No user data available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="border-t border-gray-200 px-4 py-3 flex items-center justify-between">
                <div class="flex-1 flex justify-between sm:hidden">
                    @if($users->onFirstPage())
                        <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-400 bg-gray-100">
                            Previous
                        </span>
                    @else
                        <a href="{{ $users->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Previous
                        </a>
                    @endif

                    @if($users->hasMorePages())
                        <a href="{{ $users->nextPageUrl() }}" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Next
                        </a>
                    @else
                        <span class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-400 bg-gray-100">
                            Next
                        </span>
                    @endif
                </div>
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Showing <span class="font-medium">{{ $users->firstItem() ?? 0 }}</span> to <span class="font-medium">{{ $users->lastItem() ?? 0 }}</span> of <span class="font-medium">{{ $users->total() }}</span> users
                        </p>
                    </div>
                    <div>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div id="add-user-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-medium text-gray-900">Add New User</h3>
                <button type="button" class="text-gray-400 hover:text-gray-500 close-modal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="p-6">
            <form id="add-user-form" action="{{ route('admin.user-management.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="button" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-md mr-2 close-modal">Cancel</button>
                    <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded-md">Create User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div id="edit-user-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-medium text-gray-900">Edit User</h3>
                <button type="button" class="text-gray-400 hover:text-gray-500 close-modal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="p-6">
            <form id="edit-user-form" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit-user-id" name="user_id">
                <div class="mb-4">
                    <label for="edit-name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input type="text" id="edit-name" name="name" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                </div>
                <div class="mb-4">
                    <label for="edit-email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="edit-email" name="email" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                </div>
                <div class="mb-4">
                    <label for="edit-password" class="block text-sm font-medium text-gray-700 mb-1">Password <span class="text-gray-500 text-xs">(Leave empty if you don't want to change)</span></label>
                    <input type="password" id="edit-password" name="password" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
                <div class="flex justify-end mt-6">
                    <button type="button" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-md mr-2 close-modal">Cancel</button>
                    <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded-md">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete User Modal -->
<div id="delete-user-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-medium text-gray-900">Delete User</h3>
                <button type="button" class="text-gray-400 hover:text-gray-500 close-modal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="p-6">
            <p class="text-gray-700 mb-6">Are you sure you want to delete this user? This action cannot be undone.</p>
            <div class="flex justify-end">
                <button type="button" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-md mr-2 close-modal">Cancel</button>
                <form id="delete-user-form" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Delete User</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM fully loaded');

        // Modal functionality
        const addUserButton = document.getElementById('add-user-button');
        const addUserModal = document.getElementById('add-user-modal');
        const editUserModal = document.getElementById('edit-user-modal');
        const deleteUserModal = document.getElementById('delete-user-modal');
        const closeModalButtons = document.querySelectorAll('.close-modal');

        console.log('Add User Button:', addUserButton);
        console.log('Edit User Buttons:', document.querySelectorAll('.edit-user').length);
        console.log('Delete User Buttons:', document.querySelectorAll('.delete-user').length);

        // Add User Button
        if (addUserButton) {
            addUserButton.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Add user button clicked');
                addUserModal.classList.remove('hidden');
            });
        }

        // Edit User Buttons
        const editButtons = document.querySelectorAll('.edit-user');
        editButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Edit button clicked');

                const userId = this.getAttribute('data-user-id');
                const userName = this.getAttribute('data-user-name');
                const userEmail = this.getAttribute('data-user-email');

                console.log('User ID:', userId);
                console.log('User Name:', userName);
                console.log('User Email:', userEmail);

                document.getElementById('edit-user-id').value = userId;
                document.getElementById('edit-name').value = userName;
                document.getElementById('edit-email').value = userEmail;
                document.getElementById('edit-password').value = '';

                const form = document.getElementById('edit-user-form');
                form.action = "{{ url('/admin/user-management') }}/" + userId;

                editUserModal.classList.remove('hidden');
            });
        });

        // Delete User Buttons
        const deleteButtons = document.querySelectorAll('.delete-user');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Delete button clicked');

                const userId = this.getAttribute('data-user-id');
                console.log('User ID to delete:', userId);

                const form = document.getElementById('delete-user-form');
                form.action = "{{ url('/admin/user-management') }}/" + userId;

                deleteUserModal.classList.remove('hidden');
            });
        });

        // Close Modal Buttons
        closeModalButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Close modal button clicked');

                addUserModal.classList.add('hidden');
                editUserModal.classList.add('hidden');
                deleteUserModal.classList.add('hidden');
            });
        });

        // Close modals when clicking outside
        window.addEventListener('click', function(event) {
            if (event.target === addUserModal) {
                addUserModal.classList.add('hidden');
            }
            if (event.target === editUserModal) {
                editUserModal.classList.add('hidden');
            }
            if (event.target === deleteUserModal) {
                deleteUserModal.classList.add('hidden');
            }
        });

        // Form submissions
        const addUserForm = document.getElementById('add-user-form');
        if (addUserForm) {
            addUserForm.addEventListener('submit', function(e) {
                console.log('Add user form submitted');
                // Form will submit normally
            });
        }

        const editUserForm = document.getElementById('edit-user-form');
        if (editUserForm) {
            editUserForm.addEventListener('submit', function(e) {
                console.log('Edit user form submitted');
                // Form will submit normally
            });
        }

        const deleteUserForm = document.getElementById('delete-user-form');
        if (deleteUserForm) {
            deleteUserForm.addEventListener('submit', function(e) {
                console.log('Delete user form submitted');
                // Form will submit normally
            });
        }
    });
</script>
@endsection

@push('scripts')
@endpush
