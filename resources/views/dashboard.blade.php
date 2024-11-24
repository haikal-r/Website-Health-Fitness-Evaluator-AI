@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

<div class="flex flex-col bg-white shadow-md m-6 p-6">

    <h1 class="text-2xl font-medium mb-6">Progress Report</h1>

    <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
        <!-- bmi chart -->
        <div class="bg-white shadow-xl rounded-2xl p-6">
            <h1 class="font-bold text-lg">BMI</h1>

            <!-- CHART -->
            <figure class="highcharts-figure">
                <div id="container"></div>
            </figure>

            <!-- END CHART -->

            <hr>
            <div class="flex items-center justify-between">
                <h1 class="text-lg">Height</h1>
                <div class="flex items-center">
                    <p class="text-3xl font-bold ">170</p>
                    <p class="text-sm mr-5">CM</p>
                    <box-icon type='solid' name='pencil' class="text-2xl"></box-icon>
                </div>
            </div>

        </div>

        <!-- weihgt history -->
        <div class="bg-white shadow-xl rounded-2xl p-6">
            <div class="flex justify-between items-center">
                <h1 class="font-bold text-lg">Weight History</h1>
                <div class="">
                    <button class="w-full min-w-[80px] flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">Log</button>
                </div>
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

        <!-- report chart -->
        <div class="bg-white shadow-xl rounded-2xl p-6">
            <h1 class="font-bold">Report</h1>
            <div class="flex justify-center items-center h-full">
                <div class="flex flex-col justify-center items-center">
                    <box-icon type='solid' size="lg" name='trophy'></box-icon>
                    <h1 class="font-bold text-2xl ">7</h1>
                    <p class="text-base text-gray-400 text-center px-6  ">Best Streak</p>
                </div>
                <div class="flex flex-col justify-center items-center">

                    <box-icon name='dumbbell' size="lg"></box-icon>

                    <h1 class="font-bold text-2xl ">16</h1>
                    <p class="text-base text-gray-400 text-center px-6">Workout</p>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <ion-icon name="pizza" class="text-4xl"></ion-icon>

                    <h1 class="font-bold text-2xl ml-2 ">14</h1>
                    <p class="text-base text-gray-400 text-center px-12 ">Meal</p>
                </div>
            </div>
        </div>

        <!-- workout and meal history -->
        <div class="bg-white shadow-xl rounded-2xl p-6">
            <div class="flex justify-between items-center">
                <h1 class="font-bold text-lg">Workout and Meal History</h1>
                <button class="w-full max-w-[80px] min-w-[80px] flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">Log</button>
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
            plotBands: [{
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

        series: [{
            name: "Height",
            data: [170],
            tooltip: {
                valueSuffix: " Centi Meter",
            },
            dataLabels: {
                format: "{y} CM",
                borderWidth: 0,
                color: (Highcharts.defaultOptions.title &&
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
        }, ],
    })
</script>




@endsection
