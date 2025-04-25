@extends('layouts.empty')

@section('title', 'Register')

@push('styles')
<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
<style>
    @keyframes morph {
        0% {
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        }
        25% {
            border-radius: 70% 30% 30% 70% / 70% 70% 30% 30%;
        }
        50% {
            border-radius: 30% 70% 70% 30% / 70% 30% 30% 70%;
        }
        75% {
            border-radius: 70% 30% 30% 70% / 30% 70% 70% 30%;
        }
        100% {
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        }
    }

    .blob-1 {
        animation: morph 15s linear infinite alternate;
    }

    .blob-2 {
        animation: morph 15s linear infinite alternate-reverse;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(1rem);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-slide-in {
        animation: slideIn 0.3s ease-out forwards;
    }
</style>
@endpush

@section('content')
<div class="flex h-screen">
    <!-- Left side with welcome message -->
    <div class="hidden lg:flex lg:flex-1 bg-gradient-to-br from-orange-500 via-orange-400 to-orange-300 relative overflow-hidden rounded-r-3xl">
        <!-- Blob shapes -->
        <div class="absolute w-[600px] h-[600px] top-[-200px] left-[-100px] bg-white/10 blob-1 rounded-[30%_70%_70%_30%/30%_30%_70%_70%]"></div>
        <div class="absolute w-[500px] h-[500px] bottom-[-200px] right-[-100px] bg-white/10 blob-2 rounded-[70%_30%_30%_70%/70%_70%_30%_30%]"></div>

        <!-- Welcome text -->
        <div class="relative z-10 text-white text-center max-w-[80%] m-auto">
            <h1 class="text-5xl font-bold mb-4 leading-tight">Create Account</h1>
            <p class="text-xl opacity-90">Join us and start your journey today</p>
        </div>
    </div>

    <!-- Right side with registration form -->
    <div class="w-full lg:flex-1 flex items-center justify-center p-6 md:p-10 bg-white">
        <div class="w-full max-w-md">
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-bold text-gray-900">Register</h2>
                <p class="mt-2 text-gray-600">Create your account to get started</p>
            </div>

            <form action="{{ route('register.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                        Name
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name') }}"
                        required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500 transition-all duration-200"
                        placeholder="Enter your name"
                    >
                    @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        Email Address
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500 transition-all duration-200"
                        placeholder="you@example.com"
                    >
                    @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        Password
                    </label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500 transition-all duration-200"
                        placeholder="••••••••"
                    >
                    @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                        Confirm Password
                    </label>
                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500 transition-all duration-200"
                        placeholder="••••••••"
                    >
                </div>

                <!-- Register Button -->
                <div class="pt-2">
                    <button
                        type="submit"
                        class="w-full py-3 px-4 bg-orange-500 hover:bg-orange-600 text-white font-medium rounded-lg hover:shadow-lg"
                    >
                        Create Account
                    </button>
                </div>

                <!-- Login Link -->
                <div class="text-center pt-4">
                    <span class="text-gray-600">Already have an account?</span>
                    <a href="{{ route('login') }}" class="font-medium text-orange-500 hover:text-orange-600 ml-1 transition-colors duration-200">
                        Login here
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Floating Error Messages -->
@if ($errors->any())
<div class="fixed bottom-4 right-4 max-w-sm w-full bg-red-50 border-l-4 border-red-500 rounded-lg shadow-lg animate-slide-in">
    <div class="p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-red-800">
                    Please check the form for errors
                </p>
                <ul class="mt-1 text-sm text-red-700 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="ml-auto pl-3">
                <div class="-mx-1.5 -my-1.5">
                    <button type="button" onclick="this.parentElement.parentElement.parentElement.parentElement.remove()" class="inline-flex bg-red-50 rounded-md p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        <span class="sr-only">Dismiss</span>
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
