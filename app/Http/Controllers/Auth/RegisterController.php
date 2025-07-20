<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $birthDay = $request->birth_date;
        $birthMonth = $request->birth_month;
        $birthYear = $request->birth_year;

        $birthDate = Carbon::createFromDate($birthYear, $birthMonth, $birthDay)->toDateString();
        $request['birth_date'] = $birthDate;

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ]);
        }
        
        Auth::login($user);
        
        return redirect()->intended('questionnaire/1')->with('success', 'Registration successful. Please fill out this question');
    }
}
