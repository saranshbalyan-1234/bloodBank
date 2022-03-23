<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RaisedRequest;

class RaisedRequestController extends Controller
{
      
    public function index()
    {
        $data = RaisedRequest::all();
        return $data;

    }  

    function store(Request $request)
    {
        $raised =new RaisedRequest();
        $raised->requester_id = $request->requester_id;
        $raised->donor_id = $request->donor_id;
        $raised->status = $request->status;
        $raised->save();

        return response()->json(
            [
                'message'=> 'raised requested',
                'data'=>$raised
            ]
            );
    }  
}
