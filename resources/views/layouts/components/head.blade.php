<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.19/dist/full.min.css" rel="stylesheet" type="text/css" />
    <!-- <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" /> -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

    <title>@section('title') @show @hasSection('title') - @endif {{ config('app.name') }}</title>
</head>