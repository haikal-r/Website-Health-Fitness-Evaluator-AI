<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div>
        <!-- KONTEN -->
        <div class="w-[81%] h-screen top-32 left-[16.8rem] absolute bg-background">
            <div class="bg-white  m-14  h-[770px] rounded-2xl shadow-xl">
                <h1 class="font-bold text-[32px] ml-9 ">PROGRESS REPORT</h1>
                <div class=" flex justify-between">
                    <div class="bg-white shadow-xl m-14 w-[600px] h-64 rounded-2xl p-6">
                        <h1 class="font-bold text-lg">BMI</h1>
                        <div class="shadow bg-red-300 m-auto w-7 h-4 p-16 mb-8">CHART TINGGI</div>
                        <hr>
                        <div>
                            <h1 class="text-lg">Height</h1>
                            <div>
                                <p>170</p>
                                <p>CM</p>
                                <box-icon type='solid' name='pencil'></box-icon>
                            </div>
                        </div>

                    </div>
                    <div class="bg-white shadow-xl m-14 w-[600px] h-64 rounded-2xl">

                    </div>
                </div>
                <div class=" flex justify-between">
                    <div class="bg-white shadow-xl m-14 w-[600px] h-64 rounded-2xl">
                
                    </div>
                    <div class="bg-white shadow-xl m-14 w-[600px] h-64 rounded-2xl">

                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT -->

        <!-- HEADER -->
        @include('layouts/header')
        <!-- END HEADER -->

        <!-- SIDE BAR -->
        @include('layouts/sidebar')
        <!-- END SIDE BAR -->

        
    </div>
   

  

 



</body>
</html>