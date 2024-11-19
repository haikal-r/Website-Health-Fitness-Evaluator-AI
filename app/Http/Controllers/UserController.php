<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\CodeUnit\FunctionUnit;

class UserController extends Controller
{
    public function edit()
    {
    
        $profile = [
            'name' => 'haikal',
            'email' => 'haikal@test.com',
            'gender' => 'Male',
            'birth_day' => '10',
            'birth_month' => '10',
            'birth_year' => '2009',
            'weight' => 80,
            'height' => 180

        ];

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
