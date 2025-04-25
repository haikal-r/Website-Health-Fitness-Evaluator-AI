@extends('layouts.empty')

@section('title', 'Your Personalized Plan')

@push('styles')
<style>
    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideDown {
        from { transform: translateY(-100%); }
        to { transform: translateY(0); }
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .animate-fade-in {
        animation: fadeIn 0.5s ease-out forwards;
    }

    .animate-slide-down {
        animation: slideDown 0.5s ease-out forwards;
    }

    /* Card hover effects */
    .card-hover {
        transition: all 0.3s ease;
    }

    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    /* Image hover zoom */
    .img-hover-zoom {
        overflow: hidden;
    }

    .img-hover-zoom img {
        transition: transform 0.5s ease;
    }

    .img-hover-zoom:hover img {
        transform: scale(1.05);
    }

    /* Progress bars */
    .progress-bar {
        height: 6px;
        border-radius: 3px;
        background-color: #e2e8f0;
        overflow: hidden;
    }

    .progress-bar-fill {
        height: 100%;
        border-radius: 3px;
        transition: width 0.5s ease;
    }
</style>
@endpush

@section('content')
<!-- Header -->
<header class="fixed top-0 left-0 right-0 z-50 animate-slide-down" x-data="{ scrolled: false, mobileMenuOpen: false }"
        x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 10 })"
        :class="{ 'bg-white shadow-md py-3': scrolled, 'bg-white py-5': !scrolled }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="EvaluatorAI Logo" class="h-12 w-auto">
                </a>
            </div>

            <!-- Bagian lainnya tetap sama -->
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
        <div class="max-w-3xl mx-auto text-center animate-fade-in" style="animation-delay: 0.1s">
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2h14a2 2 0 012 2z" />
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
                            <div class="w-12 h-12 rounded-xl bg-orange-50 flex items-center justify-center mr-4">
                                @php
                                    $mealTypeIcon = '';

                                    switch(strtolower($food['type'])) {
                                        case 'breakfast':
                                            $mealTypeIcon = '<path d="M18 8h1a4 4 0 0 1 0 8h-1"></path><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path><line x1="6" y1="1" x2="6" y2="4"></line><line x1="10" y1="1" x2="10" y2="4"></line><line x1="14" y1="1" x2="14" y2="4"></line>';
                                            break;
                                        case 'lunch':
                                            $mealTypeIcon = '<path d="M12 2v2"></path><path d="M12 20v2"></path><path d="M4.93 4.93l1.41 1.41"></path><path d="M17.66 17.66l1.41 1.41"></path><path d="M2 12h2"></path><path d="M20 12h2"></path><path d="M6.34 17.66l-1.41 1.41"></path><path d="M19.07 4.93l-1.41 1.41"></path><circle cx="12" cy="12" r="5"></circle>';
                                            break;
                                        case 'dinner':
                                            $mealTypeIcon = '<path d="M12 3a6 6 0 0 0-6 6c0 7 6 12 6 12s6-5 6-12a6 6 0 0 0-6-6z"></path><circle cx="12" cy="9" r="3"></circle>';
                                            break;
                                        default:
                                            $mealTypeIcon = '<path d="M6 13.87A4 4 0 0 1 7.41 6a5.11 5.11 0 0 1 1.05-1.54 5 5 0 0 1 7.08 0A5.11 5.11 0 0 1 16.59 6 4 4 0 0 1 18 13.87V21H6Z"></path><line x1="6" y1="17" x2="18" y2="17"></line>';
                                            break;
                                    }
                                @endphp

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-orange-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    {!! $mealTypeIcon !!}
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-800 capitalize">{{ $food['type'] }}</h2>
                        </div>

                        @foreach($food['foods'] as $meal)
                            <div class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden mb-8 animate-fade-in" style="animation-delay: {{ $loop->index * 0.1 + 0.3 }}s">
                                <div class="relative img-hover-zoom">
                                    <div class="absolute top-4 left-4 px-3 py-1 rounded-lg text-xs font-semibold uppercase tracking-wider z-10 bg-gradient-to-r from-orange-500 to-orange-600 text-white shadow-lg">
                                        {{ ucfirst($food['type']) }}
                                    </div>
                                    <div class="h-48 relative">
                                        <img src="{{ $meal['image'] }}" alt="{{ $meal['name'] }}" class="w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                                    </div>
                                    <div class="absolute bottom-0 left-0 right-0 p-4">
                                        <h3 class="text-xl font-bold text-white">{{ $meal['name'] }}</h3>
                                        <div class="flex items-center text-white/80 text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                            </svg>
                                            <span>{{ round($meal['serving_per_gram']) }}g ({{ $meal['serving_description'] }})</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-5">
                                    <h4 class="font-semibold text-gray-800 mb-3">Nutrition Facts</h4>

                                    <!-- Calories -->
                                    <div class="mb-4">
                                        <div class="flex justify-between mb-1">
                                            <span class="text-sm font-medium text-gray-600">Calories</span>
                                            <span class="text-sm font-semibold text-gray-800">{{ round($meal['nutrition']['Calories']) }} kcal</span>
                                        </div>
                                        <div class="progress-bar">
                                            <div class="progress-bar-fill bg-gradient-to-r from-orange-400 to-orange-500" style="width: 75%"></div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-3 gap-3 mb-4">
                                        <!-- Protein -->
                                        <div>
                                            <div class="flex justify-between mb-1">
                                                <span class="text-xs font-medium text-gray-600">Protein</span>
                                                <span class="text-xs font-semibold text-gray-800">{{ round($meal['nutrition']['Protein (g)']) }}g</span>
                                            </div>
                                            <div class="progress-bar">
                                                <div class="progress-bar-fill bg-gradient-to-r from-blue-400 to-blue-500" style="width: {{ min(round($meal['nutrition']['Protein (g)']) * 2, 100) }}%"></div>
                                            </div>
                                        </div>

                                        <!-- Fats -->
                                        <div>
                                            <div class="flex justify-between mb-1">
                                                <span class="text-xs font-medium text-gray-600">Fats</span>
                                                <span class="text-xs font-semibold text-gray-800">{{ round($meal['nutrition']['Fat (g)']) }}g</span>
                                            </div>
                                            <div class="progress-bar">
                                                <div class="progress-bar-fill bg-gradient-to-r from-amber-400 to-amber-500" style="width: {{ min(round($meal['nutrition']['Fat (g)']) * 3, 100) }}%"></div>
                                            </div>
                                        </div>

                                        <!-- Carbs -->
                                        <div>
                                            <div class="flex justify-between mb-1">
                                                <span class="text-xs font-medium text-gray-600">Carbs</span>
                                                <span class="text-xs font-semibold text-gray-800">{{ round($meal['nutrition']['Carbohydrate (g)']) }}g</span>
                                            </div>
                                            <div class="progress-bar">
                                                <div class="progress-bar-fill bg-gradient-to-r from-green-400 to-green-500" style="width: {{ min(round($meal['nutrition']['Carbohydrate (g)']) * 1.5, 100) }}%"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap gap-2">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            {{ round($meal['nutrition']['Calories']) }} kcal
                                        </span>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ round($meal['nutrition']['Protein (g)']) }}g protein
                                        </span>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                            {{ round($meal['nutrition']['Fat (g)']) }}g fat
                                        </span>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            {{ round($meal['nutrition']['Carbohydrate (g)']) }}g carbs
                                        </span>
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
                    <div class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden animate-fade-in" style="animation-delay: {{ $loop->index * 0.1 + 0.3 }}s">
                        <div class="relative img-hover-zoom">
                            <div class="absolute top-4 left-4 px-3 py-1 rounded-lg text-xs font-semibold uppercase tracking-wider z-10 bg-gradient-to-r from-orange-500 to-orange-600 text-white shadow-lg">
                                Workout
                            </div>
                            <div class="h-56 relative">
                                <img src="{{ $workout['image'] }}" alt="{{ $workout['workout_name'] }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 p-6">
                                <h3 class="text-2xl font-bold text-white">{{ $workout['workout_name'] }}</h3>
                                <div class="flex items-center text-white/80">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                    </svg>
                                    <span>Target: {{ $workout['target'] ?? 'Full Body' }}</span>
                                </div>
                            </div>
                        </div>

                            <div class="p-6">
                                <h4 class="font-semibold text-gray-800 mb-4">Workout Details</h4>

                                <div class="grid grid-cols-2 gap-4">
                                    <div class="bg-gray-50 rounded-xl p-4 flex items-center transition-all duration-300 hover:bg-gray-100">
                                        <div class="rounded-full bg-orange-100 p-3 mr-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-500">Sets</p>
                                            <p class="text-xl font-bold text-orange-600">{{ $workout['sets'] ?? '3-4' }}</p>
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 rounded-xl p-4 flex items-center transition-all duration-300 hover:bg-gray-100">
                                        <div class="rounded-full bg-orange-100 p-3 mr-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-500">Reps</p>
                                            <p class="text-xl font-bold text-orange-600">{{ $workout['reps'] ?? '8-12' }}</p>
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 rounded-xl p-4 flex items-center transition-all duration-300 hover:bg-gray-100">
                                        <div class="rounded-full bg-orange-100 p-3 mr-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-500">Rest</p>
                                            <p class="text-xl font-bold text-orange-600">{{ $workout['rest'] ?? '60-90s' }}</p>
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 rounded-xl p-4 flex items-center transition-all duration-300 hover:bg-gray-100">
                                        <div class="rounded-full bg-orange-100 p-3 mr-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-500">Target</p>
                                            <p class="text-xl font-bold text-orange-600">{{ $workout['target'] ?? 'Full Body' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Call to action -->
            <div class="mt-16 text-center animate-fade-in" style="animation-delay: 0.5s">
                <div class="max-w-3xl mx-auto">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Ready to start your journey?</h2>
                    <p class="text-lg text-gray-600 mb-8">
                        Track your progress, adjust your plans, and achieve your health goals.
                    </p>
                    <button
                    id="openProgressTracker"
                    class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-medium rounded-xl shadow-lg shadow-orange-500/20 hover:shadow-orange-500/30 transition-all duration-300 group"
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
                <div class="bg-mint-50 pt-5 pb-4 px-6 sm:p-6 sm:pb-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-2xl font-bold text-gray-800" id="modal-title">
                            Health & Fitness Progress Tracker
                        </h3>
                        <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <form class="space-y-6">
                        <!-- Meal Recommendations -->
                        <div class="bg-white p-5 rounded-lg shadow-sm">
                            <div class="flex items-center text-orange-600 mb-2">
                                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h4 class="font-medium text-lg">Meal Recommendations</h4>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Did you follow today's AI meal recommendations?</p>

                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <input id="breakfast" name="breakfast" type="checkbox" class="h-4 w-4 text-green-600 border-gray-300 rounded">
                                    <label for="breakfast" class="ml-2 text-sm text-gray-700">Breakfast</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="lunch" name="lunch" type="checkbox" class="h-4 w-4 text-green-600 border-gray-300 rounded">
                                    <label for="lunch" class="ml-2 text-sm text-gray-700">Lunch</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="dinner" name="dinner" type="checkbox" class="h-4 w-4 text-green-600 border-gray-300 rounded">
                                    <label for="dinner" class="ml-2 text-sm text-gray-700">Dinner</label>
                                </div>
                            </div>

                            <div class="flex items-center mt-3 text-xs text-orange-600">
                                <span class="flex h-2 w-2 rounded-full bg-orange-500 mr-2"></span>
                                <span>Purpose: Track compliance with daily nutrition recommendations.</span>
                            </div>
                        </div>

                        <!-- Workout Recommendations -->
                        <div class="bg-white p-5 rounded-lg shadow-sm">
                            <div class="flex items-center text-orange-600 mb-2">
                                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
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

                            <div class="flex items-center mt-3 text-xs text-orange-600">
                                <span class="flex h-2 w-2 rounded-full bg-orange-500 mr-2"></span>
                                <span>Purpose: Collect quantitative data for performance measurement.</span>
                            </div>
                        </div>

                        <!-- Difficulties -->
                        <div class="bg-white p-5 rounded-lg shadow-sm" x-data="{ difficulty: null }">
                            <div class="flex items-center text-orange-600 mb-2">
                                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                                        class="h-4 w-4 text-orange-600 border-gray-300"
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
                                        class="h-4 w-4 text-orange-600 border-gray-300"
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
                                        class="h-4 w-4 text-orange-600 border-gray-300"
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
                                        <input id="too-much" type="checkbox" class="h-4 w-4 mt-1 text-orange-600 border-gray-300 rounded">
                                        <label for="too-much" class="ml-2 text-sm text-gray-700">Portions were too large</label>
                                    </div>
                                    <div class="flex items-start">
                                        <input id="too-hard" type="checkbox" class="h-4 w-4 mt-1 text-orange-600 border-gray-300 rounded">
                                        <label for="too-hard" class="ml-2 text-sm text-gray-700">Workout was too intense</label>
                                    </div>
                                    <div class="flex items-start">
                                        <input id="no-time" type="checkbox" class="h-4 w-4 mt-1 text-orange-600 border-gray-300 rounded">
                                        <label for="no-time" class="ml-2 text-sm text-gray-700">Didn't have enough time</label>
                                    </div>
                                    <div class="flex items-start">
                                        <input id="boring-food" type="checkbox" class="h-4 w-4 mt-1 text-orange-600 border-gray-300 rounded">
                                        <label for="boring-food" class="ml-2 text-sm text-gray-700">Meals were unappealing/boring</label>
                                    </div>
                                    <div class="flex items-start">
                                        <input id="allergies" type="checkbox" class="h-4 w-4 mt-1 text-orange-600 border-gray-300 rounded">
                                        <label for="allergies" class="ml-2 text-sm text-gray-700">Food allergies/incompatibilities</label>
                                    </div>
                                    <div class="flex items-start">
                                        <input id="hard-to-find" type="checkbox" class="h-4 w-4 mt-1 text-orange-600 border-gray-300 rounded">
                                        <label for="hard-to-find" class="ml-2 text-sm text-gray-700">Hard to find ingredients</label>
                                    </div>
                                    <div class="flex items-start">
                                        <input id="forgot" type="checkbox" class="h-4 w-4 mt-1 text-orange-600 border-gray-300 rounded">
                                        <label for="forgot" class="ml-2 text-sm text-gray-700">Forgot/didn't get around to it</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="block text-sm text-gray-700 mb-1">Other:</label>
                                    <textarea class="w-full border border-gray-300 rounded-md py-2 px-3 text-sm" rows="2" placeholder="Describe any other difficulties you experienced..."></textarea>
                                </div>
                            </div>

                            <div class="flex items-center mt-2 text-xs text-orange-600">
                                <span class="flex h-2 w-2 rounded-full bg-orange-500 mr-2"></span>
                                <span>Purpose: Help AI understand difficulty levels of recommendations.</span>
                            </div>
                        </div>

                        <!-- Mood & Energy -->
                        <div class="bg-white p-5 rounded-lg shadow-sm">
                            <div class="flex items-center text-orange-600 mb-2">
                                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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

                            <div class="flex items-center mt-2 text-xs text-orange-600">
                                <span class="flex h-2 w-2 rounded-full bg-orange-500 mr-2"></span>
                                <span>Purpose: Correlate with performance and compliance.</span>
                            </div>
                        </div>

                        <!-- Personal Notes -->
                        <div class="bg-white p-5 rounded-lg shadow-sm">
                            <div class="flex items-center text-orange-600 mb-2">
                                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                <h4 class="font-medium text-lg">Personal Notes (Optional)</h4>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Anything else you'd like to note about today?</p>

                            <textarea class="w-full border border-gray-300 rounded-md py-2 px-3 text-sm" rows="3" placeholder="Write your personal notes here..."></textarea>

                            <div class="flex items-center mt-3 text-xs text-orange-600">
                                <span class="flex h-2 w-2 rounded-full bg-orange-500 mr-2"></span>
                                <span>Purpose: Provide deeper insights for future AI model improvements.</span>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-right">
                            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-medium rounded-lg shadow-lg shadow-blue-500/20 hover:shadow-blue-500/30 transition-all">
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
