@extends('admin.layouts.base')

@section('title', 'admin.dashboard')

@section('content')
<!-- Main Content -->
<div class="flex-1 overflow-auto">
    <!-- Top Nav -->
    <div class="bg-white p-4 flex justify-between items-center border-b border-gray-200">
        <div class="flex-1 mx-4">
            <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" placeholder="Search..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-md w-64 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        <div class="flex items-center">
            <div class="ml-4">
                <i class="fas fa-user-circle text-gray-400 text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Dashboard Content -->
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Admin Dashboard</h1>
            <div class="flex items-center">
                <div class="mr-6 flex items-center">
                    <span class="mr-2 text-gray-700">Last 30 days</span>
                    <i class="fas fa-chevron-down text-gray-500"></i>
                </div>
                <button class="bg-orange-500 text-white px-4 py-2 rounded-md">Export Report</button>
            </div>
        </div>

        <!-- Tab Navigation -->
        <div class="flex mb-6 bg-white rounded-md overflow-hidden border border-gray-200">
            <div class="px-8 py-3 text-center border-b-2 border-orange-500 text-orange-500 font-medium">Overview</div>
            <div class="px-8 py-3 text-center text-gray-500 font-medium">Users</div>
            <div class="px-8 py-3 text-center text-gray-500 font-medium">Activity</div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-4 gap-6 mb-6">
            <!-- Total Users -->
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-gray-600">Total Users</span>
                    <span class="bg-orange-100 rounded-full p-2">
                        <i class="fas fa-users text-orange-400"></i>
                    </span>
                </div>
                <div class="text-3xl font-bold text-gray-800 mb-1">1,248</div>
                <div class="text-sm text-orange-500">
                    <i class="fas fa-arrow-up mr-1"></i> 12% from last month
                </div>
            </div>

            <!-- Active Users -->
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-gray-600">Active Users</span>
                    <span class="bg-blue-100 rounded-full p-2">
                        <i class="fas fa-bolt text-blue-400"></i>
                    </span>
                </div>
                <div class="text-3xl font-bold text-gray-800 mb-1">842</div>
                <div class="text-sm text-blue-500">
                    <i class="fas fa-arrow-up mr-1"></i> 5% from last month
                </div>
            </div>

            <!-- Nutrition Plans -->
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-gray-600">Nutrition Plans</span>
                    <span class="bg-green-100 rounded-full p-2">
                         <i class="fas fa-utensils text-green-400"></i>
                    </span>
                </div>
                <div class="text-3xl font-bold text-gray-800 mb-1">3,642</div>
                <div class="text-sm text-green-500">
                    <i class="fas fa-arrow-up mr-1"></i> 18% from last month
                </div>
            </div>

            <!-- Workout Plans -->
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-gray-600">Workout Plans</span>
                    <span class="bg-purple-100 rounded-full p-2">
                        <i class="fas fa-dumbbell text-purple-400"></i>
                    </span>
                </div>
                <div class="text-3xl font-bold text-gray-800 mb-1">2,845</div>
                <div class="text-sm text-purple-500">
                    <i class="fas fa-arrow-up mr-1"></i> 7% from last month
                </div>
            </div>
        </div>

        <!-- Row 2 -->
        <div class="grid grid-cols-2 gap-6 mb-6">
            <!-- User Activity Chart -->
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h2 class="text-xl font-bold text-gray-800 mb-1">User Activity Overview</h2>
                <p class="text-sm text-gray-500 mb-4">Daily active users and feature usage over time</p>
                <div class="h-64">
                    <canvas id="activityChart"></canvas>
                </div>
            </div>

            <!-- Popular Features -->
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h2 class="text-xl font-bold text-gray-800 mb-1">Popular Features</h2>
                <p class="text-sm text-gray-500 mb-4">Most used features in the last 30 days</p>

                <div class="mb-4">
                    <div class="flex justify-between mb-1">
                        <span class="text-gray-700">Nutrition Recommendations</span>
                        <span class="text-gray-600">68%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-orange-500 h-2 rounded-full" style="width: 68%"></div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="flex justify-between mb-1">
                        <span class="text-gray-700">Workout Plans</span>
                        <span class="text-gray-600">52%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: 52%"></div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="flex justify-between mb-1">
                        <span class="text-gray-700">Progress Tracking</span>
                        <span class="text-gray-600">45%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-green-500 h-2 rounded-full" style="width: 45%"></div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="flex justify-between mb-1">
                        <span class="text-gray-700">Questionnaire</span>
                        <span class="text-gray-600">38%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-pink-500 h-2 rounded-full" style="width: 38%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 3 -->
        <div class="grid grid-cols-2 gap-6">
            <!-- Recent User Registrations -->
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h2 class="text-xl font-bold text-gray-800 mb-1">Recent User Registrations</h2>
                <p class="text-sm text-gray-500 mb-4">Latest users who registered in the system</p>

                <table class="w-full">
                    <thead>
                        <tr class="text-gray-500 text-sm border-b">
                            <th class="text-left py-3">User</th>
                            <th class="text-left py-3">Date</th>
                            <th class="text-left py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="py-3">Budi Santoso</td>
                            <td class="py-3 text-gray-600">Apr 12, 2025</td>
                            <td class="py-3">
                                <span class="bg-orange-100 text-orange-600 text-xs px-2 py-1 rounded-full">Active</span>
                            </td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-3">Siti Rahayu</td>
                            <td class="py-3 text-gray-600">Apr 11, 2025</td>
                            <td class="py-3">
                                <span class="bg-orange-100 text-orange-600 text-xs px-2 py-1 rounded-full">Active</span>
                            </td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-3">Ahmad Hidayat</td>
                            <td class="py-3 text-gray-600">Apr 10, 2025</td>
                            <td class="py-3">
                                <span class="bg-yellow-100 text-yellow-600 text-xs px-2 py-1 rounded-full">Pending</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3">Dewi Lestari</td>
                            <td class="py-3 text-gray-600">Apr 09, 2025</td>
                            <td class="py-3">
                                <span class="bg-orange-100 text-orange-600 text-xs px-2 py-1 rounded-full">Active</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Popular Nutrition Recommendations -->
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h2 class="text-xl font-bold text-gray-800 mb-1">Popular Nutrition Recommendations</h2>
                <p class="text-sm text-gray-500 mb-4">Most recommended nutrition plans</p>

                <div class="mb-4 flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="bg-orange-500 rounded-full p-3 mr-3">
                            <i class="fas fa-utensils text-white"></i>
                        </div>
                        <div>
                            <div class="font-medium">High Protein Diet</div>
                            <div class="text-sm text-gray-500">For muscle building</div>
                        </div>
                    </div>
                    <div class="bg-orange-50 text-orange-700 text-sm px-3 py-1 rounded-full">
                        428 users
                    </div>
                </div>

                <div class="mb-4 flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="bg-blue-500 rounded-full p-3 mr-3">
                            <i class="fas fa-utensils text-white"></i>
                        </div>
                        <div>
                            <div class="font-medium">Low Carb Diet</div>
                            <div class="text-sm text-gray-500">For weight loss</div>
                        </div>
                    </div>
                    <div class="bg-blue-50 text-blue-700 text-sm px-3 py-1 rounded-full">
                        356 users
                    </div>
                </div>

                <div class="mb-4 flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="bg-green-500 rounded-full p-3 mr-3">
                            <i class="fas fa-utensils text-white"></i>
                        </div>
                        <div>
                            <div class="font-medium">Balanced Diet</div>
                            <div class="text-sm text-gray-500">For maintenance</div>
                        </div>
                    </div>
                    <div class="bg-green-50 text-green-700 text-sm px-3 py-1 rounded-full">
                        289 users
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="bg-purple-500 rounded-full p-3 mr-3">
                            <i class="fas fa-utensils text-white"></i>
                        </div>
                        <div>
                            <div class="font-medium">Plant-based Diet</div>
                            <div class="text-sm text-gray-500">For vegetarians</div>
                        </div>
                    </div>
                    <div class="bg-purple-50 text-purple-700 text-sm px-3 py-1 rounded-full">
                        214 users
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        // Chart.js setup for activity chart
        const ctx = document.getElementById('activityChart').getContext('2d');
        const activityChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Apr 1', 'Apr 5', 'Apr 10', 'Apr 15', 'Apr 20', 'Apr 25', 'Apr 30'],
                datasets: [
                    {
                        label: 'Daily Active Users',
                        data: [320, 420, 380, 490, 550, 580, 620],
                        borderColor: 'rgb(59, 130, 246)',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        tension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Feature Usage',
                        data: [280, 350, 300, 420, 480, 510, 550],
                        borderColor: 'rgb(239, 68, 68)',
                        backgroundColor: 'rgba(239, 68, 68, 0.1)',
                        tension: 0.4,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                            color: 'rgba(0, 0, 0, 0.05)'
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
    </script>
</body>
</html>
@endsection
