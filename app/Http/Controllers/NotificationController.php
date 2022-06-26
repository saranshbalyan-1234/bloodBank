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
        $unread_notification_count=0;
        $total_notification_count=0;
        $notification= Notification::all();
        return $notification;
    }
    function getAllNotificationAdmin(Request $req){
        $notification= Notification::where(['user_id' =>$req->user_id]);
        return response()->json(['notificationData' => $notification,"status"=>"success"]);
    }
    function getNotificationById(NotificationRequest $req){
         $notification= Notification::find($req->id);
         return response()->json(['notificationData' => $notification,"status"=>"success"]);
     }
     function deleteNotificationById(NotificationRequest $req){
         $notification= Notification::find($req->id);
         $notification->delete();
         return "success";
     }
}
