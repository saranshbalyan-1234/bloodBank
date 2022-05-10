<?php

namespace App\Http\Controllers;

use App\Models\Query;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    
    function store(Request $req){
     return Query::create($req->all());
    }

    function getAllQuery(){
      return Query::all();     
    }

    function update(Request $req){
        $temp = Query::find($req->id);
        $temp->update($req->all());
        return $temp;
    }

    function getQueryById(Request $req){
      return Query::find($req->id);     
    }

    function deleteQueryById(Request $req){
        $temp = Query::find($req->id);
        $temp->delete();
    }

}
