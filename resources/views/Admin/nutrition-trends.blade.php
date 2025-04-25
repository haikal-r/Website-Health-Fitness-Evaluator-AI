@extends('admin.layouts.base')

@section('title', 'Nutrition Trends')

@section('content')
<div class="flex-1 overflow-y-auto">
    <div class="p-10">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Nutrition Trends</h1>
                <p class="text-gray-600">Overview of user nutrition habits and patterns over time</p>
            </div>
            <div>
                <select id="timeRangeFilter" class="px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                    <option value="30">Last 30 days</option>
                    <option value="60">Last 60 days</option>
                    <option value="90">Last 90 days</option>
                    <option value="custom">Custom range</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Popular Diet Types -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Popular Diet Types</h2>
                <div class="h-64">
                    <canvas id="dietTypesChart"></canvas>
                </div>
            </div>

            <!-- Macronutrient Trends -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Macronutrient Trends</h2>
                <div class="h-64">
                    <canvas id="macronutrientChart"></canvas>
                </div>
            </div>

            <!-- Average Daily Calorie Intake -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Average Daily Calorie Intake</h2>
                <div class="h-64">
                    <canvas id="calorieIntakeChart"></canvas>
                </div>
            </div>

            <!-- Most Logged Foods -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Most Logged Foods</h2>
                <div id="mostLoggedFoods" class="space-y-4">
                    <!-- Food items will be populated by JavaScript -->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize all charts
        initDietTypesChart();
        initMacronutrientChart();
        initCalorieIntakeChart();
        renderMostLoggedFoods();

        // Handle time range changes
        document.getElementById('timeRangeFilter').addEventListener('change', function() {
            // In a real app, this would fetch new data based on the selected time range
            // For now, we'll just refresh with the same data
            updateAllCharts();
        });
    });

    // Diet Types Chart
    function initDietTypesChart() {
        const ctx = document.getElementById('dietTypesChart').getContext('2d');
        const dietData = {
            labels: ['Keto', 'Vegan', 'Mediterranean', 'Other'],
            datasets: [{
                label: 'Percentage of Users',
                data: [42, 31, 18, 9],
                backgroundColor: [
                    'rgba(249, 115, 22, 0.9)',
                    'rgba(249, 115, 22, 0.7)',
                    'rgba(249, 115, 22, 0.5)',
                    'rgba(249, 115, 22, 0.3)',
                ],
                borderWidth: 1
            }]
        };

        window.dietChart = new Chart(ctx, {
            type: 'bar',
            data: dietData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 50,
                        ticks: {
                            callback: function(value) {
                                return value + '%';
                            }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.raw + '%';
                            }
                        }
                    },
                    legend: {
                        display: false
                    }
                }
            }
        });
    }

    // Macronutrient Chart
    function initMacronutrientChart() {
        const ctx = document.getElementById('macronutrientChart').getContext('2d');
        const days = ['Day 3', 'Day 9', 'Day 15', 'Day 21', 'Day 27'];

        const macroData = {
            labels: days,
            datasets: [
                {
                    label: 'Protein (25-35g)',
                    data: [29, 28, 33, 18, 25, 28, 30],
                    borderColor: '#10B981', // Green
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    tension: 0.3
                },
                {
                    label: 'Carbs (30-50g)',
                    data: [25, 30, 27, 32, 30, 45, 50],
                    borderColor: '#3B82F6', // Blue
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.3
                },
                {
                    label: 'Fat (20-35g)',
                    data: [30, 25, 35, 30, 35, 40, 35],
                    borderColor: '#F59E0B', // Yellow
                    backgroundColor: 'rgba(245, 158, 11, 0.1)',
                    tension: 0.3
                }
            ]
        };

        window.macroChart = new Chart(ctx, {
            type: 'line',
            data: macroData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        min: 0,
                        max: 60,
                        ticks: {
                            callback: function(value) {
                                return value + 'g';
                            }
                        }
                    }
                }
            }
        });
    }

    // Calorie Intake Chart
    function initCalorieIntakeChart() {
        const ctx = document.getElementById('calorieIntakeChart').getContext('2d');
        const days = ['Day 3', 'Day 9', 'Day 15', 'Day 21', 'Day 27'];
        const calorieData = [1860, 1910, 1880, 1950, 1980, 2010, 2080, 2120, 2175, 2240];

        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(251, 146, 60, 0.4)');
        gradient.addColorStop(1, 'rgba(251, 146, 60, 0)');

        const calorieChartData = {
            labels: days,
            datasets: [{
                label: 'Calorie Intake',
                data: [1860, 1910, 1880, 1950, 2240],
                borderColor: '#FB923C',
                backgroundColor: gradient,
                borderWidth: 2,
                fill: true,
                pointBackgroundColor: '#FFFFFF',
                pointBorderColor: '#FB923C',
                pointBorderWidth: 2,
                pointRadius: 4,
                tension: 0.3
            }]
        };

        window.calorieChart = new Chart(ctx, {
            type: 'line',
            data: calorieChartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        min: 1500,
                        max: 2500,
                        ticks: {
                            callback: function(value) {
                                return value + ' kcal';
                            }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.raw + ' kcal';
                            }
                        }
                    }
                }
            }
        });
    }

    // Most Logged Foods Rendering
    function renderMostLoggedFoods() {
        const container = document.getElementById('mostLoggedFoods');
        const foodData = [
            { name: 'Chicken Breast', percentage: 32 },
            { name: 'Brown Rice', percentage: 28 },
            { name: 'Salmon', percentage: 24 },
            { name: 'Avocado', percentage: 19 },
            { name: 'Eggs', percentage: 15 }
        ];

        container.innerHTML = '';

        foodData.forEach((food, index) => {
            const foodItem = document.createElement('div');
            foodItem.className = 'flex flex-col';
            foodItem.innerHTML = `
                <div class="flex justify-between mb-1">
                    <div class="flex items-center">
                        <span class="font-medium text-gray-700 mr-2">${index + 1}. ${food.name}</span>
                    </div>
                    <div class="text-gray-600 font-medium">${food.percentage}%</div>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-orange-500 h-2.5 rounded-full" style="width: ${food.percentage}%"></div>
                </div>
            `;
            container.appendChild(foodItem);
        });
    }

    function updateAllCharts() {
        // In a real app, this would fetch new data from an API based on filters
        // For this example, we just refresh the charts (they'll stay the same)
        window.dietChart.update();
        window.macroChart.update();
        window.calorieChart.update();
        renderMostLoggedFoods();
    }
</script>
@endsection
@push('scripts')

@endpush

