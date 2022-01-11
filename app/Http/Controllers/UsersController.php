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
        $temp = collect($req->all());
        $temp->put('password', Hash::make($req->password));
       $user = User::create($temp->toArray());
        return response()->json(['registerData' => $user,"status"=>"success"]);
    }

    function update(UserRequest $req){
        $user = User::find($req->id);
        $temp = collect($req->all());
        if($req->password){
        $temp->put('password', Hash::make($req->password));
        }
       $user->update($temp->toArray());
        return response()->json(['registerData' => $user,"status"=>"success"]);
    }

    function getDonorById(UserRequest $req){
       if(Auth::user()->id == $req->id){
        $user= User::find($req->id);
        return response()->json(['donorsData' => $user,"status"=>"success"]);
       }
       else{
        return response()->json(['errors' => ['message'=>'Unauthenticated'],"status"=>"exception"]);
       }
    }
    function getAllDonors(Request $req){
        $user= User::all();
        return response()->json(['donorsData' => $user,"status"=>"success"]);
    }
    function getAllDonorsByState(UserRequest $req){
        $user= User::where(['state' => $req->state])->get();
        return response()->json(['donorsData' => $user,"status"=>"success"]);
    }
    function getAllDonorsByCity(UserRequest $req){
        $user= User::where(['city' => $req->city])->get();
        return response()->json(['donorsData' => $user,"status"=>"success"]);
    }
    function login(Request $req){   
        $check=false;
        $user = User::where(['email' => $req->email])
            ->first();

            if($user){
            $check=Hash::check($req->password, $user->password);  
            }

            if($check){
                $token=  $user->createToken($user->name)->plainTextToken; 
                $user->token=$token;
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
