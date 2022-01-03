<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestDonor;

class RequestDonorsController extends Controller
{
    function requestDonor(Request $req){
       
        $request_donor = new Donor;
        $request_donor->age=$req->age;
        $request_donor->address=$req->address;
        $request_donor->gender=$req->gender;
        $request_donor->phone=$req->phone;
        $request_donor->blood_type=$req->blood_type;
        $request_donor->type_rh=$req->type_rh;
        $request_donor->user_id=$req->user_id;
        $request_donor->unit=$req->unit;
        $request_donor->save();
      return $request_donor;
        
    }
}
