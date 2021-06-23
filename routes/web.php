<?php

use App\Setting;
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

// Main deafault  Error page 
Route::fallback(function(){
    $errorURL = Setting::all('errorpageURL'); 
    if(count($errorURL)>0){
        return response()->json(['errorpageURL'=>$errorURL[0]->errorpageURL]);
    }
    else{ 
        return response()->json(['Error' => 'The server sent and error', "Message"=>"I don't have any"], 500); 
    }
}); 