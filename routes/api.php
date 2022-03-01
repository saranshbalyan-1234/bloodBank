<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DonorsController;
use App\Http\Controllers\ConstantController;
use App\Http\Controllers\WorldController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\UserNotificationController;
use App\Http\Controllers\RequestDonorsController;

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
Route::post('/deleteUser',[UsersController::class,'delete']);


Route::post('/findRequest',[RequestDonorsController::class,'findRequest']);
Route::post('/getAllDonors',[UsersController::class,'getAllDonors']);
Route::post('/findDonors',[UsersController::class,'findDonors']);
Route::post('/getAllBloodType',[ConstantController::class,'getAllBloodType']);
Route::post('/getAllCountries',[WorldController::class,'getAllCountries']);
Route::post('/getAllStatesByCountry',[WorldController::class,'getAllStatesByCountry']);
Route::post('/getAllCityByStates',[WorldController::class,'getAllCityByStates']);
Route::post('/getAllFeed',[FeedController::class,'getAllFeed']);
Route::post('/getFeedById',[FeedController::class,'getFeedById']);

Route::group(['middleware'=>['auth:sanctum']],function () {
    Route::post('/getAllRequest',[UsersController::class,'getAllRequest']);
    Route::post('/getUserById',[UsersController::class,'getDonorById']);
    Route::post('/update',[UsersController::class,'update']);
    Route::post('/logout',[UsersController::class,'logout']);
   
    Route::post('/addNotification',[NotificationController::class,'addNotification']);
    Route::post('/updateNotification',[NotificationController::class,'updateNotification']);
    Route::post('/getAllNotification',[NotificationController::class,'getAllNotification']);
    Route::post('/getNotificationById',[NotificationController::class,'getNotificationById']);
    Route::post('/readNotification',[UserNotificationController::class,'readNotification']);
    Route::post('/getAllNotificationAdmin',[NotificationController::class,'getAllNotificationAdmin']);
    Route::post('/deleteNotificationById',[NotificationController::class,'deleteNotificationById']);

    Route::post('/addFeed',[FeedController::class,'addFeed']);
    Route::post('/deleteFeedById',[FeedController::class,'deleteFeedById']);
    Route::post('/updateFeed',[FeedController::class,'updateFeed']);

    Route::post('/requestDonation',[RequestDonorsController::class,'requestDonor']);
    Route::post('/deleteRequest',[RequestDonorsController::class,'deleteRequest']);
    Route::post('/getAllDetails',[UsersController::class,'getAllDetails']);
   
    
    

});
