<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="py-7 px-8 flex justify-between items-center border">
        <div class=" flex ">
            <img class="w-60 h-20" src="{{ asset('images/logo.png') }}" alt="">
        </div>

        <div class="flex gap-28">
            <ul class="flex justify-between items-center gap-24 ">
                <li><a class="font-bold hover:text-primary text-lg " href="">Home<a></li>
                <li><a class="font-bold hover:text-primary text-lg" href="">Contact<a></li>
                <li><a class="font-bold hover:text-primary text-lg " href="">About<a></li>
                
            </ul>
        </div>
    </nav>

    <div class="bg-background w-full h-full">
        

        <div class="flex justify-center items-start gap-20">
            <div class="bg-white w-[600px] border rounded-xl mt-20">
                <div class="px-16 mt-10">
                    <h1 class="font-bold text-3xl"> Meal Plan</h1>
                    <h1 class="text-2xl px-7 mt-6">Breakfast</h1>
                    <img src="{{ asset('images/breakfast.svg') }}" alt="" class="m-auto">
                    <h1 class="font-bold mt-5">Oatmeal with whole milk (60g oatmeal + 250ml whole milk)</h1>
                    <ul class="list-decimal">
                        <li>Calories: <span class="text-primary">330 kcal</span> </li>
                        <li>Protein: <span class="text-primary">15g</span></li>
                        <li>Fats: <span class="text-primary">10g</span></li>
                        <li>Carbohydrates: <span class="text-primary">50g</span></li>
                    </ul>
                </div>
                <div class="px-16 mt-10" >
                    <img src="{{ asset('images/breakfast2.svg') }}" alt="" class="m-auto mt-20">
                    <h1 class="font-bold mt-5">Oatmeal with whole milk (60g oatmeal + 250ml whole milk)</h1>
                    <ul class="list-decimal">
                        <li>Calories: <span class="text-primary">330 kcal</span> </li>
                        <li>Protein: <span class="text-primary">15g</span></li>
                        <li>Fats: <span class="text-primary">10g</span></li>
                        <li>Carbohydrates: <span class="text-primary">50g</span></li>
                    </ul>
                </div>
            </div>
            <div class="bg-white w-[600px] border rounded-xl mt-20">
                <div class="px-16 mt-10">
                <h1 class="font-bold text-3xl"> Workout Plan</h1>
                <h1 class="text-2xl px-7 mt-6 mb-6">Morning</h1>
                    <img src="{{ asset('images/pushup1.svg') }}" alt="" class="m-auto">
                    <h1 class="font-bold mt-5">Push-Up</h1>
                    <ul class="list-decimal">
                        <li>Sets: <span class="text-primary">3</span> </li>
                        <li>Reps: <span class="text-primary">6-10</span></li>
                        <li>Rest: <span class="text-primary">90 Seconds</span></li>
                        <li>Target muscles: <span class="text-primary">Back, Biseps</span></li>
                    </ul>
                    
                </div>
                <div class="px-16 mt-10" >
                    <img src="{{ asset('images/pullu1.svg') }}" alt="" class="m-auto mt-20">
                    <h1 class="font-bold mt-5">Oatmeal with whole milk (60g oatmeal + 250ml whole milk)</h1>
                    <ul class="list-decimal">
                        <li>Calories: <span class="text-primary">330 kcal</span> </li>
                        <li>Protein: <span class="text-primary">15g</span></li>
                        <li>Fats: <span class="text-primary">10g</span></li>
                        <li>Carbohydrates: <span class="text-primary">50g</span></li>
                    </ul>
                </div>
            </div>
            
            
        </div>
        
    </div>
</body>
</html>