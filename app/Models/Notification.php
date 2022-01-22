<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Notification extends Model
{
    use HasFactory;
    protected $table='notification';
    protected $fillable = [
     'title','description'
    ];
    public function read()
    {
        return $this->hasOne(UserNotification::class, 'notification_id')->ofMany([],function ($query) {
            $query->where('user_id', '=', Auth::user()->id);
        });
    }
}
