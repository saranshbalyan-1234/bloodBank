<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Donor extends Model
{
    use HasFactory;
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

