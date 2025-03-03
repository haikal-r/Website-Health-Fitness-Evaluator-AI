@extends('layouts.empty')

@section('title', 'Login')

@push('styles')
<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="bg-background min-h-screen flex flex-col justify-center py-6 sm:py-12">
    <div class="mt-8 sm:mx-auto w-full px-4 max-w-[90%] sm:max-w-md">
        <div class="bg-white py-6 px-8 shadow rounded-lg">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-900 sm:text-3xl">Register</h2>
                <p class="mt-2 text-sm text-gray-600 mx-4 sm:mx-0">
                    Create your account to get started
                </p>
            </div>
            <form action="{{ route('register.store') }}" method="POST" class="space-y-5">
                @csrf
                <!-- Name -->
                <div class="space-y-1">
                    <label for="name" class="block text-sm font-medium text-gray-700">
                        Name
                    </label>
                    <input type="text" name="name" id="name" required
                        class="form-input px-3 py-2 border block w-full rounded-md border-gray-300 shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                </div>

                <!-- Email Address -->
                <div class="space-y-1">
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Email Address
                    </label>
                    <input type="email" name="email" id="email" required
                        class="form-input px-3 py-2 border block w-full rounded-md border-gray-300 shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                </div>

                <!-- Password -->
                <div class="space-y-1">
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Password
                    </label>
                    <input type="password" name="password" id="password" required
                        class="form-input px-3 py-2 border block w-full rounded-md border-gray-300 shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                </div>

                <div class="space-y-1">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                        Confirm Password
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="form-input px-3 py-2 border block w-full rounded-md border-gray-300 shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                </div>

                <div class="pt-2">
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white !bg-primary hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
                        Continue
                    </button>
                </div>

                <div class="text-sm text-left pt-2">
                    <span class="text-gray-600">Already have an account?</span>
                    <a href="{{ route('login') }}" class="font-medium !text-primary hover:underline ml-1">
                        Login here
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Floating Error Messages -->
@if ($errors->any())
<div class="fixed bottom-4 right-4 max-w-sm w-full bg-red-100 border-l-4 border-red-500 rounded-lg shadow-lg">
    <div class="p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm text-red-800">
                    Please check the form for errors
                </p>
            </div>
        </div>
    </div>
</div>
@endif

@endsection