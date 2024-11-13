<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="flex">
        <div class="mt-7 ml-7 h-screen ">
            <div>
                <img src="{{ asset('images/logo.png') }}" class="w-60 h-20" alt="">
            </div>
            <div class="px-8 mt-7 items-center space-y-4 ">
                <ul class="bg-primary px-7 py-3 w-fit h-13 flex rounded-lg items-center text-base gap-4 hover:text-white text-white hover:bg-primary font-bold ">
                    <ion-icon name="apps-outline" class="text-2xl"></ion-icon>
                    <li><button>Dashboard</button></li>
                </ul>
                <ul class="bg-white px-7 py-3 w-fit h-13 flex rounded-lg items-center text-base gap-4 hover:text-white text-black  hover:bg-primary font-bold">
                    <ion-icon class="text-3xl " name="person-circle-outline"></ion-icon>
                    <li><button>Profile</button></li>
                </ul>
                <ul class="bg-white px-7 py-3 w-fit h-13 flex rounded-lg items-center text-base gap-4 hover:text-white text-black  hover:bg-primary">
                    <ion-icon name="apps-outline" class="text-2xl"></ion-icon>
                    <li><button>Dashboard</button></li>
                </ul>
                <ul class="bg-white px-7 py-3 w-fit h-13 flex rounded-lg items-center text-base gap-4 hover:text-white text-black  hover:bg-primary">
                    <ion-icon name="apps-outline" class="text-2xl"></ion-icon>
                    <li><button>Dashboard</button></li>
                </ul>
            </div>
        </div>
        <div class="border"></div>
    </nav>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>
</html>