<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Experience</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    
    <div class="bg-background flex justify-center items-center min-h-screen w-full  ">
        <div class="bg-white m-auto  w-[600px] h-[700px] border bg-white shadow rounded-xl">

            <h1 class="font-bold text-4xl mt-11 text-center">Your Experience</h1>

            <p class="text-2xl text-center mt-12">Are you a beginner, moderate, or expert in workout and diet?</p>

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
                             <span class="text-primary">Beginner</span> (A beginner in exercise and diet is someone who is just starting physical activity and a healthy diet,)
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
                             <span class="text-primary">Moderate</span>( In exercise and diet refers to a level of activity or eating pattern that is done in moderation, either too tight not too excessive.)
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
                                <span class="text-primary">Expert</span> (An expert is someone who has in-depth knowledge and high skills in sports and diet, so that they are able to understand.)
                            </label>
                            </div>
                        </label>
                        </div>
                    </nav>
                </div>

            </form>
            
            <div class="mt-3 ml-16">
                <a href="" class="text-primary px-9 py-4 bg-white shadow border rounded-lg">Previous</a>
                <a href="{{ route('question_goals') }}" class="text-bold text-white bg-primary px-14 rounded-lg py-4 shadow border ml-44">Next</a>
            </div>
        </div>
    </div>
</body>
</html>