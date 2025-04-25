@extends('layouts.empty')

@section('title', 'Login')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
<div class="flex h-screen overflow-hidden">
    <!-- Left side with welcome message -->
    <div class="hidden md:flex md:flex-1 bg-gradient-to-br from-orange-500 via-orange-400 to-orange-300 rounded-r-3xl items-center justify-center relative overflow-hidden">
        <!-- Blob shapes -->
        <div class="absolute w-[600px] h-[600px] top-[-200px] left-[-100px] bg-gradient-to-br from-white/10 to-white/5 rounded-[30%_70%_70%_30%/30%_30%_70%_70%] animate-[morph_15s_linear_infinite_alternate]"></div>
        <div class="absolute w-[500px] h-[500px] bottom-[-200px] right-[-100px] bg-gradient-to-br from-white/10 to-white/5 rounded-[70%_30%_30%_70%/70%_70%_30%_30%] animate-[morph_15s_linear_infinite_alternate-reverse]"></div>

        <!-- Welcome text -->
        <div class="text-center text-white relative z-10 max-w-4/5">
            <h1 class="text-5xl font-bold mb-4 leading-tight">Welcome Back!</h1>
            <p class="text-xl opacity-90">Sign in to continue your journey with us</p>
        </div>
    </div>

    <!-- Right side with login form -->
    <div class="flex-1 bg-white flex items-center justify-center p-10">
        <div class="w-full max-w-md">
            <div class="mb-8">
                <h2 class="text-3xl font-semibold text-gray-800 mb-2">Login</h2>
                <p class="text-gray-600">Welcome back! Please login to your account.</p>
            </div>

            <form method="POST" action="{{ route('authentication') }}">
                @csrf

                <!-- Email Input -->
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-600">Email Address</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        class="w-full px-4 py-3 text-base border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 focus:ring focus:ring-orange-500/20"
                        placeholder="you@example.com"
                        required
                    >
                    @error('email')
                    <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-600">Password</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="w-full px-4 py-3 text-base border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 focus:ring focus:ring-orange-500/20"
                        placeholder="••••••••"
                        required
                    >
                    @error('password')
                    <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember_me" name="remember" class="mr-2 accent-orange-500">
                        <label for="remember_me" class="text-sm text-gray-600">Remember Me</label>
                    </div>
                    <a href="" class="text-sm text-orange-500 hover:text-orange-600 hover:underline transition">Forgot Password?</a>
                </div>

                <!-- Login Button -->
                <button type="submit" class="w-full py-3 bg-orange-500 hover:bg-orange-600 text-white font-medium rounded-lg  hover:shadow-lg">
                    Login
                </button>

                <!-- Register Link -->
                <div class="text-center mt-6 text-sm text-gray-600">
                    <span>Don't have an account?</span>
                    <a href="{{ route('register.index') }}" class="text-orange-500 font-medium hover:text-orange-600 hover:underline transition">Sign up</a>
                </div>

                <!-- Uncomment for social login -->
                <!--
                <div class="relative flex items-center justify-center my-6">
                    <div class="border-t border-gray-300 w-full"></div>
                    <span class="bg-white px-3 text-sm text-gray-500">or</span>
                    <div class="border-t border-gray-300 w-full"></div>
                </div>

                <button type="button" class="w-full py-3 border border-gray-300 flex items-center justify-center gap-2 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                    <img src="{{ asset('images/google.svg') }}" alt="Google" class="w-5 h-5">
                    Continue with Google
                </button>
                -->
            </form>
        </div>
    </div>
</div>

<!-- Error Alert -->
@if (session('error'))
<div class="fixed bottom-6 right-6 bg-white border-l-4 border-red-500 rounded-lg p-4 shadow-lg flex items-start max-w-md z-50 animate-[slideIn_0.3s_ease-out_forwards]">
    <svg class="text-red-500 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="10"></circle>
        <line x1="12" y1="8" x2="12" y2="12"></line>
        <line x1="12" y1="16" x2="12.01" y2="16"></line>
    </svg>
    <div class="flex-1">
        <div class="font-semibold mb-1 text-gray-800">Error</div>
        <div class="text-gray-600">{{ session('error') }}</div>
    </div>
    <button class="text-gray-400 hover:text-gray-600 ml-3 p-1" onclick="this.parentElement.remove()">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </button>
</div>
@endif
@endsection

@push('scripts')
@endpush
