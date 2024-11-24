<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    @stack('scripts')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <title>@section('title') @show @hasSection('title') - @endif {{ config('app.name') }}</title>

</head>



<body class="bg-background ">
    <nav class="z-50 relative lg:flex hidden">
        <div class="fixed top-0 left-0 min-h-screen bg-white z-50 border-e-[1.5px]">
            <div class="pt-5 px-8">
                <img src="{{ asset('images/logo.png') }}" class="w-60 h-20" alt="">
            </div>
            <div class="px-8 mt-7 items-center space-y-4 ">
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'bg-primary text-white' : 'bg-white' }} px-7 py-3 w-full h-13 flex rounded-lg items-center text-base gap-4 hover:text-white text-black hover:bg-primary font-bold ">
                    <ion-icon name="apps-outline" class="text-2xl"></ion-icon>
                    Dashboard
                </a>
                <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'bg-primary text-white' : 'bg-white' }} px-7 py-3 w-full h-13 flex rounded-lg items-center text-base gap-4 hover:text-white text-black  hover:bg-primary font-bold">
                    <ion-icon class="text-2xl " name="person-circle-outline"></ion-icon>
                    Profile
                </a>
                <a href="{{ route('food.index') }}" class="{{ request()->routeIs('food.index') ? 'bg-primary text-white' : 'bg-white' }} px-7 py-3 w-full h-13 flex rounded-lg items-center text-base gap-4 hover:text-white text-black  hover:bg-primary">
                    <ion-icon name="pizza" class="text-2xl"></ion-icon>
                    Food
                </a>
                <a href="{{ route('workout.index') }}" class="{{ request()->routeIs('workout.index') ? 'bg-primary text-white' : 'bg-white' }} px-7 py-3 w-full h-13 flex rounded-lg items-center text-base gap-4 hover:text-white text-black  hover:bg-primary">
                    <ion-icon name="fitness" class="text-2xl"></ion-icon>
                    Workout
                </a>
            </div>
        </div>
        <div class="fixed top-0 w-full  bg-white border-b-[1.5px]">
            <div class="px-10 py-3 flex justify-end">
                <!-- <img src="{{ asset('images/picture1.jpg') }}" alt="profile" class="rounded-full size-[45px]"> -->
                <img src="https://image.winudf.com/v2/image/Y29tLnN5YWtpcmEuYW5pbWV3YWxscGFwZXJfc2NyZWVuXzBfMTUyNzA2MTI3MF8wMTg/screen-0.jpg?fakeurl=1&type=.jpg" alt="profile" class="rounded-full size-[35px]">
            </div>
        </div>
    </nav>


    <div class="lg:ms-[310px]  flex flex-col justify-center mt-[65px]">
        @yield('content')
    </div>





    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>