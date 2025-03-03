<header class="absolute top-0 left-0 right-0 z-50 bg-white border-b">
    <div class="flex-none relative text-sm leading-6">
        <nav class="mx-auto lg:max-w-screen-xl px-4  sm:px-6 lg:px-[75px]">
            <div class="flex justify-between items-center py-2">
                <a href="/" class="md:flex hidden">
                    <img class="w-60 h-20" src="{{ asset('images/logo.png') }}" alt="">
                </a>
                <div class="md:flex hidden lg:ms-16">
                    <ul class="flex justify-between items-center gap-8 ">
                        <li><a class="font-bold hover:!text-primary text-base" href="">Home<a></li>
                        <li><a class="font-bold hover:!text-primary text-base" href="">Contact<a></li>
                        <li><a class="font-bold hover:!text-primary text-base" href="">About<a></li>
                    </ul>
                </div>
                <a href="{{ route('login') }}" class="md:flex hidden w-full max-w-[120px] flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white !bg-primary hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">Login</a>
            </div>
        </nav>
    </div>
</header>