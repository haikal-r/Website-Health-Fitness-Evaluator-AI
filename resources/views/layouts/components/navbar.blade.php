<header class="w-full py-3 px-4 md:px-8 ">
    <div class="container mx-auto flex items-center justify-between">
        <a href="{{ url('/') }}" class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="EvaluatorAI Logo" class="h-16">
        </a>
        <nav class="hidden md:flex mr-28 space-x-8">
            <a href="{{ url('/') }}" class="font-medium">Home</a>
            <a href="#contact" class="font-medium">Contact</a>
            <a href="#about" class="font-medium">About</a>
        </nav>
        <a href="{{ route('login') }}">
            <button class="bg-orange-400 hover:bg-orange-500 text-white px-8 py-2 rounded-lg">
                Login
            </button>
        </a>
    </div>
</header>
