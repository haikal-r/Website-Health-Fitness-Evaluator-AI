@extends('layouts.dashboard')

@section('title', 'Workout')

@section('content')
    <!-- Main Content -->
    <div class="flex-1 overflow-auto">

        <!-- Dashboard Content -->
        <div class="p-6">

            <!-- Row 3 -->
            <div class="grid grid-cols-1 gap-6">
                <!-- Recent User Registrations -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h2 class="text-xl font-bold text-gray-800 mb-1">Recent Workout Recommendation</h2>
                    <p class="text-sm text-gray-500 mb-4">Latest Recommendation Workout by Health and Fitness</p>

                    <table class="w-full">
                        <thead>
                            <tr class="text-gray-500 text-sm border-b">
                                <th class="text-left py-3">User</th>
                                <th class="text-left py-3">Date</th>
                                <th class="text-left py-3">Status</th>
                                <th class="text-left py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($workouts as $workout)
                                <tr class="border-b">
                                    <td class="py-3">{{ $workout->user->name }}</td>
                                    <td class="py-3 text-gray-600">{{ $workout->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="py-3">
                                        <span
                                            class="{{ $workout->is_active == 1 ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }} 
                                                    text-xs px-2 py-1 rounded-full">
                                            {{ $workout->is_active == 1 ? 'Active' : 'Non Active' }}
                                        </span>

                                    </td>

                                    <td class="py-3">
                                        <a href="{{ route('workout.show', $workout->id) }}"
                                            class="inline-block bg-blue-500 hover:bg-blue-600 text-white text-xs font-semibold px-4 py-1 rounded-full transition duration-200">
                                            View
                                        </a>
                                    </td>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
    </body>

    </html>
@endsection
