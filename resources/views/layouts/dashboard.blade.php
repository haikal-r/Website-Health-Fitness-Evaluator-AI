<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.components.head')

<body class="bg-white min-h-screen">
    @include('layouts.components.sidebar')

    <div class="lg:ms-[310px] flex flex-col justify-center mt-[65px]">
        @yield('content')
    </div>

    @include('layouts.components.script')
    @include('layouts.components.alerts')
</body>

</html>
