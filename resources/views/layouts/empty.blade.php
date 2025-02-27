<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.components.head')

<body class="">
    @yield('content')
    @include('layouts.components.script')
    @include('layouts.components.alerts')
</body>

</html>