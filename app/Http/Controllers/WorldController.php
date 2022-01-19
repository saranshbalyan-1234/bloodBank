<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
class WorldController extends Controller
{
    function getAllCountries(){
        $countries = Country::all();
        return $countries;
    }
    function getAllStatesByCountry(Request $req){
        $states = State::where(['country_id' => $req->country_id])->orderBy('name', 'ASC')->get();
        return $states;
    }
    function getAllCityByStates(Request $req){
        $cities = City::where(['state_id' => $req->state_id])->orderBy('name', 'ASC')->get();
        return $cities;
    }
}
