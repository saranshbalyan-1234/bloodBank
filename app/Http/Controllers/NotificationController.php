<?php

namespace App\Http\Controllers;
use App\Http\Requests\NotificationRequest;
use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    function addNotification(NotificationRequest $req){
       $notification = Notification::create($req->all());
        return response()->json(['notificationData' => $notification,"status"=>"success"]);
    }
    function updateNotification(NotificationRequest $req){
        $notification = Notification::find($req->id);
        $notification->update($req->all());
        return response()->json(['updatedNotification' => $notification,"status"=>"success"]);
    }
    function getAllNotification(){
        $notification= Notification::withExists('read')->get();
        return response()->json(['notificationData' => $notification,"status"=>"success"]);
    }
    function getNotificationById(NotificationRequest $req){
         $notification= Notification::find($req->id);
         return response()->json(['notificationData' => $notification,"status"=>"success"]);
     }
}
