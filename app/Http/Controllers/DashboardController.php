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

        // … bagian atas tetap …

        $weeks = [];
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        foreach ($progressData as $data) {
            $tanggal    = $data->updated_at;                 // kolom sudah nullable?
            if (!$tanggal) continue;                         // skip baris tanpa tanggal

            $year       = $tanggal->year;
            $weekNumber = $tanggal->weekOfYear;

            $dayIndex   = $tanggal->dayOfWeekIso - 1;        // 0 = Monday, …, 6 = Sunday

            $weeks[$year][$weekNumber] ??= array_fill(0, 7, null);
            $weeks[$year][$weekNumber][$dayIndex] = $data->weight;
        }

        /** ------------- handle jika tidak ada data ------------- */
        if (empty($weeks)) {
            return view('dashboard', [
                'userWeight' => $userWeight,
                'userBMI'    => $userBMI,
                'weights'    => json_encode(array_fill(0, 7, null))
            ]);
        }

        /** ------------- ambil minggu terbaru ------------- */
        $latestYear       = max(array_keys($weeks));
        $latestWeekNumber = max(array_keys($weeks[$latestYear]));
        $latestWeekData   = $weeks[$latestYear][$latestWeekNumber];

        return view('dashboard', [
            'userWeight' => $userWeight,
            'userBMI'    => $userBMI,
            'weights'    => json_encode($latestWeekData)
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
