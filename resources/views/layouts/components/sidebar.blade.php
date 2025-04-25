<!-- Sidebar -->
<div class="hidden md:flex md:flex-col md:w-64 md:fixed md:inset-y-0 bg-white shadow-lg h-full z-10">
    <div class="flex items-center justify-center h-20 border-b">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('images/logo.png') }}" alt="Evaluator AI Logo" class="h-12" />
        </div>
    </div>

    <div class="flex flex-col flex-grow pt-5 pb-4 overflow-y-auto">
        <div class="px-4 space-y-1">
            <a href="{{ route('dashboard') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('dashboard') ? 'bg-orange-50 text-orange-600' : 'text-gray-700 hover:bg-gray-50' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 {{ request()->routeIs('dashboard') ? 'text-orange-500' : 'text-gray-400 group-hover:text-gray-500' }}" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
                Dashboard
            </a>

            <a href="{{ route('profile') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('profile') ? 'bg-orange-50 text-orange-600' : 'text-gray-700 hover:bg-gray-50' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 {{ request()->routeIs('profile') ? 'text-orange-500' : 'text-gray-400 group-hover:text-gray-500' }}" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                </svg>
                Profile
            </a>

            <a href="{{ route('food.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('food.index') ? 'bg-orange-50 text-orange-600' : 'text-gray-700 hover:bg-gray-50' }}">
                <!-- Changed food icon to a more appropriate food plate icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 {{ request()->routeIs('food.index') ? 'text-orange-500' : 'text-gray-400 group-hover:text-gray-500' }}" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zm0 14a6 6 0 110-12 6 6 0 010 12zm1-10a1 1 0 10-2 0v1H8a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V6z" clip-rule="evenodd" />
                    <path d="M5 8a1 1 0 011-1h1a1 1 0 110 2H6a1 1 0 01-1-1z" />
                    <path d="M13 8a1 1 0 011-1h1a1 1 0 110 2h-1a1 1 0 01-1-1z" />
                    <path d="M10 13a1 1 0 011-1h.01a1 1 0 110 2H11a1 1 0 01-1-1z" />
                </svg>
                Food
            </a>

            <a href="{{ route('workout.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('workout.index') ? 'bg-orange-50 text-orange-600' : 'text-gray-700 hover:bg-gray-50' }}">
                <!-- Changed workout icon to a dumbbell icon representing exercise -->
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 {{ request()->routeIs('workout.index') ? 'text-orange-500' : 'text-gray-400 group-hover:text-gray-500' }}" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5 4a1 1 0 00-1 1v2.5a1 1 0 01-1 1H2a1 1 0 000 2h1a1 1 0 011 1V14a1 1 0 002 0v-2.5a1 1 0 011-1h8a1 1 0 011 1V14a1 1 0 002 0v-2.5a1 1 0 011-1h1a1 1 0 100-2h-1a1 1 0 01-1-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2.5a1 1 0 01-1 1H8a1 1 0 01-1-1V5a1 1 0 00-1-1H5z" />
                </svg>
                Workout
            </a>

            <a href="{{ route('result') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('result') ? 'bg-orange-50 text-orange-600' : 'text-gray-700 hover:bg-gray-50' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 {{ request()->routeIs('result') ? 'text-orange-500' : 'text-gray-400 group-hover:text-gray-500' }}" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 10-2 0v3a1 1 0 102 0v-3zm2-3a1 1 0 011 1v5a1 1 0 11-2 0v-5a1 1 0 011-1zm4-1a1 1 0 10-2 0v7a1 1 0 102 0V8z" clip-rule="evenodd" />
                </svg>
                Results
            </a>
        </div>
    </div>

    <div class="border-t border-gray-200 p-4">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full" src="{{ asset('images/default_profile.jpg') }}" alt="User profile">
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-gray-700">{{ Auth::user()->name ?? 'User' }}</p>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="text-xs font-medium text-gray-500 hover:text-gray-700">
                    Sign out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
