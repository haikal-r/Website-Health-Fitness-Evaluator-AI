@extends('layouts.empty')

@section('title', 'Your Personalized Plan')

@section('content')
<!-- Header -->
<header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" x-data="{ scrolled: false, mobileMenuOpen: false }"
        x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 10 })"
        :class="{ 'bg-white shadow-md py-3': scrolled, 'bg-white py-5': !scrolled }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="EvaluatorAI Logo" class="h-12 w-auto">
                </a>
            </div>

            <nav class="hidden md:flex items-center space-x-8">
                <a href="#" class="font-medium transition-colors" :class="{ 'text-gray-600 hover:text-orange-500': scrolled, '': !scrolled }">Home</a>
                <a href="#" class="font-medium transition-colors" :class="{ 'text-gray-600 hover:text-orange-500': scrolled, '': !scrolled }">About</a>
                <a href="#" class="font-medium transition-colors" :class="{ 'text-gray-600 hover:text-orange-500': scrolled, '': !scrolled }">Contact</a>
            </nav>

            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="hidden md:flex text-white bg-gradient-to-r from-orange-500 to-orange-600 px-5 py-2.5 rounded-lg font-medium shadow-lg shadow-orange-500/20 hover:shadow-orange-500/30 transition-all duration-300 items-center">
                    Dashboard
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>

                <button
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    class="md:hidden p-2 rounded-lg"
                    :class="{ 'text-gray-800 bg-gray-100': scrolled, 'text-white bg-white/20': !scrolled }"
                >
                    <svg x-show="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1" class="md:hidden bg-white shadow-lg rounded-lg mt-4" style="display: none;">
            <div class="px-4 py-4 space-y-3">
                <a href="#" class="block font-medium text-gray-800 hover:text-orange-500 transition-colors py-2">Home</a>
                <a href="#" class="block font-medium text-gray-800 hover:text-orange-500 transition-colors py-2">About</a>
                <a href="#" class="block font-medium text-gray-800 hover:text-orange-500 transition-colors py-2">Contact</a>
                <a href="{{ route('dashboard') }}" class="flex items-center justify-center bg-gradient-to-r from-orange-500 to-orange-600 text-white px-5 py-2.5 rounded-lg font-medium shadow-lg shadow-orange-500/20 hover:shadow-orange-500/30 transition-all duration-300 mt-2">
                    Dashboard
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Hero Section -->
<section class="relative pt-32 pb-4 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl mx-auto text-center animate-[fadeIn_0.5s_ease-out_forwards]" style="animation-delay: 0.1s">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                Your Personalized Health Plan
            </h1>
            <p class="text-xl mb-8">
                We've created a custom meal and workout plan tailored specifically to your goals and preferences
            </p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-data="{ activeTab: 'nutrition' }">
        <!-- Tabs -->
        <div class="flex justify-center mb-12">
            <div class="inline-flex p-1 bg-gray-100 rounded-xl">
                <button
                    @click="activeTab = 'nutrition'"
                    :class="{ 'bg-white shadow-md text-orange-600': activeTab === 'nutrition', 'text-gray-600 hover:text-orange-500': activeTab !== 'nutrition' }"
                    class="px-6 py-3 rounded-lg font-medium transition-all">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3zM3 9h18M9 21V9" />
                        </svg>
                        Meal Plan
                    </span>
                </button>
                <button
                    @click="activeTab = 'fitness'"
                    :class="{ 'bg-white shadow-md text-orange-600': activeTab === 'fitness', 'text-gray-600 hover:text-orange-500': activeTab !== 'fitness' }"
                    class="px-6 py-3 rounded-lg font-medium transition-all"
                >
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        Workout Plan
                    </span>
                </button>
            </div>
        </div>

        <!-- Tab Contents -->
        <!-- Nutrition Plan Tab Content -->
        <div x-show="activeTab === 'nutrition'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($data['foods'] as $food)
                    <div class="col-span-1">
                        <div class="mb-6 flex items-center">
                            <div class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center mr-4">
                                @php
                                    $mealTypeIcon = '';

                                    switch(strtolower($food['type'])) {
                                        case 'breakfast':
                                            $mealTypeIcon = '<path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z"></path><path d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z"></path>';
                                            break;
                                        case 'lunch':
                                            $mealTypeIcon = '<path d="M3 2a1 1 0 00-1 1v1a1 1 0 001 1h16a1 1 0 001-1V3a1 1 0 00-1-1H3z"></path><path d="M3 6h18v10a3 3 0 01-3 3H6a3 3 0 01-3-3V6z"></path>';
                                            break;
                                        case 'dinner':
                                            $mealTypeIcon = '<path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>';
                                            break;
                                        default:
                                            $mealTypeIcon = '<path d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 011 1v3a1 1 0 01-1 1v1a1 1 0 11-2 0v-1a1 1 0 01-1-1V5a1 1 0 011-1v-.5z"></path><path d="M7 3.5a1.5 1.5 0 013 0V4a1 1 0 011 1v3a1 1 0 01-1 1v1a1 1 0 11-2 0v-1a1 1 0 01-1-1V5a1 1 0 011-1v-.5z"></path><path d="M13 7a1 1 0 01-1-1V5a1 1 0 011-1v-.5a1.5 1.5 0 013 0V4a1 1 0 011 1v1a1 1 0 01-1 1v1a1 1 0 11-2 0V7z"></path>';
                                            break;
                                    }
                                @endphp

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    {!! $mealTypeIcon !!}
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-800 capitalize">{{ $food['type'] }}</h2>
                        </div>

                        @foreach($food['foods'] as $meal)
                            <div class="transform transition-all duration-300 hover:-translate-y-1 hover:shadow-xl bg-white rounded-2xl shadow-lg overflow-hidden mb-8 animate-[fadeIn_0.5s_ease-out_forwards]" style="animation-delay: {{ $loop->index * 0.1 + 0.3 }}s">
                                <div class="relative overflow-hidden">
                                    <div class="absolute top-4 left-4 px-3 py-1 rounded-lg text-xs font-semibold uppercase tracking-wider z-10 bg-gray-900/80 text-white">
                                        {{ ucfirst($food['type']) }}
                                    </div>
                                    <div class="h-48 relative">
                                        <img src="{{ $meal['image'] }}" alt="{{ $meal['name'] }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                                    </div>
                                    <div class="absolute bottom-0 left-0 right-0 p-4">
                                        <h3 class="text-xl font-bold text-white">{{ $meal['name'] }}</h3>
                                        <div class="flex items-center text-white/80 text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                            </svg>
                                            <span>{{ $meal['serving_per_gram'] }}<span class="text-white/60">g</span> ({{ $meal['serving_description'] }})</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-5">
                                    <h4 class="font-semibold text-gray-800 mb-3">Nutrition Facts</h4>

                                    <div class="flex justify-between items-center mb-3 pb-3 border-b border-gray-300">
                                        <span class="text-sm  text-gray-600">Calories</span>
                                        <span class="text-sm font-semibold text-gray-800">{{ $meal['nutrition']['Calories'] }} <span class="text-gray-500">kcal</span></span>
                                    </div>

                                    <div class="grid grid-cols-3 gap-2 mb-4">
                                        <!-- Protein -->
                                        <div class="text-center p-2 bg-gray-50 rounded-md">
                                            <div class="text-xs text-gray-500 mb-1">Protein</div>
                                            <div class="text-sm font-semibold text-gray-800">{{ $meal['nutrition']['Protein (g)'] }} <span class="text-gray-500 font-normal">g</span></div>
                                        </div>

                                        <!-- Fats -->
                                        <div class="text-center p-2 bg-gray-50 rounded-md">
                                            <div class="text-xs text-gray-500 mb-1">Fats</div>
                                            <div class="text-sm font-semibold text-gray-800">{{ $meal['nutrition']['Fat (g)'] }} <span class="text-gray-500 font-normal">g</span></div>
                                        </div>

                                        <!-- Carbs -->
                                        <div class="text-center p-2 bg-gray-50 rounded-md">
                                            <div class="text-xs text-gray-500 mb-1">Carbs</div>
                                            <div class="text-sm font-semibold text-gray-800">{{ $meal['nutrition']['Carbohydrate (g)'] }} <span class="text-gray-500 font-normal">g</span></div>
                                        </div>
                                    </div>

                                    <!-- Additional Nutrition Info -->
                                    <div class="grid grid-cols-2 gap-2 text-xs">
                                        @if(isset($meal['nutrition']['Fiber (g)']))
                                        <div class="flex justify-between px-2 py-1 bg-gray-50 rounded">
                                            <span class="text-gray-600">Fiber</span>
                                            <span class="font-medium text-gray-800">{{ $meal['nutrition']['Fiber (g)'] }} <span class="text-gray-400 font-normal">g</span></span>
                                        </div>
                                        @endif

                                        @if(isset($meal['nutrition']['Sugar (g)']))
                                        <div class="flex justify-between px-2 py-1 bg-gray-50 rounded">
                                            <span class="text-gray-600">Sugar</span>
                                            <span class="font-medium text-gray-800">{{ $meal['nutrition']['Sugar (g)'] }} <span class="text-gray-400 font-normal">g</span></span>
                                        </div>
                                        @endif

                                        @if(isset($meal['nutrition']['Sodium (mg)']))
                                        <div class="flex justify-between px-2 py-1 bg-gray-50 rounded">
                                            <span class="text-gray-600">Sodium</span>
                                            <span class="font-medium text-gray-800">{{ $meal['nutrition']['Sodium (mg)'] }} <span class="text-gray-400 font-normal">mg</span></span>
                                        </div>
                                        @endif

                                        @if(isset($meal['nutrition']['Cholesterol (mg)']))
                                        <div class="flex justify-between px-2 py-1 bg-gray-50 rounded">
                                            <span class="text-gray-600">Cholesterol</span>
                                            <span class="font-medium text-gray-800">{{ $meal['nutrition']['Cholesterol (mg)'] }} <span class="text-gray-400 font-normal">mg</span></span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Workout Plan Tab Content -->
        <div x-show="activeTab === 'fitness'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($data['workouts'] as $workout)
                    <div class="transform transition-all duration-300 hover:-translate-y-1 hover:shadow-xl bg-white rounded-2xl shadow-lg overflow-hidden animate-[fadeIn_0.5s_ease-out_forwards]" style="animation-delay: {{ $loop->index * 0.1 + 0.3 }}s">
                        <div class="relative overflow-hidden">
                            <div class="absolute top-4 left-4 px-3 py-1 rounded-lg text-xs font-semibold uppercase tracking-wider z-10 bg-gray-900/80 text-white">
                                Workout
                            </div>
                            <div class="h-56 relative">
                                <img src="{{ $workout['image'] }}" alt="{{ $workout['workout_name'] }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 p-6">
                                <h3 class="text-2xl font-bold text-white">{{ $workout['workout_name'] }}</h3>
                                <div class="flex items-center text-white/80">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    <span>Target: {{ $workout['target'] ?? 'Full Body' }}</span>
                                </div>
                            </div>
                        </div>

                            <div class="p-6">
                                <h4 class="font-semibold text-gray-800 mb-4">Workout Details</h4>

                                <div class="grid grid-cols-2 gap-4">
                                    <div class="bg-gray-50 rounded-xl p-4 flex items-center transition-all duration-300 hover:bg-gray-100">
                                        <div class="rounded-full bg-gray-100 p-3 mr-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-500">Sets</p>
                                            <p class="text-xl font-bold text-gray-800">{{ $workout['sets'] ?? '3-4' }}</p>
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 rounded-xl p-4 flex items-center transition-all duration-300 hover:bg-gray-100">
                                        <div class="rounded-full bg-gray-100 p-3 mr-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-500">Reps</p>
                                            <p class="text-xl font-bold text-gray-800">{{ $workout['reps'] ?? '8-12' }}</p>
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 rounded-xl p-4 flex items-center transition-all duration-300 hover:bg-gray-100">
                                        <div class="rounded-full bg-gray-100 p-3 mr-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-500">Rest</p>
                                            <p class="text-xl font-bold text-gray-800">{{ $workout['rest'] ?? '60-90' }} <span class="text-gray-400 font-normal text-lg">s</span></p>
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 rounded-xl p-4 flex items-center transition-all duration-300 hover:bg-gray-100">
                                        <div class="rounded-full bg-gray-100 p-3 mr-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-500">Target</p>
                                            <p class="text-xl font-bold text-gray-800">{{ $workout['target'] ?? 'Full Body' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Call to action -->
            <div class="mt-16 text-center animate-[fadeIn_0.5s_ease-out_forwards]" style="animation-delay: 0.5s">
                <div class="max-w-3xl mx-auto">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Ready to start your journey?</h2>
                    <p class="text-lg text-gray-600 mb-8">
                        Track your progress, adjust your plans, and achieve your health goals.
                    </p>
                    <button
                    id="openProgressTracker"
                    class="inline-flex items-center px-8 py-4 bg-orange-500 text-white font-medium rounded-xl shadow-lg transition-all duration-300 group hover:bg-orange-600"
                >
                    Progress Tracker
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </button>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Progress Tracker Modal -->
    <div id="progressTrackerModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-black bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- Modal panel -->
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
                <div class="bg-white pt-5 pb-4 px-6 sm:p-6 sm:pb-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-2xl font-bold text-gray-800" id="modal-title">
                            Daily Progress Tracker
                        </h3>
                        <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <form class="space-y-6">
                        <!-- Meal Recommendations -->
                        <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-200">
                            <div class="flex items-center text-gray-800 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3zM3 9h18M9 21V9" />
                                </svg>
                                <h4 class="font-medium text-lg">Meal Recommendations</h4>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Did you follow today's AI meal recommendations?</p>

                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <input id="breakfast" name="breakfast" type="checkbox" class="h-4 w-4 text-gray-900 border-gray-300 rounded">
                                    <label for="breakfast" class="ml-2 text-sm text-gray-700">Breakfast</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="lunch" name="lunch" type="checkbox" class="h-4 w-4 text-gray-900 border-gray-300 rounded">
                                    <label for="lunch" class="ml-2 text-sm text-gray-700">Lunch</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="dinner" name="dinner" type="checkbox" class="h-4 w-4 text-gray-900 border-gray-300 rounded">
                                    <label for="dinner" class="ml-2 text-sm text-gray-700">Dinner</label>
                                </div>
                            </div>

                            <div class="flex items-center mt-3 text-xs text-gray-500">
                                <span class="flex h-2 w-2 rounded-full bg-gray-400 mr-2"></span>
                                <span>Purpose: Track compliance with daily nutrition recommendations.</span>
                            </div>
                        </div>

                        <!-- Workout Recommendations -->
                        <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-200">
                            <div class="flex items-center text-gray-800 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </svg>
                                <h4 class="font-medium text-lg">Workout Recommendations</h4>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">How much of today's recommended workout did you complete?</p>

                            <div class="space-y-4">
                                <div class="bg-gray-50 p-3 rounded-lg">
                                    <p class="font-medium text-sm mb-2">Workout A:</p>
                                    <div class="grid grid-cols-3 gap-2">
                                        <div>
                                            <label class="block text-xs text-gray-600 mb-1">Sets</label>
                                            <input type="number" class="w-full border border-gray-300 rounded-md py-1 px-2 text-sm" placeholder="0">
                                        </div>
                                        <div>
                                            <label class="block text-xs text-gray-600 mb-1">Duration (min)</label>
                                            <input type="number" class="w-full border border-gray-300 rounded-md py-1 px-2 text-sm" placeholder="0">
                                        </div>
                                        <div>
                                            <label class="block text-xs text-gray-600 mb-1">Distance (m)</label>
                                            <input type="number" class="w-full border border-gray-300 rounded-md py-1 px-2 text-sm" placeholder="0">
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gray-50 p-3 rounded-lg">
                                    <p class="font-medium text-sm mb-2">Workout B:</p>
                                    <div class="grid grid-cols-3 gap-2">
                                        <div>
                                            <label class="block text-xs text-gray-600 mb-1">Sets</label>
                                            <input type="number" class="w-full border border-gray-300 rounded-md py-1 px-2 text-sm" placeholder="0">
                                        </div>
                                        <div>
                                            <label class="block text-xs text-gray-600 mb-1">Duration (min)</label>
                                            <input type="number" class="w-full border border-gray-300 rounded-md py-1 px-2 text-sm" placeholder="0">
                                        </div>
                                        <div>
                                            <label class="block text-xs text-gray-600 mb-1">Distance (m)</label>
                                            <input type="number" class="w-full border border-gray-300 rounded-md py-1 px-2 text-sm" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center mt-3 text-xs text-gray-500">
                                <span class="flex h-2 w-2 rounded-full bg-gray-400 mr-2"></span>
                                <span>Purpose: Collect quantitative data for performance measurement.</span>
                            </div>
                        </div>

                        <!-- Difficulties -->
                        <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-200" x-data="{ difficulty: null }">
                            <div class="flex items-center text-gray-800 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h4 class="font-medium text-lg">Difficulties</h4>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Did you experience any difficulties following today's recommendations?</p>

                            <div class="space-y-2 mb-4">
                                <div class="flex items-center">
                                    <input
                                        id="noDifficulty"
                                        name="difficulty"
                                        type="radio"
                                        class="h-4 w-4 text-gray-900 border-gray-300"
                                        x-model="difficulty"
                                        value="no"
                                    >
                                    <label for="noDifficulty" class="ml-2 text-sm text-gray-700">No, everything was fine</label>
                                </div>
                                <div class="flex items-center">
                                    <input
                                        id="someDifficulty"
                                        name="difficulty"
                                        type="radio"
                                        class="h-4 w-4 text-gray-900 border-gray-300"
                                        x-model="difficulty"
                                        value="some"
                                    >
                                    <label for="someDifficulty" class="ml-2 text-sm text-gray-700">Yes, somewhat difficult</label>
                                </div>
                                <div class="flex items-center">
                                    <input
                                        id="veryDifficult"
                                        name="difficulty"
                                        type="radio"
                                        class="h-4 w-4 text-gray-900 border-gray-300"
                                        x-model="difficulty"
                                        value="very"
                                    >
                                    <label for="veryDifficult" class="ml-2 text-sm text-gray-700">Yes, very difficult</label>
                                </div>
                            </div>

                            <div x-show="difficulty === 'some' || difficulty === 'very'" x-transition>
                                <p class="text-sm font-medium text-gray-700 mb-2">What made it difficult?</p>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-3">
                                    <div class="flex items-start">
                                        <input id="too-much" type="checkbox" class="h-4 w-4 mt-1 text-gray-900 border-gray-300 rounded">
                                        <label for="too-much" class="ml-2 text-sm text-gray-700">Portions were too large</label>
                                    </div>
                                    <div class="flex items-start">
                                        <input id="too-hard" type="checkbox" class="h-4 w-4 mt-1 text-gray-900 border-gray-300 rounded">
                                        <label for="too-hard" class="ml-2 text-sm text-gray-700">Workout was too intense</label>
                                    </div>
                                    <div class="flex items-start">
                                        <input id="no-time" type="checkbox" class="h-4 w-4 mt-1 text-gray-900 border-gray-300 rounded">
                                        <label for="no-time" class="ml-2 text-sm text-gray-700">Didn't have enough time</label>
                                    </div>
                                    <div class="flex items-start">
                                        <input id="boring-food" type="checkbox" class="h-4 w-4 mt-1 text-gray-900 border-gray-300 rounded">
                                        <label for="boring-food" class="ml-2 text-sm text-gray-700">Meals were unappealing/boring</label>
                                    </div>
                                    <div class="flex items-start">
                                        <input id="allergies" type="checkbox" class="h-4 w-4 mt-1 text-gray-900 border-gray-300 rounded">
                                        <label for="allergies" class="ml-2 text-sm text-gray-700">Food allergies/incompatibilities</label>
                                    </div>
                                    <div class="flex items-start">
                                        <input id="hard-to-find" type="checkbox" class="h-4 w-4 mt-1 text-gray-900 border-gray-300 rounded">
                                        <label for="hard-to-find" class="ml-2 text-sm text-gray-700">Hard to find ingredients</label>
                                    </div>
                                    <div class="flex items-start">
                                        <input id="forgot" type="checkbox" class="h-4 w-4 mt-1 text-gray-900 border-gray-300 rounded">
                                        <label for="forgot" class="ml-2 text-sm text-gray-700">Forgot/didn't get around to it</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="block text-sm text-gray-700 mb-1">Other:</label>
                                    <textarea class="w-full border border-gray-300 rounded-md py-2 px-3 text-sm" rows="2" placeholder="Describe any other difficulties you experienced..."></textarea>
                                </div>
                            </div>

                            <div class="flex items-center mt-2 text-xs text-gray-500">
                                <span class="flex h-2 w-2 rounded-full bg-gray-400 mr-2"></span>
                                <span>Purpose: Help AI understand difficulty levels of recommendations.</span>
                            </div>
                        </div>

                        <!-- Mood & Energy -->
                        <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-200">
                            <div class="flex items-center text-gray-800 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h4 class="font-medium text-lg">Mood & Energy</h4>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">How was your mood and energy level today?</p>

                            <!-- Mood Slider -->
                            <div class="mb-4">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium text-gray-600">Mood:</span>
                                    <span class="text-sm font-medium text-gray-600">3/5</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="mr-3">😔</span>
                                    <input type="range" min="1" max="5" value="3" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                                    <span class="ml-3">😊</span>
                                </div>
                            </div>

                            <!-- Energy Slider -->
                            <div class="mb-3">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium text-gray-600">Energy:</span>
                                    <span class="text-sm font-medium text-gray-600">3/5</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="mr-3">🔋</span>
                                    <input type="range" min="1" max="5" value="3" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                                    <span class="ml-3">⚡</span>
                                </div>
                            </div>

                            <div class="flex items-center mt-2 text-xs text-gray-500">
                                <span class="flex h-2 w-2 rounded-full bg-gray-400 mr-2"></span>
                                <span>Purpose: Correlate with performance and compliance.</span>
                            </div>
                        </div>

                        <!-- Personal Notes -->
                        <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-200">
                            <div class="flex items-center text-gray-800 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                <h4 class="font-medium text-lg">Personal Notes (Optional)</h4>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Anything else you'd like to note about today?</p>

                            <textarea class="w-full border border-gray-300 rounded-md py-2 px-3 text-sm" rows="3" placeholder="Write your personal notes here..."></textarea>

                            <div class="flex items-center mt-3 text-xs text-gray-500">
                                <span class="flex h-2 w-2 rounded-full bg-gray-400 mr-2"></span>
                                <span>Purpose: Provide deeper insights for future AI model improvements.</span>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-right">
                            <button type="submit" class="px-6 py-3 bg-orange-500 text-white font-medium rounded-lg shadow-lg hover:bg-orange-600 transition-colors">
                                Save Progress
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const openButton = document.getElementById('openProgressTracker');
        const closeButton = document.getElementById('closeModal');
        const modal = document.getElementById('progressTrackerModal');

        openButton.addEventListener('click', function() {
            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        });

        closeButton.addEventListener('click', function() {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        });

        // Close modal when clicking on backdrop
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        });
    });
</script>

<!-- Alpine.js for interactivity -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
