<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="bg-background flex justify-center items-center min-h-screen w-full  ">
        <div class="bg-white m-auto  w-[600px] h-[700px] border bg-white shadow rounded-xl">

            <h1 class="font-bold text-4xl mt-11 text-center">Great! You’ve just taken a  big step on your journey.</h1>

            <p class="text-xl italic text-center mt-40 ">Did you know that tracking your food is ascientifically proven method to being successful? It’s called 
            “self-monitoring” and the more consistent you are, the more likely you are to hit your goals.</p>

            
            
            <div class="mt-40  ml-16">
                <a href="{{ route('question_dislike') }}" class="text-primary px-9 py-4 bg-white shadow border rounded-lg">Previous</a>
                <a href="{{ route('result') }}" class="text-bold text-white bg-primary px-14 rounded-lg py-4 shadow border ml-44">Next</a>
            </div>
        </div>
    </div>
</body>
</html>