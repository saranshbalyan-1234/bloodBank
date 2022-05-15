<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $fillable = [
        'name',
        'wo_do_so',
        'profile',
        'email',
        'phone',
        'dob',
        'age',
        'gender',
        'address',
        'city',
        'district',
        'state',
        'blood_type',
        'do_av_blood',
        'do_av_sdp',
        'do_av_ffp',
        'do_av_rdp',
        'do_av_wbc',
        'no_times_do',
        'last_do_date',
        'last_do_place',
        'last_do_bloodtype',
        'type_do_blood',
        'type_do_sdp',
        'type_do_ffp',
        'type_do_rdp',
        'type_do_wbc',
        'vehicle_car',
        'vehicle_bike',
        'travel_do_blood',
        'convt_time_int',
        'ready_emergency',
        'volunteer_admin',
        'volunteer_pick',
        'volunteer_other',
        'purpose',
        'role',
        'blocked',
        'fcm_token'
        'password',
        'pincode',
        'is_donor_active',
        'is_volunteer_active'
    
    ];
  public function request()
    {
        return $this->hasMany(RequestDonor::class, 'user_id','id');
    }
     public function donor()
    {
        return $this->hasOne(Donor::class, 'user_id');
    }
  public function status()
    {
        return $this->hasOne(RaisedRequest::class, 'donor_id','id')->ofMany([],function ($query) {
            $query->where('requester_id', '=', Auth::user()->id);
        });
    }

 public function donation_history()
    {
        return $this->hasMany(DonorsHistory::class, 'user_id');
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
