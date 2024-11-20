<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

</head>
<body>
    <div>
        <!-- KONTEN -->
        <div class="w-[81%]  top-32 left-[16.8rem] absolute bg-background">
            <div class="bg-white  m-14   rounded-2xl shadow-xl">
                <h1 class="font-bold text-[32px] ml-9 ">PROGRESS REPORT</h1>
                <div class=" flex justify-between">
                    <div class="bg-white shadow-2xl m-14 w-[600px]  rounded-2xl p-6">
                        <h1 class="font-bold text-lg">BMI</h1>

                        <!-- CHART -->
                        <figure class="highcharts-figure">
                            <div id="container"></div>
                            <!-- <p class="highcharts-description">
                                Chart showing use of plot bands with a gauge series. The chart is
                                updated dynamically every few seconds.
                            </p> -->
                        </figure>

                        <!-- END CHART -->
                        
                        <hr>
                        <div class="flex items-center justify-between">
                            <h1 class="text-lg">Height</h1>
                            <div class="flex items-center">
                                <p class="text-3xl font-bold ">170</p>
                                <p class="text-sm mr-5">CM</p>
                                <box-icon type='solid' name='pencil' class="text-2xl" ></box-icon>
                            </div>
                        </div>

                    </div>
                    <div class="bg-white shadow-2xl m-14 w-[600px]  rounded-2xl p-6">
                        <div class="flex justify-between items-center">
                            <h1 class="font-bold text-lg">Weight History</h1>
                            <button class="bg-primary px-7 py-2 text-white rounded-xl hover:text-black">Log</button>
                        </div>
                        
                        <!-- CHART -->
                        <div class="mt-14">
                            <canvas id="myChart"></canvas>
                        </div>
                        <!-- END CHART -->
                        <hr class="mt-12">
                        <div class="flex items-center justify-between">
                            <h1 class="text-lg">Weight</h1>
                            <div class="flex items-center">
                                <p class="text-3xl font-bold ">70</p>
                                <p class="text-sm mr-5">KG</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class=" flex justify-between">
                    <div class="bg-white shadow-2xl m-14 w-[600px] h-72 rounded-2xl p-6">
                        <h1 class="font-bold">Report</h1>
                        <div>
                            <div class=" flex justify-center items-center gap-20 mt-8">
                                <box-icon type='solid'size="lg" name='trophy'></box-icon>
                                <box-icon name='dumbbell' size="lg"></box-icon>
                                <box-icon type='solid' name='bowl-rice'size="lg"></box-icon>
                            </div>
                            <div class=" mt-5 flex justify-center items-center gap-[100px]">
                                <h1 class="font-bold text-2xl ">7</h1>
                                <h1 class="font-bold text-2xl ml-2 ">14</h1>
                                <h1 class="font-bold text-2xl ">16</h1>
                            </div>
                            <div class=" mt-6 flex  ">
                                <p class="text-base text-gray-400 text-center px-6  ">Best Streak</p>
                                <p class="text-base text-gray-400 text-center px-6">Workout</p>
                                <p class="text-base text-gray-400 text-center px-12 ">Meal</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow-2xl m-14 w-[600px] h-72 rounded-2xl p-6">
                        <div class="flex justify-between items-center">
                            <h1 class="font-bold text-lg">Workout and Meal History</h1>
                            <button class="bg-primary px-7 py-2 text-white rounded-xl hover:text-black">Log</button>
                        </div>
                        
                        
                        <!-- CHART -->
                        <div>
                            <canvas id="myChart2"></canvas>
                        </div>
                        <!-- END CHART -->
                        <hr>
                        <div class="flex items-center justify-between">
                            <h1 class="text-lg">Day Streak</h1>
                            <div class="flex items-center">
                                <p class="text-3xl font-bold ">7</p>
                                <box-icon type='solid' name='hot'></box-icon>
                            </div>
                        </div>
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
   

  

 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <!-- CHART WEIGTH HISTORY -->
    <script>
         
       
        const labels = [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday'
        ];

       
        const data = {
            labels: labels,
            datasets: [{
                label: 'Weight',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 70, 60, 40, 30, 90]
            }]
        };

       
        const config = {
            type: 'line',
            data: data, 
            options: {}
        };

       
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
   
    </script>
    <!-- END CHART WEIGTH HISTORY -->


    <!-- CHART WORKOUT ADN MEAL HISTORY -->

    <script>
        const ctx = document.getElementById('myChart2');

        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            datasets: [{
                label: 'Workout and Meal History',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });

        const myChart2 = new Chart(
            document.getElementById('myChart2'),
            config
        );
    </script>
    
    <!-- END CHART WORKOUT ADN MEAL HISTORY -->



    <!--  CHART HEIGHT --> 
     <script>
                Highcharts.chart("container", {
        chart: {
            type: "gauge",
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false,
            height: "80%",
        },

        title: {
            text: "Height",
        },

        pane: {
            startAngle: -90,
            endAngle: 89.9,
            background: null,
            center: ["50%", "75%"],
            size: "110%",
        },

        // the value axis
        yAxis: {
            min: 0,
            max: 200,
            tickPixelInterval: 72,
            tickPosition: "inside",
            tickColor: Highcharts.defaultOptions.chart.backgroundColor || "#FFFFFF",
            tickLength: 20,
            tickWidth: 2,
            minorTickInterval: null,
            labels: {
            distance: 20,
            style: {
                fontSize: "14px",
            },
            },
            lineWidth: 0,
            plotBands: [
            {
                from: 0,
                to: 130,
                color: "#55BF3B", // green
                thickness: 20,
                borderRadius: "50%",
            },
            {
                from: 150,
                to: 200,
                color: "#DF5353", // red
                thickness: 20,
                borderRadius: "50%",
            },
            {
                from: 120,
                to: 160,
                color: "#DDDF0D", // yellow
                thickness: 20,
            },
            ],
        },

        series: [
            {
            name: "Height",
            data: [170],
            tooltip: {
                valueSuffix: " Centi Meter",
            },
            dataLabels: {
                format: "{y} CM",
                borderWidth: 0,
                color:
                (Highcharts.defaultOptions.title &&
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color) ||
                "#333333",
                style: {
                fontSize: "16px",
                },
            },
            dial: {
                radius: "80%",
                backgroundColor: "gray",
                baseWidth: 12,
                baseLength: "0%",
                rearLength: "0%",
            },
            pivot: {
                backgroundColor: "gray",
                radius: 6,
            },
            },
        ],
        })

        // Add some life
        setInterval(() => {
        const chart = Highcharts.charts[0]
        if (chart && !chart.renderer.forExport) {
            // const point = chart.series[0].points[0],
            // inc = Math.round((Math.random() - 0.5) * 20)

            // let newVal = point.y + inc
            // if (newVal < 0 || newVal > 200) {
            // newVal = point.y - inc
            // }

            // point.update(newVal)
        }
        }, 3000)

     </script>   
    <!-- END CHART HEIGHT -->
           
</body>
</html>