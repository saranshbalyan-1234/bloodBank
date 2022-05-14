<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    
    function store(Request $req){
     return File::create($req->all());
    }

    function getAllFileController(){
      return File::all();     
    }

    function update(Request $req){
        $temp = File::find($req->id);
        $temp->update($req->all());
        return $temp;
    }

    function getFileControllerById(Request $req){
      return File::find($req->id);     
    }

    function deleteFileControllerById(Request $req){
        $temp = File::find($req->id);
        $temp->delete();
    }

}
