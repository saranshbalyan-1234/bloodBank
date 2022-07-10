<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeedBack;
use Illuminate\Support\Facades\DB;


class FeedBackController extends Controller
{
    function index()
    {
        $data = FeedBack::with('user')->get();
        return $data;
    }
function getFeedBackDetails(Request $req){
    $data = FeedBack::where(['raised_id' => $req->raised_id,'user_id'=>$req->user_id,'status'=>'success'])->get();
    return $data;
}
    function store(Request $request)
    {
        $fb =new Feedback();
        $fb->description = $request->description;
        $fb->user_id = $request->user_id;
        $fb->raised_id = $request->raised_id;
        $fb->comment = $request->comment;
        
        $fb->save();

        return $fb;
    }
}
