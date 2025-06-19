@extends('layouts.dashboard')

@section('title', 'Food')

@section('content')
<div class="flex flex-col bg-white shadow-md m-6 p-6">

    <div class="flex justify-between">
        <h1 class="text-2xl font-medium mb-6">Food</h1>

    </div>
    <div class="ms-5">


        <div class="flex flex-col ">
            @foreach($data as $mealPlan)
            <h1 class="font-medium text-xl mb-8">{{ $mealPlan['type'] }}</h1>

            @foreach($mealPlan['foods'] as $food)

            <div class="flex items-center gap-9 mb-8">
                <img src={{ $food['image'] }} alt="Push Up" class="w-1/3 min-h-[200px] max-h-[200px] border-[1px] rounded-md object-cover">
                <div>
                    <h1 class="font-medium ">{{ $food['name'] }}</h1>
                    <ul class="list-disc list-inside ms-4">
                        <li>Calories: <span class="!text-primary">{{ $food['calories'] }}</span></li>
                        <li>Protein: <span class="!text-primary">{{ $food['protein'] }}</span></li>
                        <li>Fats: <span class="!text-primary">{{ $food['fat'] }}</span></li>
                        <li>Carbohydrates: <span class="!text-primary">{{ $food['carbs'] }}</span></li>
                    </ul>
                </div>
            </div>
            @endforeach

            <div class="border-b-2 border-dashed my-[32px]"></div>
            @endforeach


        </div>

    </div>
</div>

@endsection
