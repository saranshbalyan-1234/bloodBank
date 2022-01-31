<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestDonor;
use Illuminate\Support\Facades\Auth;
class RequestDonorsController extends Controller
{
    function requestDonor(Request $req){
       
      $temp = collect($req->all());
      $temp->put('user_id',Auth::user()->id);
      $user = RequestDonor::create($temp->toArray());
        return response()->json(['requestDonorsData' => $user,"status"=>"success"]);
        
    }
}
