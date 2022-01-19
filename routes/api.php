<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DonorsController;
use App\Http\Controllers\ConstantController;
use App\Http\Controllers\WorldController;
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

Route::post('/login',[UsersController::class,'login']);
Route::post('/register',[UsersController::class,'register']);

Route::group(['middleware'=>['auth:sanctum']],function () {
    Route::post('/update',[UsersController::class,'update']);
    Route::post('/getDonorById',[UsersController::class,'getDonorById']);
    Route::post('/getAllDonors',[UsersController::class,'getAllDonors']);
    Route::post('/getAllDonorsByState',[UsersController::class,'getAllDonorsByState']);
    Route::post('/getAllDonorsByStateCity',[UsersController::class,'getAllDonorsByStateCity']);
    Route::post('/getAllBloodType',[ConstantController::class,'getAllBloodType']);
    Route::post('/getAllCountries',[WorldController::class,'getAllCountries']);
    Route::post('/getAllStatesByCountry',[WorldController::class,'getAllStatesByCountry']);
    Route::post('/getAllCityByStates',[WorldController::class,'getAllCityByStates']);
    Route::post('/logout',[UsersController::class,'logout']);
  
});
