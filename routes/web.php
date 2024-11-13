<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/questionner1', function () {
    return view('questionner1');
});
Route::get('/questionner2', function () {
    return view('questionner2');
});
Route::get('/questionner3', function () {
    return view('questionner3');
});
