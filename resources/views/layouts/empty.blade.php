<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    @stack('scripts')

    <title>@section('title') @show @hasSection('title') - @endif {{ config('app.name') }}</title>

</head>

<body class="bg-background">
    <div class="flex flex-col" id="app">
        @yield('content')
    </div>
</body>

</html>