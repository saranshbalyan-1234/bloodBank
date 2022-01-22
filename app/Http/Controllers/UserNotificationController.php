<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserNotificationRequest;
use Illuminate\Http\Request;
use App\Models\UserNotification;
use Illuminate\Support\Facades\Auth;

class UserNotificationController extends Controller
{
    function readNotification(UserNotificationRequest $req){
        $notification = UserNotification::create(['user_id'=>Auth::user()->id,'notification_id'=>$req->notification_id]);
         return response()->json(['notificationData' => $notification,"status"=>"success"]);
     }
}
