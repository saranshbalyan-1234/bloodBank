<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestDonor;
use Illuminate\Support\Facades\Auth;
class RequestDonorsController extends Controller
{
    function requestDonor(Request $req){
       
      $temp = collect($req->all());
      $temp->put('user_id',$req->id);
      $request = RequestDonor::create($temp->toArray());
        return response()->json(['requestDonorsData' => $request,"status"=>"success"]);
        
    }
     function findRequest(Request $req){

        $temp = collect($req->all());
        if($req->blood_type=='All')  $temp->forget('blood_type'); 
        if($req->city=='All') $temp->forget('city'); 
        if($req->state=='All') $temp->forget('state'); 
        if($req->hospital_city=='All') $temp->forget('hospital_city'); 
        if($req->hospital_state=='All') $temp->forget('hospital_state'); 
        
            $request= RequestDonor::where($temp->toArray())->get();
            return response()->json(['donorsData' => $request,"status"=>"success"]);
    }
    function deleteRequest(Request $req){
        $request= RequestDonor::find($req->id);
        $request->delete();
        return "success";
        
    }
}
