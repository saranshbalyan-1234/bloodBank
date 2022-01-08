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
            return response()->json(['errors' => $validator->errors(),"status"=>"failure"]);
       
        } else {
        $user = new User;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->save();

        return response()->json(['registerData' => $user,"status"=>"success"]);

        }
    }


    function login(Request $req){
        $validator = Validator::make($req->all(), [ 
            'email'=>'required|email',
            'password'=>'required',
            ]);

    if ($validator->fails()) {            
        return response()->json(['errors' => $validator->errors(),"status"=>"failure"]);
    } else {
        $check=false;
        $user = User::where(['email' => $req->email])
            ->first();

            if($user){
                $token=  $user->createToken($user->name)->plainTextToken; 
                $user->token=$token;
               $check= Hash::check($req->password, $user->password);  
            }
    if($check){
        return response()->json(['loginData' => $user,"status"=>"success"]);
    } else {

        return response()->json(['error' => 'invalid email or password',"status"=>"failure"]);
       
    }
  


}
    }

    function logout(Request $req){
        $req->user()->currentAccessToken()->delete();

        return response()->json(['loginData' => "Successfully Logged Out","status"=>"success"],200);
    }
}
