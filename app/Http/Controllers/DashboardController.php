<?php

namespace App\Http\Controllers;

use App\Models\BiodataUser;
use App\Models\Progress;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{
    public function index()
    {
        $user = BiodataUser::where('user_id', $this->user->id)->first();
        $userWeight = $user->weight ?? 0;
        $userBMI = $user->bmi ?? 0;

        $progressData = Progress::where('user_id', $this->user->id)->get();

        $weeks = [];  
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        foreach ($progressData as $data) {
            $tanggal = $data->updated_at ?? 0;  
            $weekNumber = $tanggal->weekOfYear ?? 0;  
            $year = $tanggal->year ?? 0;  

            $dayName = Carbon::parse($tanggal)->format('l');
            $dayIndex = array_search($dayName, $daysOfWeek); 

            if (!isset($weeks[$year][$weekNumber])) {
                $weeks[$year][$weekNumber] = [0, 0, 0, 0, 0, 0, 0];  
            }

            $weeks[$year][$weekNumber][$dayIndex] = $data->weight;
        }

        $weekLabels = [];
        $weekData = [];

        $latestWeekNumber = max(array_keys($weeks[$year])); 
        $latestWeekData = $weeks[$year][$latestWeekNumber]; 

        $weekLabels[] = "Minggu $latestWeekNumber"; 
        $weekData[] = $latestWeekData; 

        return view('dashboard', [
            'userWeight' => $userWeight,
            'userBMI' => $userBMI,
            'weights' => json_encode($latestWeekData)
        ]);
    }

    public function getStats()
    {
        $totalUsers = User::count();
        $activeUsers = User::where('is_active', true)->count();

        return response()->json([
            'total_users' => $totalUsers,
            'active_users' => $activeUsers,
            // 'nutrition_plans' => $nutritionPlans,
            // 'workout_plans' => $workoutPlans,
        ]);
    }

    public function nutritionTrends()
    {

        return view('admin.nutrition-trends');
    }
    public function workoutAnalytic()
    {
        return view('admin.workout-analytic');
    }
}
