<?php

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SettingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/settings', [SettingController::class, 'index']); 
Route::put('/v1/settings', [SettingController::class, 'dum']);  



Route::get('/v1/pages', [PageController::class, 'index']); 
Route::post('/v1/pages', [PageController::class, 'store']); 
Route::put('/v1/pages', [PageController::class, 'update']); 