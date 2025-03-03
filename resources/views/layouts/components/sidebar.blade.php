<nav class="z-50 relative lg:flex hidden">
    <div class="fixed top-0 left-0 min-h-screen bg-white z-50 border-e-[1.5px]">
        <a href="/" class="pt-5 px-8 block">
            <img src="{{ asset('images/logo.png') }}" class="w-60 h-20" alt="">
        </a>
        <div class="px-8 mt-7 items-center space-y-4 ">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? '!bg-primary text-white' : 'bg-white' }} px-7 py-3 w-full h-13 flex rounded-lg items-center text-base gap-4 hover:text-white text-black hover:!bg-primary font-bold ">
                <ion-icon name="apps-outline" class="text-2xl"></ion-icon>
                Dashboard
            </a>
            <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? '!bg-primary text-white' : 'bg-white' }} px-7 py-3 w-full h-13 flex rounded-lg items-center text-base gap-4 hover:text-white text-black  hover:!bg-primary font-bold">
                <ion-icon class="text-2xl " name="person-circle-outline"></ion-icon>
                Profile
            </a>
            <a href="{{ route('food.index') }}" class="{{ request()->routeIs('food.index') ? '!bg-primary text-white' : 'bg-white' }} px-7 py-3 w-full h-13 flex rounded-lg items-center text-base gap-4 hover:text-white text-black  hover:!bg-primary">
                <ion-icon name="pizza" class="text-2xl"></ion-icon>
                Food
            </a>
            <a href="{{ route('workout.index') }}" class="{{ request()->routeIs('workout.index') ? '!bg-primary text-white' : 'bg-white' }} px-7 py-3 w-full h-13 flex rounded-lg items-center text-base gap-4 hover:text-white text-black  hover:!bg-primary">
                <ion-icon name="fitness" class="text-2xl"></ion-icon>
                Workout
            </a>
            <a href="{{ route('result') }}" class="{{ request()->routeIs('result') ? '!bg-primary text-white' : 'bg-white' }} px-7 py-3 w-full h-13 flex rounded-lg items-center text-base gap-4 hover:text-white text-black  hover:!bg-primary">
                <ion-icon name="sparkles-outline" class="text-2xl"></ion-icon>
                Result
            </a>
        </div>
    </div>
    <div class="fixed top-0 w-full  bg-white border-b-[1.5px]">
        <div class="px-10 py-3 flex justify-end">
            <div class="dropdown dropdown-hover dropdown-end">
                <div class="m-1">
                    <img src="{{ asset('images/default_profile.jpg') }}" alt="profile" class="rounded-full size-[40px]" tabindex="0" role="button">
                </div>
                <ul class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>