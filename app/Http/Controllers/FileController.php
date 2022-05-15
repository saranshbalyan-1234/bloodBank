<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
{
    
    function store(Request $req){
     return File::create($req->all());
    }

    function getAllFileController(){
      $data= File::all();
      $users = DB::table('files')
      ->join('request_donors','files.request_donors_id', '=', 'request_donors.id')
      ->select('files.*','request_donors.*')->get();
      return $users;
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
