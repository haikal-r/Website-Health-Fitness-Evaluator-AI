<div class="w-64 bg-white border-r border-gray-200">
    <div class="p-4 flex items-center mt-4">
        <span class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" class="w-60 h-15" alt="">
        </span>
    </div>
    <div class="mt-6">
        <nav class="px-4 mb-8 space-y-1">
            <a href="{{ route('admin.dashboard') }}"
                class="rounded-lg p-3 flex items-center cursor-pointer transition-colors
                    {{ request()->routeIs('admin.dashboard') ? 'bg-orange-500 text-white' : 'text-gray-600 hover:bg-orange-500 hover:text-white' }}" data-page="dashboard">
                <i class="fas fa-th-large mr-3"></i> Dashboard
            </a>
            <a href="{{ route('admin.user-management') }}"
               class="rounded-lg p-3 flex items-center cursor-pointer transition-colors
                    {{ request()->routeIs('admin.user-management') ? 'bg-orange-500 text-white' : 'text-gray-600 hover:bg-orange-500 hover:text-white' }}">
                <i class="fas fa-users mr-3"></i> User Management
            </a>
            <a href="{{ route('admin.log-activity') }}"
               class="rounded-lg p-3 flex items-center cursor-pointer transition-colors
                    {{ request()->routeIs('admin.log-activity') ? 'bg-orange-500 text-white' : 'text-gray-600 hover:bg-orange-500 hover:text-white' }}">
                <i class="fas fa-history mr-3"></i> Activity Logs
            </a>
            <a href=""
               class="rounded-lg p-3 flex items-center cursor-pointer transition-colors
                    {{ request()->routeIs('') ? 'bg-orange-500 text-white' : 'text-gray-600 hover:bg-orange-500 hover:text-white' }}">
                <i class="fas fa-chart-bar mr-3"></i> Reports & Statistics
            </a>
        </nav>

        <div class="px-4 mb-2">
            <div class="text-xs font-semibold text-gray-400 mb-2 uppercase tracking-wider">Features</div>
            <nav class="space-y-2">
                <a href="{{ route('admin.nutrition-trends') }}"
                   class="rounded-lg p-3 flex items-center cursor-pointer transition-colors
                          {{ request()->routeIs('admin.nutrition-trends') ? 'bg-orange-500 text-white' : 'text-gray-600 hover:bg-orange-500 hover:text-white' }}">
                    <i class="fas fa-utensils mr-3"></i> Nutrition Trends
                </a>
                <a href="{{ route('admin.workout-analytic') }}"
                   class="rounded-lg p-3 flex items-center cursor-pointer transition-colors
                          {{ request()->routeIs('admin.workout-analytic') ? 'bg-orange-500 text-white' : 'text-gray-600 hover:bg-orange-500 hover:text-white' }}">
                    <i class="fas fa-running mr-3"></i> Workout Analytics
                </a>
            </nav>
        </div>

        <div class="px-4 mb-2">
            <div class="text-xs font-semibold text-gray-400 mb-2 uppercase tracking-wider">Settings</div>
            <nav class="space-y-2">
                <a href="{{ route('admin.logout') }}"
                onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();"
                class="rounded-lg p-3 flex items-center cursor-pointer transition-colors text-gray-600 hover:bg-orange-500 hover:text-white">
                    <i class="fas fa-sign-out-alt mr-3"></i> Logout
                </a>

                <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">
                    @csrf
                </form>

            </nav>
        </div>
    </div>
</div>
