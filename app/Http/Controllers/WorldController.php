<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\State;
use App\Models\City;
class WorldController extends Controller
{
   function getAllStates(Request $req){
        $states = State::orderBy('state_title', 'ASC')->get();
        return $states;
    }
    function getAllDistrictByStates(Request $req){
        $district = District::where(['state_id' => $req->state_id])->orderBy('district_title', 'ASC')->get();
        return $district;
    }
    function getAllCityByDistrict(Request $req){
        $cities = City::where(['districtid' => $req->districtid])->orderBy('name', 'ASC')->get();
        return $cities;
    }
}
