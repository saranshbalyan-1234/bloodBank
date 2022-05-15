<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class RequestDonor extends Model
{
    use HasFactory;
    public $table = "request_donors";
     protected $fillable = [
        'name','email','fname','path',
'age','gender','blood_type','document','district','unit','city','address','state','date_required','phone','hospital_district','hospital_city','hospital_state','hospital_phone','hospital_name','user_id'
    ];

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
