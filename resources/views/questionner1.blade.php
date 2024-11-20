<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>questionner1</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="bg-background flex justify-center items-center min-h-screen w-full  ">
        <div class="bg-white m-auto  w-[600px] h-[700px] border bg-white shadow rounded-xl">

            <h1 class="font-bold text-4xl mt-11 text-center">What is your baseline activity level?</h1>

            <p class="text-2xl text-center mt-12">Excluding sports–we count them separately</p>

            <form action="" class="mt-14">
                <div class="relative flex flex-col rounded-xl ml-5">
                    <nav class="flex min-w-[240px] flex-col gap-1 p-2">
                        <div
                        role="button"
                        class="flex w-full items-center rounded-lg p-0 transition-all hover:bg-slate-100 focus:bg-slate-100 active:bg-slate-100"
                        >
                            <label
                                for="react-vertical"
                                class="flex w-full cursor-pointer items-center px-3 py-2"
                            >
                                <div class="inline-flex items-center">
                                    <label class="relative flex items-center cursor-pointer" for="react-vertical">
                                        <input
                                        name="framework"
                                        type="radio"
                                        class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-slate-300 checked:border-slate-400 transition-all"
                                        id="react-vertical"
                                        checked
                                        />
                                        <span class="absolute bg-slate-800 w-3 h-3 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></span>
                                    </label>
                                    <label class="ml-2 font-bold cursor-pointer text-xl" for="react-vertical">
                                      <span class="text-primary">Not Active</span> (Sitting down in most of the day (e.g. bank teller, working at a desk)
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div
                        role="button"
                        class="flex w-full items-center rounded-lg p-0 transition-all hover:bg-slate-100 focus:bg-slate-100 active:bg-slate-100"
                        >
                            <label
                                for="vue-vertical"
                                class="flex w-full cursor-pointer items-center px-3 py-2"
                            >
                                <div class="inline-flex items-center">
                                    <label class="relative flex items-center cursor-pointer" for="vue-vertical">
                                        <input
                                        name="framework"
                                        type="radio"
                                        class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-slate-300 checked:border-slate-400 transition-all"
                                        id="vue-vertical"
                                        />
                                        <span class="absolute bg-slate-800 w-3 h-3 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></span>
                                    </label>
                                    <label class="ml-2 font-bold cursor-pointer text-xl" for="vue-vertical">
                                    <span class="text-primary">Quite Active</span>(Spending part of the day
                                    standing (e.g. teachers, salespeople))
                                    </label>
                                </div>
                            </label>
                        </div>
                        <div
                        role="button"
                        class="flex w-full items-center rounded-lg p-0 transition-all hover:bg-slate-100 focus:bg-slate-100 active:bg-slate-100"
                        >
                        <label
                            for="svelte-vertical"
                            class="flex w-full cursor-pointer items-center px-3 py-2"
                        >
                            <div class="inline-flex items-center">
                            <label class="relative flex items-center cursor-pointer" for="svelte-vertical">
                                <input
                                name="framework"
                                type="radio"
                                class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-slate-300 checked:border-slate-400 transition-all"
                                id="svelte-vertical"
                                />
                                <span class="absolute bg-slate-800 w-3 h-3 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></span>
                            </label>
                            <label class="ml-2 font-bold cursor-pointer text-xl" for="svelte-vertical">
                                <span class="text-primary">Active</span> (Spending part of the day in physical activity (e.g. waiter, postman)
                            </label>
                            </div>
                        </label>
                        </div>
                    </nav>
                </div>

            </form>
            
            <div class="mt-20 ml-16">
                <a href="{{ route('questionner1') }}" class="text-primary px-9 py-4 bg-white shadow border rounded-lg">Previous</a>
                <!-- <button class="text-bold text-white bg-primary px-14 rounded-lg py-4 shadow border ml-44"> <a href="{route('questionner2') }}"></a>Nexttest</button> -->
                <a href="{{ route('questionner2') }}" class="text-bold text-white bg-primary px-14 rounded-lg py-4 shadow border ml-44 hover:cursor-pointer">Next</a>

                
            </div>
        </div>
    </div>
</body>
</html>