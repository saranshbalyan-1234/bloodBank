<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    function register(Request $req){
        $validator = Validator::make($req->all(), [ 
            'name'=>"required|regex:/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/",
            'email'=>'required|email|unique:users,email',
            'password'=>'required',
            ]);
        if ($validator->fails()) {
            return  response()->json([$validator->errors()]);
        } else {
        $user = new User;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->save();
      return $user;
        }
    }


    function login(Request $req){
        $validator = Validator::make($req->all(), [ 
            'email'=>'required|email',
            'password'=>'required',
            ]);

    if ($validator->fails()) {
        return response()->json([$validator->errors()]);
    } else {
        $user = DB::table('users')
            ->where(['email' => $req->email])
            ->first();
            if($user){
               $check= Hash::check($req->password, $user->password);  
            }
    if($check){
        return $user;
    } else {
        return response()->json(['error' => 'invalid email or password']);
    }
  


}
    }
}
