<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RaisedRequest;
use Illuminate\Support\Facades\DB;

class RaisedRequestController extends Controller
{
      
    public function index()
    {
        $data = RaisedRequest::all();
        $temp = DB::table('raised_requests')
        ->join('users','raised_requests.requester_id','=','users.id')
        ->select('users.*','raised_requests.*')
        ->get();
        return $temp;

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
    
     function update(Request $req){
        $user = RaisedRequest::find($req->id);
        $temp = collect($req->all());
        $user->update($temp->toArray());
        return response()->json(['updatedData' => $user,"status"=>"success"]);
    }
}
