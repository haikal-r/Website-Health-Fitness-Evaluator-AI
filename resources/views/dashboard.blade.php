@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

<div class="flex flex-col  m-6 ">

    <h1 class="text-2xl font-medium mb-6">Progress Report</h1>

    <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
        <!-- bmi chart -->
        <div class="bg-white shadow-xl rounded-2xl p-6">
            <h1 class="font-bold text-lg">Your Current BMI</h1>

            <!-- CHART -->
            <div class="flex gap-3">
                <figure class="w-2/3 highcharts-figure">
                    <div id="container"></div>
                </figure>
                <div class="w-1/3 flex flex-col gap-2 justify-center">
                    <div class="flex gap-3 items-end">
                        <div class="p-3 bg-[#3498DB]"></div>
                        <p>Underweight</p>
                    </div>
                    <div class="flex gap-3 items-end">
                        <div class="p-3 bg-[#2ECC71]"></div>
                        <p>Normal</p>
                    </div>
                    <div class="flex gap-3 items-end">
                        <div class="p-3 bg-[#F1C40F]"></div>
                        <p>Overweight</p>
                    </div>
                    <div class="flex gap-3 items-end">
                        <div class="p-3 bg-[#E67E22]"></div>
                        <p>Obese</p>
                    </div>
                    <div class="flex gap-3 items-center">
                        <div class="p-3 bg-[#E74C3C]"></div>
                        <p>Extremely Obese</p>
                    </div>

                </div>
            </div>

        </div>

        <!-- weihgt history -->
        <div class="bg-white shadow-xl flex flex-col justify-between rounded-2xl p-6">
            <div class="flex justify-between items-center">
                <h1 class="font-bold text-lg">Weight History</h1>
                <div class="">
                    <button onclick="my_modal_3.showModal()" class="w-full min-w-[80px] flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white !bg-primary hover:bg-red-600">Log</button>

                    <dialog id="my_modal_3" class="modal">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Update Your Weight here</h3>
                            <p class="py-4">Edit your weight and submit the form.</p>

                            <!-- Form for updating user -->
                            <form id="updateUserForm" method="post" action="{{ route('user.update-weight') }}">
                                <!-- Input fields -->
                                @csrf
                                <div class="mb-5">
                                    <label for="weight" class="block text-sm font-medium mb-1">Weight</label>
                                    <input
                                        type="number"
                                        id="weight"
                                        name="weight"
                                        min="1"
                                        placeholder="ex: 80 Kg"
                                        value="{{ $userWeight ?? '' }}"
                                        class="form-input appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400  sm:text-sm"
                                        required>
                                </div>
                                <!-- Modal actions -->
                                <div class="modal-action">
                                    <!-- Close button -->
                                    <button type="button" class="btn" onclick="document.getElementById('my_modal_3').close()">Close</button>

                                    <!-- Submit button -->
                                    <button type="submit" class="btn text-white hover:text-white hover:bg-primary bg-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </dialog>
                </div>
            </div>

            <!-- CHART -->
            <div class="w-full ">
                <canvas id="myChart"></canvas>
            </div>
            <!-- END CHART -->

            <div class="flex items-center justify-between border-t-[1px]">
                <h1 class="text-lg pt-4">Weight</h1>
                <div class="flex items-center pt-4">
                    <p class="text-xl font-bold mr-1">{{ $userWeight }} <span class="font-normal text-base">KG</span></p>
                    <!-- <p class="text-sm">KG</p> -->
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
        <div class="bg-white shadow-xl flex flex-col justify-between gap-6 rounded-2xl p-6">
            <div class="flex justify-between items-center">
                <h1 class="font-bold text-lg">Workout and Meal History</h1>
                <button class="w-full max-w-[80px] min-w-[80px] flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white !bg-primary hover:bg-red-600">Log</button>
            </div>

            <!-- CHART -->
            <div class="w-full">
                <canvas id="myChart2"></canvas>
            </div>
            <!-- END CHART -->

            <div class="flex items-center justify-between border-t-[1px]">
                <h1 class="text-lg pt-4">Day Streak</h1>
                <div class="flex items-center pt-4">
                    <p class="text-xl font-bold ">7</p>
                    <box-icon type='solid' name='hot'></box-icon>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
@endpush

@push('scripts')
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

    const weightProgress = {{ $weights }};

    const data = {
        labels: labels,
        datasets: [{
            label: 'Weight',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: weightProgress
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
                borderWidth: 1,
                backgroundColor: '#EF4444',
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
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
    var bmi = {{ $userBMI ?? 0 }};
    Highcharts.chart('container', {
        chart: {
            type: 'gauge',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        title: {
            text: ''
        },
        pane: {
            startAngle: -150,
            endAngle: 150,
            background: [{
                backgroundColor: '#fff',
                borderWidth: 0,
                outerRadius: '109%'
            }, {
                backgroundColor: '#fff',
                borderWidth: 1,
                outerRadius: '107%'
            }]
        },
        yAxis: {
            min: 0,
            max: 50,
            lineWidth: 0,
            tickPixelInterval: 30,
            tickWidth: 2,
            tickColor: '#666',
            minorTickInterval: 'auto',
            minorTickWidth: 1,
            minorTickLength: 10,
            minorTickPosition: 'inside',
            minorTickColor: '#999',
            tickLength: 10,
            tickPosition: 'inside',
            labels: {
                step: 2,
                rotation: 'auto'
            },
            title: {
                text: null
            },
            plotBands: [{
                from: 0,
                to: 18.5,
                color: '#3498db', // Underweight
                label: {
                    text: '',
                    style: {
                        color: '#000',
                        fontSize: '10px'
                    }
                }
            }, {
                from: 18.5,
                to: 24.9,
                color: '#2ecc71', // Normal
                label: {
                    text: '',
                    style: {
                        color: '#000',
                        fontSize: '10px'
                    }
                }
            }, {
                from: 25,
                to: 29.9,
                color: '#f1c40f', // Overweight
                label: {
                    text: '',
                    style: {
                        color: '#000',
                        fontSize: '10px'
                    }
                }
            }, {
                from: 30,
                to: 34.9,
                color: '#e67e22', // Obese
                label: {
                    text: '',
                    style: {
                        color: '#000',
                        fontSize: '10px'
                    }
                }
            }, {
                from: 35,
                to: 50,
                color: '#e74c3c', // Extremely Obese
                label: {
                    text: '',
                    style: {
                        color: '#000',
                        fontSize: '10px'
                    }
                }
            }]
        },
        series: [{
            name: 'BMI',
            data: [bmi],
            tooltip: {
                valueSuffix: ' BMI'
            },
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: '24px', // Adjust the font size
                    fontWeight: 'bold',
                    color: '#333'
                },
                format: '<span style="font-size: 24px;">{y}</span>' // Format for data value
            }
        }],
        credits: {
            enabled: false // Disable Highcharts watermark
        },
        exporting: {
            enabled: false
        }
    });
</script>
@endpush
@endsection

