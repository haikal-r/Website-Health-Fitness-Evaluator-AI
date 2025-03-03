<?php

namespace App\Http\Controllers;

use App\Models\BiodataUser;
use App\Models\Progress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeUnit\FunctionUnit;

class UserController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $biodataUser = BiodataUser::where('user_id', $user->id)->first();

        [$year, $month, $day] = explode('-', $biodataUser->birth_date);
        $bmi = $biodataUser->bmi;

        $profile = [
            'name' => $user->name,
            'email' => $user->email,
            'gender' => $biodataUser->gender,
            'birth_day' => $day,
            'birth_month' => $month,
            'birth_year' => $year,
            'weight' => $biodataUser->weight,
            'height' => $biodataUser->height,
            'bmi' => $bmi,
        ];

        

        $category = '';
        if ($bmi < 18.5) {
            $category = 'Underweight';
        } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
            $category = 'Normal weight';
        } elseif ($bmi >= 25 && $bmi <= 29.9) {
            $category = 'Overweight';
        } else {
            $category = 'Obesity';
        }

        $profile['category'] = $category;

        return view('profile', compact('profile'));
    }

    public function update(Request $request)
    {
        // $request->validate([
        //     'gender' => 'required|in:male,female',
        //     'birthday.day' => 'required|integer|min:1|max:31',
        //     'birthday.month' => 'required|integer|min:1|max:12',
        //     'birthday.year' => 'required|integer|min:1900|max:' . date('Y'),
        //     'height' => 'required|integer|min:50|max:250',
        //     'weight' => 'required|integer|min:10|max:500',
        // ]);
        
        $birthDate = $request->birth_year . '-' . $request->birth_month . '-' . $request->birth_day;

        $biodataUser = BiodataUser::where('user_id', auth()->user()->id)->first();
        
        $biodataUser->update([
            'gender' => $request->gender,
            'birth_date' => $birthDate, 
            'height' => $request->height,
            'weight' => $request->weight,
        ]);

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    public function updateWeight(Request $request)
    {
        $biodataUser = BiodataUser::where('user_id', auth()->user()->id)->first();
        $height = $biodataUser->height;

        $heightInMeters = $height / 100;
        $bmi = round($request->weight / ($heightInMeters ** 2), 2);

        $biodataUser->update([
            'weight' => $request->weight,
            'bmi' => $bmi,
        ]);

        Progress::create([
            'user_id' => auth()->user()->id,
            'weight' => $request->weight
        ]);

        return redirect()->route('dashboard')->with('success', 'Profile updated successfully!');
    }
}
