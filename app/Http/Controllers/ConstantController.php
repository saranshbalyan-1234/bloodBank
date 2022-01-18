<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConstantController extends Controller
{
    function getAllStates(){
        $states=["Andhra Pradesh","Arunachal Pradesh","Assam","Bihar","Chhattisgarh","Goa","Gujarat","Haryana","Himachal Pradesh","Jammu and Kashmir","Jharkhand","Karnataka","Kerala","Madhya Pradesh","Maharashtra","Manipur","Meghalaya","Mizoram","Nagaland","Odisha","Punjab","Rajasthan","Sikkim","Tamil Nadu","Telangana","Tripura","Uttarakhand","Uttar Pradesh","West Bengal","Andaman and Nicobar Islands","Chandigarh","Dadra and Nagar Haveli","Daman and Diu","Delhi","Lakshadweep","Puducherry",];
        return response()->json(['statesData' => $states,"status"=>"success"]);
    }
    function getAllBloodType(){
        $bloodType=["A+","A-","A1+","A1-","A1B+","A1B-","A2+","A2-","A2B+","A2B-","AB+","AB-","B+","B-","Bombay Blood Group","INRA","O+","O-",];
        return response()->json(['bloodTypeData' => $bloodType,"status"=>"success"]);
    }
}
