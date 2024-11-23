@extends('layouts.dashboard')

@section('title', 'Profile')

@push('styles')
<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endpush


@section('content')
<div class="flex flex-col bg-white shadow-md m-6 p-6">

    <div class="container">
        <h1 class="text-2xl font-medium mb-[21px]">Profile</h1>
        <form method="POST" action="" class="w-full flex flex-col gap-6">
            @csrf
            <!-- Gender -->
            <div class="flex justify-between">
                <label>Gender</label>
                <div class="w-1/2">
                    <div class="flex flex-wrap gap-4 sm:gap-6">
                        <div class="flex items-center">
                            <input type="radio" name="gender" id="male" value="male" {{ $profile['gender'] == 'male' ? 'checked' : '' }}
                                class="h-4 w-4 accent-primary text-primary border-gray-300 focus:ring-red-500">
                            <label for="male" class="ml-2 block text-sm text-gray-700">Male</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" name="gender" id="female" value="female" {{ $profile['gender'] == 'female' ? 'checked' : '' }}
                                class="h-4 w-4 accent-primary text-primary border-gray-300 focus:ring-red-500">
                            <label for="female" class="ml-2 block text-sm text-gray-700">Female</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Birthday -->
            <div class="flex justify-between">
                <label>Birthday</label>
                <div class="w-1/2">
                    <div class="flex items-center space-x-2">
                        <input type="text" name="birth_day" maxlength="2" value="{{ $profile['birth_day'] }}"
                            class="date-input form-input px-3 py-2 text-center border rounded-md border-gray-300 shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                        <span class="text-gray-500">/</span>
                        <input type="text" name="birth_month" maxlength="2" value="{{ $profile['birth_month'] }}"
                            class="date-input form-input px-3 py-2 text-center border rounded-md border-gray-300 shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                        <span class="text-gray-500">/</span>
                        <input type="text" name="birth_year" maxlength="4" value="{{ $profile['birth_year'] }}"
                            class="date-input form-input px-3 py-2 text-center border rounded-md border-gray-300 shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                    </div>
                </div>
            </div>

            <!-- Height -->
            <div class="flex justify-between">
                <label>Height</label>
                <div class="w-1/2 flex gap-3 items-center">
                    <input type="number" name="height" value="{{ $profile['height'] }}" placeholder="Height in cm" class="form-input appearance-none block w-full max-w-[100px] px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"> CM
                </div>
            </div>

            <!-- Current Weight -->
            <div class="flex justify-between">
                <label>Current Weight</label>
                <div class="w-1/2 flex gap-3 items-center">
                    <input type="number" name="weight" value="{{ $profile['weight'] }}" placeholder="Weight in cm" class="form-input appearance-none block w-full max-w-[100px] px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"> KG
                </div>
            </div>

            <!-- BMI -->
            <div class="flex justify-between">
                <div class="flex flex-col">
                    <label>BMI </label>
                    <small class="w-full text-gray-500 font-medium max-w-[190px]">Your BMI can’t be edited as it is a function of your weight & height.</small>

                </div>
                <div class="w-1/2 flex gap-3 items-center">
                    <input
                        type="text"
                        value="{{ $profile['bmi'] }}"
                        class="form-input appearance-none block w-full max-w-[100px] px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm disabled:bg-slate-200"
                        disabled>
                    <span class="text-gray-500 font-medium text-sm">({{ $profile['category'] }})</span>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-between">
                <div></div>
                <div class="w-1/2">
                    <button type="submit" class="w-1/3 flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200y">Update</button>

                </div>
            </div>
        </form>
    </div>
</div>

@endsection