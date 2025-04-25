@extends('admin.layouts.base')

@section('title', 'Workout Analytics Dashboard')

@section('content')
<div class="flex-1 bg-gray-50 min-h-screen">
    <div class="p-10">
        <div class="mb-4">
            <h1 class="text-3xl font-bold text-gray-800">Workout Analytics</h1>
            <p class="text-gray-600">Detailed analysis of user exercise patterns and performance</p>
        </div>

        <div class="flex justify-end mb-6">
            <div class="bg-gray-100 px-4 py-2 rounded-lg flex items-center cursor-pointer">
                <span class="text-gray-700">Last 30 days</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Popular Workout Types -->
            <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
                <h2 class="text-xl font-semibold text-gray-700 mb-6">Popular Workout Types</h2>
                <div class="flex justify-center">
                    <div class="w-full h-64">
                        <canvas id="workoutTypesChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Average Workout Duration -->
            <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
                <h2 class="text-xl font-semibold text-gray-700 mb-6">Average Workout Duration</h2>
                <div class="h-64">
                    <canvas id="workoutDurationChart"></canvas>
                </div>
            </div>

            <!-- User Progress Metrics -->
            <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
                <h2 class="text-xl font-semibold text-gray-700 mb-6">User Progress Metrics</h2>
                <div class="h-64">
                    <canvas id="progressMetricsChart"></canvas>
                </div>
            </div>

            <!-- Workout Feature Usage -->
            <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
                <h2 class="text-xl font-semibold text-gray-700 mb-6">Workout Feature Usage</h2>
                <div class="h-64 px-4">
                    <div class="mb-5">
                        <div class="flex justify-between mb-1">
                            <span class="text-sm text-gray-600">Workout Tracking</span>
                            <span class="text-sm text-gray-600">80%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-blue-500 h-3 rounded-full" style="width: 80%"></div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <div class="flex justify-between mb-1">
                            <span class="text-sm text-gray-600">Pre-made Workouts</span>
                            <span class="text-sm text-gray-600">70%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-blue-500 h-3 rounded-full" style="width: 70%"></div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <div class="flex justify-between mb-1">
                            <span class="text-sm text-gray-600">Custom Exercises</span>
                            <span class="text-sm text-gray-600">60%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-blue-500 h-3 rounded-full" style="width: 60%"></div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <div class="flex justify-between mb-1">
                            <span class="text-sm text-gray-600">Social Sharing</span>
                            <span class="text-sm text-gray-600">50%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-blue-500 h-3 rounded-full" style="width: 50%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Pie Chart for Workout Types
    const workoutTypesCtx = document.getElementById('workoutTypesChart').getContext('2d');
    const workoutTypesChart = new Chart(workoutTypesCtx, {
    type: 'pie',
    data: {
        labels: ['Strength (45%)', 'Cardio (25%)', 'Yoga (15%)', 'Other (15%)'],
        datasets: [{
            data: [45, 25, 15, 15],
            backgroundColor: [
                '#4285F4', // Blue for Strength
                '#34A853', // Green for Cardio
                '#FBBC05', // Yellow for Yoga
                '#EA4335'  // Red for Other
            ],
            borderWidth: 0
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'right',
                labels: {
                    boxWidth: 15,
                    padding: 15,
                    font: {
                        size: 12
                    }
                }
            }
        }
    }
    });

    // Bar Chart for Workout Duration
    const workoutDurationCtx = document.getElementById('workoutDurationChart').getContext('2d');
    const workoutDurationChart = new Chart(workoutDurationCtx, {
    type: 'bar',
    data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [{
            label: 'Average Duration (minutes)',
            data: [45, 50, 60, 45, 65, 50, 45],
            backgroundColor: '#4285F4',
            borderRadius: 2,
            barThickness: 30
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    display: false
                },
                ticks: {
                    display: false
                }
            },
            x: {
                grid: {
                    display: false
                }
            }
        }
    }
    });

    // Line Chart for User Progress
    const progressMetricsCtx = document.getElementById('progressMetricsChart').getContext('2d');
    const progressMetricsChart = new Chart(progressMetricsCtx, {
    type: 'line',
    data: {
        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6'],
        datasets: [
            {
                label: 'Strength Gain',
                data: [20, 25, 40, 35, 45, 55],
                borderColor: '#4285F4',
                backgroundColor: 'rgba(66, 133, 244, 0.1)',
                borderWidth: 2,
                tension: 0.4,
                fill: false
            },
            {
                label: 'Weight Loss',
                data: [30, 35, 28, 32, 25, 40],
                borderColor: '#34A853',
                borderWidth: 2,
                tension: 0.4,
                fill: false
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    boxWidth: 12,
                    padding: 20,
                    font: {
                        size: 12
                    }
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    display: false
                },
                ticks: {
                    display: false
                }
            },
            x: {
                grid: {
                    display: false
                }
            }
        }
    }
    });
    });
    </script>

@endsection

@push('scripts')

@endpush
