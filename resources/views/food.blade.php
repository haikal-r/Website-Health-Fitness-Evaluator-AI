<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div>
        <!-- KONTEN -->
        <div class="w-[81%] h-screen top-32 left-[16.8rem] absolute bg-background">
            tes konten food
        </div>
        <!-- END CONTENT -->

        <!-- HEADER -->
        @include('layouts/header')
        <!-- END HEADER -->

        <!-- SIDE BAR -->
        @include('layouts/sidebar')
        <!-- END SIDE BAR -->

        
    </div>
</body>
</html>