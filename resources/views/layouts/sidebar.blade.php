
@vite(['resources/css/app.css', 'resources/js/app.js'])
<nav class="flex">
        <div class="mt-7 ml-7 h-screen ">
            <div>
                <img src="{{ asset('images/logo.png') }}" class="w-60 h-20" alt="">
            </div>
            <div class="px-8 mt-7 items-center space-y-4 ">
                <div>
                    <a href="{{ route('dashboard') }}" class="">
                        <ul class="bg-primary px-7 py-3 w-10px h-13 flex rounded-lg items-center text-base gap-4 hover:text-white text-white hover:bg-primary font-bold  ">
                            <ion-icon name="apps-outline" class="text-2xl"></ion-icon>
                            <li>Dashboard</li>
                        </ul>
                    </a>
                </div>
                <div>
                    <a href="{{ route('profile') }}" class="space-y-4">
                        <ul class="bg-white px-7 py-3 w-10px h-13 flex rounded-lg items-center text-base gap-4 hover:text-white text-black  hover:bg-primary font-bold">
                            <ion-icon class="text-3xl " name="person-circle-outline"></ion-icon>
                            <li>Profile</li>
                        </ul>
                    </a>
                </div>
                <div>
                    <a href="{{ route('food') }}">
                        <ul class="bg-white px-7 py-3 w-10px h-13 flex rounded-lg items-center text-base gap-4 hover:text-white text-black  hover:bg-primary">
                            <box-icon name='bowl-rice' type='solid' class="text-2xl" ></box-icon>
                            <li>Food</li>
                        </ul>
                    </a>
                </div>
                <div>
                    <a href="{{ route('workout') }}">
                        <ul class="bg-white px-7 py-3 w-10px h-13 flex rounded-lg items-center text-base gap-4 hover:text-white text-black  hover:bg-primary">
                            <box-icon name='dumbbell' class="text-2xl" ></box-icon>
                            <li>Work out</li>
                        </ul>
                    </a>
                </div>
            </div>
        </div>
        <div class="border"></div>
    </nav>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
