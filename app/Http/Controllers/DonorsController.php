<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Donor;
class DonorsController extends Controller
{

    function addDonor(Request $req){
       
        $donor = new Donor;
        $donor->name=$req->name;
        $donor->age=$req->age;
        $donor->address=$req->address;
        $donor->gender=$req->gender;
        $donor->phone=$req->phone;
        $donor->blood_type=$req->blood_type;
        $donor->type_rh=$req->type_rh;
        $donor->user_id=$req->user_id;
        $donor->save();
      return $donor;
        
    }
}
