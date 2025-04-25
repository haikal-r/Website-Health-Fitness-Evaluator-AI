<?php

namespace App\Http\Controllers;

use App\Models\BiodataUser;
use App\Models\Progress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
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

    public function updateProfile(Request $request)
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


    // Admin User Management
    public function index(Request $request)
    {
        $query = User::query();

        // Tambahkan pencarian jika ada
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->latest()->paginate(10);
        return view('admin.user-management', compact('users'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('admin.user-management')->with('success', 'User berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('admin.user-management')->with('error', 'Gagal menambahkan user: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $userId)
    {
        try {
            $user = User::findOrFail($userId);

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore($user->id),
                ],
                'password' => 'nullable|string|min:8',
            ]);

            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            return redirect()->route('admin.user-management')->with('success', 'User berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->route('admin.user-management')->with('error', 'Gagal memperbarui user: ' . $e->getMessage());
        }
    }

    public function destroy($userId)
    {
        try {
            $user = User::findOrFail($userId);
            $user->delete();

            return redirect()->route('admin.user-management')->with('success', 'User berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.user-management')->with('error', 'Gagal menghapus user: ' . $e->getMessage());
        }
    }
}
