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
use App\Http\Controllers\BeUserController;
use App\Http\Controllers\RaisedRequestController;
use App\Http\Controllers\FeedBackController;
use App\Http\Controllers\QueryController;





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
//feedbackroutes
Route::post('/addfeedback',[FeedbackController::class,'store']);
Route::post('/getFeedBackDetails',[FeedbackController::class,'getFeedBackDetails']);
Route::get('/feedback',[FeedbackController::class,'index']);//search by id


Route::post('/addquery',[QueryController::class,'store']);
Route::post('/updatequery/{id}',[QueryController::class,'update']);
Route::post('/getallqueries',[QueryController::class,'getAllQuery']);
Route::post('/getquerybyid/{id}',[QueryController::class,'getQueryById']);
Route::post('/deletequery/{id}',[QueryController::class,'deleteQueryById']);









Route::get('raisedlist',[RaisedRequestController::class,'index']);//search by id
Route::post('/addraisedrequest',[RaisedRequestController::class,'store']);
Route::post('/updateraisedrequest',[RaisedRequestController::class,'update']);
Route::post('/updateraisedrequest2',[RaisedRequestController::class,'updateTwo']);


//beuser routes
// Route::get('/beuser',[BeUserController::class,'index']);

// Route::post('/beuserregister',[BeUserController::class,'store']);
Route::post('/beuserregister',[UsersController::class,'store']);
Route::post('/verifyData',[UsersController::class,'verifyData']);
Route::delete('/beuser/{id}',[BeUserController::class,'destroy']);
Route::put('/beuser/{id}',[BeUserController::class,'update']);
Route::post('/otp',[UsersController::class,'otp']);
Route::post('/resetpassowrd',[UsersController::class,'reset']);
Route::post('/resetpasswordotp',[UsersController::class,'resetpasswordotp']);
Route::get('/volunteerlist',[UsersController::class,'volunteeractive']);




//beuser search by-
Route::get('/beuser/{id}',[BeUserController::class,'showbyId']);//search by id
Route::get('/beuser/search/name/{name}',[BeUserController::class,'searchbyName']);//search by name
Route::get('/beuser/search/blood_type/{blood_type}',[BeUserController::class,'searchbyBloodType']);//search by blood type
Route::get('/beuser/search/do_av_blood/{do_av_blood}',[BeUserController::class,'searchbyTypeDoBlood']);//search by blood availability
Route::get('/beuser/search/do_av_sdp/{do_av_sdp}',[BeUserController::class,'searchbydTypeDoSDP']);//search by sdp availability
Route::get('/beuser/search/do_av_ffp/{do_av_ffp}',[BeUserController::class,'searchbyTypeDoFFP']);//search by ffp ava.
Route::get('/beuser/search/do_av_rdp/{do_av_rdp}',[BeUserController::class,'searchbyTypeDoRDP']);//search by rdp ava
Route::get('/beuser/search/do_av_wbc/{do_av_wbc}',[BeUserController::class,'searchbyTypeDoWBC']);//search by wbc


//verify email
Route::post('email/verification-notification', [UsersController::class, 'sendVerificationEmail'])->middleware('auth:sanctum');
Route::get('verify-email/{id}/{hash}', [UsersController::class, 'verify'])->name('verification.verify')->middleware('auth:sanctum');


Route::post('/login',[UsersController::class,'login']);
Route::post('/register',[UsersController::class,'register']);
Route::post('/deleteUser',[UsersController::class,'delete']);


Route::post('/findRequest',[RequestDonorsController::class,'findRequest']);
Route::post('/getAllDonors',[UsersController::class,'getAllDonors']);

Route::post('/getAllBloodType',[ConstantController::class,'getAllBloodType']);


Route::post('/getAllCityByDistrict',[WorldController::class,'getAllCityByDistrict']);
Route::post('/getAllDistrictByStates',[WorldController::class,'getAllDistrictByStates']);
Route::post('/getAllStates',[WorldController::class,'getAllStates']);

Route::post('/getAllFeed',[FeedController::class,'getAllFeed']);
Route::post('/getFeedById',[FeedController::class,'getFeedById']);


    Route::post('/getAllRequest',[UsersController::class,'getAllRequest']);
    Route::post('/getUserById',[UsersController::class,'getDonorById']);
    Route::post('/update',[UsersController::class,'update']);
   
   Route::group(['middleware'=>['auth:sanctum']],function () {
        Route::post('/logout',[UsersController::class,'logout']);
                   Route::post('/findDonors',[UsersController::class,'findDonors']);
        });
                   Route::post('/findDonorss',[UsersController::class,'findDonorss']);
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
   
    
    


