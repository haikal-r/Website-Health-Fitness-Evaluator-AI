<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/authentication', [LoginController::class, 'authentication'])->name('authentication');

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register-store', [RegisterController::class, 'store'])->name('register.store');

