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
            // 'gender' => 'required',
            // 'height' => 'required|max:4',
            // 'weight' => 'required|max:4',
            // 'birth_date' => ['required', 'date', 'before:today'],
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'gender' => $request->gender,
            // 'weight' => $request->weight,
            // 'height' => $request->height,
            // 'birth_date' => $request->birth_date
        ]);

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ]);
        }
        
        
        Auth::login($user);
        
        return redirect()->intended('dashboard')->with('success', 'Registration successful.');
    }
}
