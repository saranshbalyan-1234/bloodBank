<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeUser extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'wo_do_so',
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
        'vehicle_avalability',
        'travel_do_blood',
        'convt_time_int',
        'ready_emergency',
        'interest_volunteer',
        'purpose',
        'role',
        'password',
        'is_donor_active',
        'is_volunteer_active'
    
    ];

}
