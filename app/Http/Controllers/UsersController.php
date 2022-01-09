<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\UserRequest;


class UsersController extends Controller
{
    function register(UserRequest $req){
     
        $user = new User;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->save();

        return response()->json(['registerData' => $user,"status"=>"success"]);

        
    }


    function login(UserRequest $req){
        
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

    function logout(Request $req){
        $req->user()->currentAccessToken()->delete();
        return response()->json(['logoutData' => "Successfully Logged Out","status"=>"success"]);
    }
}
