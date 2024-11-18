<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/questionner1', function () {
    return view('questionner1');
})->name('questionner1');

Route::get('/questionner2', function () {
    return view('questionner2');
})->name('questionner2');

Route::get('/questionner3', function () {
    return view('questionner3');
})->name('questionner3');

Route::get('/questionner4', function () {
    return view('questionner4');
})->name('questionner4');

Route::get('/food', function () {
    return view('food');
})->name('food');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/workout', function () {
    return view('workout');
})->name('workout');