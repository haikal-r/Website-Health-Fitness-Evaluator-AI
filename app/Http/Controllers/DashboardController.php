<?php

namespace App\Http\Controllers;

use App\Models\BiodataUser;
use App\Models\Progress;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = BiodataUser::where('user_id', auth()->user()->id)->first();
        $userWeight = $user->weight ?? 0;
        $userBMI = $user->bmi ?? 0;

        // $tanggal = $user->updated_at;
        // dd($tanggal->weekOfYear);
        // // dd($tanggal->year);
        // $hari = Carbon::parse($tanggal)->format('l'); // 'l' untuk nama hari dalam bahasa Inggris
        // // dd($hari); // Output: 'Sunday'

        $progressData = Progress::where('user_id', auth()->user()->id)->get();
        // $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        // $weights = [0, 0, 0, 0, 0, 0, 0];

        // // Menyisipkan data berat badan sesuai dengan hari yang ada dalam data
        // foreach ($progressData as $data) {
        //     $tanggal = $data->updated_at->format('Y-m-d');
        //     $dayIndex = array_search(Carbon::parse($tanggal)->format('l'), $daysOfWeek);
        //     $weights[$dayIndex] = $data->weight;
        // }

        // Menyiapkan minggu dan hari-hari dalam minggu
        $weeks = [];  // Array untuk menyimpan data per minggu (misalnya, Minggu 1, Minggu 2, dst)
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        foreach ($progressData as $data) {
            $tanggal = $data->updated_at ?? 0;  // Mendapatkan tanggal update
            $weekNumber = $tanggal->weekOfYear ?? 0;  // Menentukan nomor minggu
            $year = $tanggal->year ?? 0;  // Tahun dari tanggal

            // Format tanggal untuk menentukan hari
            $dayName = Carbon::parse($tanggal)->format('l');
            $dayIndex = array_search($dayName, $daysOfWeek); // Menentukan indeks hari dalam minggu (Senin = 0, Selasa = 1, dst)

            // Menyisipkan data ke minggu yang sesuai
            if (!isset($weeks[$year][$weekNumber])) {
                // Inisialisasi array untuk minggu tersebut jika belum ada
                $weeks[$year][$weekNumber] = [0, 0, 0, 0, 0, 0, 0];  // Default 0 untuk setiap hari dalam minggu
            }

            // Menyisipkan nilai berat badan pada hari yang sesuai
            $weeks[$year][$weekNumber][$dayIndex] = $data->weight;
        }

        // Menyiapkan data untuk chart atau view
        $weekLabels = [];
        $weekData = [];

        // Menentukan minggu terbaru
        $latestWeekNumber = max(array_keys($weeks[$year])); // Mendapatkan minggu terbaru untuk tahun tersebut
        $latestWeekData = $weeks[$year][$latestWeekNumber];  // Data minggu terbaru

        // Menggunakan data minggu terbaru untuk chart atau view
        $weekLabels[] = "Minggu $latestWeekNumber";  // Label minggu terbaru
        $weekData[] = $latestWeekData;  // Data berat badan minggu terbaru
        // dd($latestWeekData);

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
