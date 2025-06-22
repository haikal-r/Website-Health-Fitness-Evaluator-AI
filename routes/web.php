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
        Route::get('/food/{id}', [FoodController::class, 'show'])->name('food.show');
        Route::get('/workout', [WorkoutController::class, 'index'])->name('workout.index');
        Route::get('/workout/{id}', [WorkoutController::class, 'show'])->name('workout.show');

    });

    Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
    Route::post('/user/update-weight', [UserController::class, 'updateWeight'])->name('user.update-weight');

    Route::get('/questionnaire/{step}', [QuestionnaireController::class, 'show'])->name('questionnaire.show');
    Route::post('/questionnaire/{step}', [QuestionnaireController::class, 'store'])->name('questionnaire.store');
    Route::get('/result', [QuestionnaireController::class, 'result'])->name('result');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});

// Admin authentication routes
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [LoginController::class, 'adminlogout'])->name('admin.logout');

// Protected admin routes
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // User Management Routes
    Route::get('/user-management', [UserController::class, 'index'])->name('admin.user-management');
    Route::post('/user-management', [UserController::class, 'store'])->name('admin.user-management.store');
    Route::put('/user-management/{user}', [UserController::class, 'update'])->name('admin.user-management.update');
    Route::delete('/user-management/{user}', [UserController::class, 'destroy'])->name('admin.user-management.destroy');
    Route::get('/admin/dashboard/stats', [DashboardController::class, 'getStats'])->name('admin.dashboard.stats');

    Route::get('/nutrition-trends', [DashboardController::class, 'nutritionTrends'])->name('admin.nutrition-trends');
    Route::get('/workout-analytic', [DashboardController::class, 'workoutAnalytic'])->name('admin.workout-analytic');

    Route::get('/log-activity', function () {
        $logs = collect([]);
        $logs = new \Illuminate\Pagination\LengthAwarePaginator(
            $logs, 0, 10, 1
        );
        return view('admin.log-activity', compact('logs'));
    })->name('admin.log-activity');
});
