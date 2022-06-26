<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaisedRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'requester_id',
        'donor_id',
        'status',
        'red',
        'donated',
        'remark'
    ];
  public function donor()
    {
        return $this->hasOne(User::class,'id','donor_id');
    }
     public function requester()
    {
        return $this->hasOne(User::class,'id','requester_id');
    }
}
