@extends('layouts.dashboard')

@section('title', 'Workout')

@section('content')
    <div class="flex flex-col bg-white shadow-md m-6 p-6">

        <h1 class="text-2xl font-medium mb-6">Work Out</h1>
        <div class="ms-5">
            <div class="flex justify-between mb-8">
                <h1 class="font-medium text-xl">Full Body</h1>
                <div class="flex gap-[20px]">
                    <div class="flex items-center gap-1">
                        <img src="{{ asset('icon/thunder.svg') }}" alt="icon" class="size-6">
                        <p class="text-[#808080] text-[14px] font-medium">{{ $data->count() }} Exercise</p>
                    </div>
                    <div class="flex items-center gap-1">
                        <img src="{{ asset('icon/clock.svg') }}" alt="icon" class="size-6">
                        <p class="text-[#808080] text-[14px] font-medium">50-60 Min</p>
                    </div>
                    <div class="flex items-center gap-[2px]">
                        <img src="{{ asset('icon/fire.svg') }}" alt="icon" class="size-6">
                        <p class="text-[#808080] text-[14px] font-medium">850 Cal</p>
                    </div>
                </div>
            </div>

            <!-- workout start -->
            <div class="flex flex-col ">
                @foreach ($data as $workout)
                    <div class="flex items-center gap-9">
                        <img src="https://www.villagegym.co.uk/media/dz2mhj3y/untitled-19.jpg?width=1140&height=550&v=1da4f9a3da67d10" alt="{{ $workout->name }}" class="w-1/5 min-h-[200px] max-h-[200px] border-[1px] rounded-md object-cover">
                        <div>
                            <h1 class="font-medium ">{{ $workout->name }}:</h1>
                            <ul class="list-disc list-inside ms-4">
                                <li>Sets: <span class="!text-primary">3</span></li>
                                <li>Reps: <span class="!text-primary">6-10</span></li>
                                <li>Rest: <span class="!text-primary">90 seconds</span></li>
                                <li>Target Muscle: <span class="!text-primary">Back, Biceps</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="border-b-2 border-dashed my-[32px]"></div>
                @endforeach
            </div>

        </div>
    </div>

@endsection
