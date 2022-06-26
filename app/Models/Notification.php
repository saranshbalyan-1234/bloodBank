<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class Notification extends Model
{
    use HasFactory;
    protected $table='notification';
    protected $fillable = [
     'status','description','user_id'
    ];
    public function read()
    {
        return $this->hasOne(UserNotification::class, 'notification_id')->ofMany([],function ($query) {
            $query->where('user_id', '=', Auth::user()->id);
        });
    }
    public function getCreatedAtAttribute($date)
{
    $newDate=Carbon::parse($date)->addMinutes(330);
    return Carbon::createFromFormat('Y-m-d H:i:s', $newDate)->format('d-m-Y h:i A');
}
public function getUpdatedAtAttribute($date)
{
    $newDate=Carbon::parse($date)->addMinutes(330);
    return Carbon::createFromFormat('Y-m-d H:i:s', $newDate)->format('d-m-Y h:i A');
}   
}
