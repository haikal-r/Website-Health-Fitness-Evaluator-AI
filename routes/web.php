<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\QuestionnaireController;
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

Route::middleware(['auth'])->group(function () {
    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [UserController::class, 'edit'])->name('profile');
        Route::get('/food', [FoodController::class, 'index'])->name('food.index');
        Route::get('/workout', [WorkoutController::class, 'index'])->name('workout.index');
    });

    Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
    Route::post('/user/update-weight', [UserController::class, 'updateWeight'])->name('user.update-weight');
    
    Route::get('/questionnaire/{step}', [QuestionnaireController::class, 'show'])->name('questionnaire.show');
    Route::post('/questionnaire/{step}', [QuestionnaireController::class, 'store'])->name('questionnaire.store');
    Route::get('/result', [QuestionnaireController::class, 'result'])->name('result');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});


