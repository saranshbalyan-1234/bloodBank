<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    function addFeed(Request $req){
        $feed = Feed::create($req->all());
         return response()->json(['feedData' => $feed,"status"=>"success"]);
     }
     function updateFeed(Request $req){
         $feed = Feed::find($req->id);
         $feed->update($req->all());
         return response()->json(['feedData' => $feed,"status"=>"success"]);
     }
     function getAllFeed(){
         $feed= Feed::all();
         return response()->json(['feedData' => $feed,"status"=>"success"]);
     }
     function getFeedById(Request $req){
          $feed= Feed::find($req->id);
          return response()->json(['feedData' => $feed,"status"=>"success"]);
      }
      function deleteFeedById(Request $req){
          $feed= Feed::find($req->id);
          $feed->delete();
          return "success";
      }
}
