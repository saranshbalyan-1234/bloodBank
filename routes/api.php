<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DonorsController;


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

    Route::post('/getDonorById',[UsersController::class,'getDonorById']);
    Route::post('/getAllDonors',[UsersController::class,'getAllDonors']);
    Route::post('/getAllDonorsByState',[UsersController::class,'getAllDonorsByState']);
    Route::post('/getAllDonorsByCity',[UsersController::class,'getAllDonorsByCity']);
    Route::post('/logout',[UsersController::class,'logout']);
  
});
