<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question BMI</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="bg-background flex justify-center items-center min-h-screen w-full  ">
        <div class="bg-white m-auto  w-[600px] h-[700px] border bg-white shadow rounded-xl">

            <h1 class="font-bold text-4xl mt-14 text-center">BMI</h1>

            <p class="text-xl text-center mt-12">what is your height and weight?</p>

            <form action="" class="mt-14 mx-28">
                <div class="relative flex flex-col rounded-xl ml-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Height
                        </label>
                        <div class="mt-1 flex items-center  gap-3">
                            <input  type="number" 
                                class="form-input appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                                <h1 class="text-gray-700 font-bold">Cm</h1>
                        </div>
                    
                    </div>
                    <div class="mt-8">
                        <label class="block text-sm font-medium text-gray-700">
                            weight
                        </label>
                        <div class="mt-1 flex items-center  gap-3" >
                            <input  type="number" 
                                class="form-input appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                                <h1 class="text-gray-700 font-bold">Kg</h1>
                        </div>
                    
                    </div>
                </div>

            </form>
            
            <div class="mt-40 ml-16">
                <a href="{{ route('question_goals') }}" class="text-primary px-9 py-4 bg-white shadow border rounded-lg">Previous</a>
                <a href="{{ route('question_activity') }}" class="text-bold text-white bg-primary px-14 rounded-lg py-4 shadow border ml-44">Next</a>
            </div>
        </div>
    </div>
</body>
</html>