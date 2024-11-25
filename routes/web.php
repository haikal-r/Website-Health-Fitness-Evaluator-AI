<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkoutController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/authentication', [LoginController::class, 'authentication'])->name('authentication');

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register-store', [RegisterController::class, 'store'])->name('register.store');

Route::prefix('/dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'edit'])->name('profile');
    Route::get('/food', [FoodController::class, 'index'])->name('food.index');
    Route::get('/workout', [WorkoutController::class, 'index'])->name('workout.index');
});


Route::get('/question_experience', function () {
    return view('question_experience');
})->name('question_experience');
Route::get('/question_goals', function () {
    return view('question_goals');
})->name('question_goals');
Route::get('/question_activity', function () {
    return view('question_activity');
})->name('question_activity');
Route::get('/question_training', function () {
    return view('question_training');
})->name('question_training');
Route::get('/question_accessibility', function () {
    return view('question_accessibility');
})->name('question_accessibility');
Route::get('/question_bmi', function () {
    return view('question_bmi');
})->name('question_bmi');
Route::get('/question_dietary', function () {
    return view('question_dietary');
})->name('question_dietary');
Route::get('/question_dislike', function () {
    return view('question_dislike');
})->name('question_dislike');
Route::get('/result', function () {
    return view('result');
})->name('result');
Route::get('/question_last', function () {
    return view('question_last');
})->name('question_last');