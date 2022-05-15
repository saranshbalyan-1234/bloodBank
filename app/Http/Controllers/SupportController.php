<?php
namespace App\Http\Controllers;
use App\Models\Support;
use Illuminate\Http\Request;
class SupportController extends Controller
{
    function store(Request $req){
     return Support::create($req->all());
    }
    function getAllSupport(){
      return Support::all();     
    }
    function update(Request $req){
        $temp = Support::find($req->id);
        $temp->update($req->all());
        return $temp;
    }
    function getSupportById(Request $req){
      return Support::find($req->id);     
    }
    function deleteSupportById(Request $req){
        $temp = Support::find($req->id);
        $temp->delete();
    }
}