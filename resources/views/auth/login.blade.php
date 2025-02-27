@extends('layouts.empty')

@section('title', 'Login')

@push('styles')
<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="bg-background min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <!-- Optional: Add your logo here -->

    </div>

    <div class="mt-8 sm:mx-auto px-4 sm:w-full sm:max-w-md">
        <div class="bg-white py-6 shadow rounded-lg px-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-900 sm:text-3xl">Login</h2>
            </div>
            <form method="POST" action="{{ route('authentication') }}" class="space-y-6">
                @csrf
                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Email Address
                    </label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" required
                            class="form-input appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                    </div>
                    @error('email')
                    <p class="mt-2 text-sm !text-primary">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Input -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Password
                    </label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" required
                            class="form-input appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                    </div>
                    @error('password')
                    <p class="mt-2 text-sm !text-primary">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox"
                            class="h-4 w-4 accent-primary rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="" class="font-medium !text-primary hover:underline">
                            Forgot password?
                        </a>
                    </div>
                </div>

                <!-- Login Button -->
                <div>
                    <button 
                        type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white !bg-primary hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Continue
                    </button>
                </div>

                <!-- Registration Link -->
                <div class="text-sm text-left">
                    <span class="text-gray-600">Doesn't have an account?</span>
                    <a href="{{ route('register.index') }}" class="font-medium !text-primary hover:underline ml-1">
                        Register now
                    </a>
                </div>

                <!-- Divider -->
                <!-- <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">or</span>
                    </div>
                </div> -->

                <!-- Google Login Button -->
                <!-- <div>
                    <button type="button"
                        class="w-full flex items-center justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        <img src="{{ asset('images/google.svg') }}" alt="Google" class=" px-1">
                        Continue with Google
                    </button>
                </div> -->
            </form>
        </div>
    </div>
</div>

<!-- Alert for error messages (optional) -->
@if (session('error'))
<div class="fixed bottom-4 right-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
    <strong class="font-bold">Error!</strong>
    <span class="block sm:inline">{{ session('error') }}</span>
</div>
@endif
@endsection