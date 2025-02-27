@extends('layouts.empty')

@section('title', 'Result')

@push('styles')

<style>
    .custom-scroll::-webkit-scrollbar {
        width: 10px;
        height: 8px;
        border-radius: 5px;
        background-color: #F1F1F1;
    }

    /* Add a thumb */
    .custom-scroll::-webkit-scrollbar-thumb {
        background: #C1C1C1;
        border-radius: 10px;
    }
</style>
@endpush

@section('content')
<header class="absolute top-0 left-0 right-0 z-50 bg-white border-b">
    <div class="flex-none relative text-sm leading-6">
        <nav class="mx-auto lg:max-w-screen-xl px-4  sm:px-6 lg:px-[75px]">
            <div class="flex justify-between items-center py-2">
                <a href="/" class="md:flex hidden">
                    <img class="w-60 h-20" src="{{ asset('images/logo.png') }}" alt="">
                </a>
                <div class="md:flex hidden ms-auto me-16">
                    <ul class="flex justify-between items-center gap-8 ">
                        <li><a class="font-bold hover:!text-primary text-base" href="">Home<a></li>
                        <li><a class="font-bold hover:!text-primary text-base" href="">Contact<a></li>
                        <li><a class="font-bold hover:!text-primary text-base" href="">About<a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>

<div class="w-full bg-background pt-[132px] pb-10 ">
    <div class="max-w-6xl mx-auto flex justify-end w-full pe-10 mb-10">
        <a href="{{ route('dashboard') }}" class="text-base font-medium hover:underline hover:text-primary">Continue to Dashboard >></a>
    </div>
    <div class=" max-w-6xl w-full flex justify-center items-start mx-auto">
        <div class="grid md:grid-cols-2 gap-x-10 grid-cols-1 mx-10">
            <div>
                <h1 class="font-bold text-3xl mb-10">Meal Plan</h1>
                <div class="custom-scroll bg-white border flex flex-col gap-4 min-h-[900px] max-h-[900px] overflow-y-auto rounded-lg shadow py-4 px-10">
                    @foreach($data['foods'] as $food)
                    <div class="w-full">
                        <h1 class="text-2xl font-medium my-[18px] underline">{{ ucfirst($food['type']) }}</h1>
                        @foreach($food['foods'] as $meal)
                        <img src="{{ $meal['image'] }}" alt="" class="w-full max-h-[200px] border-[1px] rounded-md object-cover ">
                        <h1 class="font-bold text-xl mt-5 mb-2">Menu: {{ $meal['name'] }}</h1>
                        <ul class="list-disc ms-5 mb-2">
                            <li class="font-medium">Serving Weight: <span class="font-normal text-primary">{{ round($meal['serving_per_gram']) }} g ({{ $meal['serving_description'] }})</span></li>
                        </ul>
                        <ul class="list-disc ms-5 mb-8">
                            <li class="font-medium mb-1">Nutrition:</li>
                            <ul class="list-disc ms-5 mb-2">
                                <li>Calories: <span class="!text-primary">{{ round($meal['nutrition']['Calories']) }} kcal</span> </li>
                                <li>Protein: <span class="!text-primary">{{ round($meal['nutrition']['Protein (g)']) }} g</span></li>
                                <li>Fats: <span class="!text-primary">{{ round($meal['nutrition']['Fat (g)']) }} g</span></li>
                                <li>Carbohydrates: <span class="!text-primary">{{ round($meal['nutrition']['Carbohydrate (g)']) }} g</span></li>
                            </ul>
                        </ul>

                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
            <div>
                <h1 class="font-bold text-3xl mb-10">Workout Plan</h1>
                <div class="custom-scroll bg-white border flex flex-col gap-4 max-h-[900px] overflow-y-auto rounded-lg shadow py-4 px-10">
                    @foreach($data['workouts'] as $workout)
                    <div class="w-full">
                        <h1 class="text-2xl font-medium my-[18px] underline">All Time</h1>
                        <img src="{{ $workout['image'] }}" alt="" class="w-full max-h-[200px] border-[1px] rounded-md">
                        <h1 class="font-bold mt-5">{{ $workout['workout_name'] }}</h1>
                        <ul class="list-disc ms-5">
                            <li>Sets: <span class="!text-primary">3</span></li>
                            <li>Reps: <span class="!text-primary">6-10</span></li>
                            <li>Rest: <span class="!text-primary">90 seconds</span></li>
                            <li>Target Muscle: <span class="!text-primary">Back, Biceps</span></li>
                        </ul>
                    </div>
                    @endforeach

                </div>
            </div>


        </div>

    </div>
</div>
@endsection