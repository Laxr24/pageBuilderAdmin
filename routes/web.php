<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
})->name('main');

// Handles the route
Route::prefix('letmein')->group(function () {
        Auth::routes();
}); 

Route::get('/home', 'HomeController@index')->name('home');
