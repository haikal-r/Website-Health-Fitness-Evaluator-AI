@extends('layouts.empty')

@section('title', 'Login')

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
                        <li><a class="font-bold hover:text-primary text-base" href="">Home<a></li>
                        <li><a class="font-bold hover:text-primary text-base" href="">Contact<a></li>
                        <li><a class="font-bold hover:text-primary text-base" href="">About<a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>


<div class="bg-background max-w-6xl w-full flex justify-center items-start mx-auto  mt-[170px] mb-10 ">


    <div class="grid md:grid-cols-2 gap-x-10 grid-cols-1 mx-10">
        <div>
            <h1 class="font-bold text-3xl mb-10">Meal Plan</h1>
            <div class="custom-scroll bg-white border flex flex-col gap-4 min-h-[900px] max-h-[900px] overflow-y-auto rounded-lg shadow py-4 px-10">
                <div class="w-full">
                    <h1 class="text-2xl font-medium my-[18px]">Breakfast</h1>
                    <img src="{{ asset('images/breakfast1.jpeg') }}" alt="" class="w-full max-h-[200px]">
                    <h1 class="font-bold mt-5">Oatmeal with whole milk (60g oatmeal + 250ml whole milk)</h1>
                    <ul class="list-decimal ms-10">
                        <li>Calories: <span class="text-primary">330 kcal</span> </li>
                        <li>Protein: <span class="text-primary">15g</span></li>
                        <li>Fats: <span class="text-primary">10g</span></li>
                        <li>Carbohydrates: <span class="text-primary">50g</span></li>
                    </ul>
                </div>
                <div class="w-full">
                    <h1 class="text-2xl font-medium my-[18px]">Breakfast</h1>
                    <img src="{{ asset('images/breakfast1.jpeg') }}" alt="" class="w-full max-h-[200px]">
                    <h1 class="font-bold mt-5">Oatmeal with whole milk (60g oatmeal + 250ml whole milk)</h1>
                    <ul class="list-decimal ms-10">
                        <li>Calories: <span class="text-primary">330 kcal</span> </li>
                        <li>Protein: <span class="text-primary">15g</span></li>
                        <li>Fats: <span class="text-primary">10g</span></li>
                        <li>Carbohydrates: <span class="text-primary">50g</span></li>
                    </ul>
                </div>
                <div class="w-full">
                    <h1 class="text-2xl font-medium my-[18px]">Breakfast</h1>
                    <img src="{{ asset('images/breakfast1.jpeg') }}" alt="" class="w-full max-h-[200px]">
                    <h1 class="font-bold mt-5">Oatmeal with whole milk (60g oatmeal + 250ml whole milk)</h1>
                    <ul class="list-decimal ms-10">
                        <li>Calories: <span class="text-primary">330 kcal</span> </li>
                        <li>Protein: <span class="text-primary">15g</span></li>
                        <li>Fats: <span class="text-primary">10g</span></li>
                        <li>Carbohydrates: <span class="text-primary">50g</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div>
            <h1 class="font-bold text-3xl mb-10">Workout Plan</h1>
            <div class="custom-scroll bg-white border flex flex-col gap-4 max-h-[900px] overflow-y-auto rounded-lg shadow py-4 px-10">
                <div class="w-full">
                    <h1 class="text-2xl font-medium my-[18px]">Breakfast</h1>
                    <img src="{{ asset('images/breakfast1.jpeg') }}" alt="" class="w-full max-h-[200px]">
                    <h1 class="font-bold mt-5">Oatmeal with whole milk (60g oatmeal + 250ml whole milk)</h1>
                    <ul class="list-decimal ms-10">
                        <li>Calories: <span class="text-primary">330 kcal</span> </li>
                        <li>Protein: <span class="text-primary">15g</span></li>
                        <li>Fats: <span class="text-primary">10g</span></li>
                        <li>Carbohydrates: <span class="text-primary">50g</span></li>
                    </ul>
                </div>
                <div class="w-full">
                    <h1 class="text-2xl font-medium my-[18px]">Breakfast</h1>
                    <img src="{{ asset('images/breakfast1.jpeg') }}" alt="" class="w-full max-h-[200px]">
                    <h1 class="font-bold mt-5">Oatmeal with whole milk (60g oatmeal + 250ml whole milk)</h1>
                    <ul class="list-decimal ms-10">
                        <li>Calories: <span class="text-primary">330 kcal</span> </li>
                        <li>Protein: <span class="text-primary">15g</span></li>
                        <li>Fats: <span class="text-primary">10g</span></li>
                        <li>Carbohydrates: <span class="text-primary">50g</span></li>
                    </ul>
                </div>
                <div class="w-full">
                    <h1 class="text-2xl font-medium my-[18px]">Breakfast</h1>
                    <img src="{{ asset('images/breakfast1.jpeg') }}" alt="" class="w-full max-h-[200px]">
                    <h1 class="font-bold mt-5">Oatmeal with whole milk (60g oatmeal + 250ml whole milk)</h1>
                    <ul class="list-decimal ms-10">
                        <li>Calories: <span class="text-primary">330 kcal</span> </li>
                        <li>Protein: <span class="text-primary">15g</span></li>
                        <li>Fats: <span class="text-primary">10g</span></li>
                        <li>Carbohydrates: <span class="text-primary">50g</span></li>
                    </ul>
                </div>

            </div>
        </div>


    </div>

</div>
@endsection