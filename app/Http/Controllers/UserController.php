<?php

namespace App\Http\Controllers;

use App\Models\BiodataUser;
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
        $bmi = round($biodataUser->bmi, 1);

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
        $request->validate([
            'gender' => 'required|in:Male,Female',
            'birthday.day' => 'required|integer|min:1|max:31',
            'birthday.month' => 'required|integer|min:1|max:12',
            'birthday.year' => 'required|integer|min:1900|max:' . date('Y'),
            'height' => 'required|integer|min:50|max:250',
            'weight' => 'required|integer|min:10|max:500',
        ]);

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}
