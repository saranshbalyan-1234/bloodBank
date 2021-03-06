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
      public function getAllNotification()
    {
        $data = RaisedRequest::with('donor','requester')->get();
        return $data;

    }  

    function store(Request $request)
    {
        foreach ($request->donor_id as $id) {
            $raised =new RaisedRequest();
            $raised->requester_id = $request->requester_id;
            $raised->donor_id = $id;
            $raised->status = $request->status;
            $raised->remark = $request->remark;
            $raised->save();
            }
       

        return response()->json(
            [
                'message'=> 'raised requested',
                'status'=>'success',
              
            ]
            );
    }
    
     function update(Request $req){
        $user = RaisedRequest::find($req->id);
        $temp = collect($req->all());
        $user->update($temp->toArray());
        return response()->json(['updatedData' => $user,"status"=>"success"]);
    }
    function updateTwo(Request $req){
        $request = RaisedRequest::where(['donor_id' => $req->donor_id,'requester_id' => $req->requester_id])->first();
        $request->status=$req->status;
        $request->red=$req->red;
        $request->save();
        return response()->json(['updatedData' => $request,"status"=>"success"]);
    }
}
