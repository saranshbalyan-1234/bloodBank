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
        if($req->is_donor_active){
            $temp->put('is_donor_active',$req->is_donor_active);
        }
        $temp = collect($req->all());
        $temp->put('password', Hash::make($req->password));
        $user = User::create($temp->toArray());
        return response()->json(['registerData' => $user,"status"=>"success"]);
    }

    function update(UserRequest $req){
        $user = User::find($req->id);
        $temp = collect($req->all());
        $temp->forget('password');
        if($req->oldPassword && $req->newPassword){
            if(Hash::check($req->oldPassword, $user->password)  ){
                $temp->put('password', Hash::make($req->newPassword));
            }
            else{
                return response()->json(['error' => "Old password is not correct.","status"=>"failure"]);
            }
        }
     
       $user->update($temp->toArray());
        return response()->json(['updatedData' => $user,"status"=>"success"]);
    }

    function getDonorById(UserRequest $req){
       if(Auth::user()->id == $req->id){
        $user= User::find($req->id);
        return response()->json(['usersData' => $user,"status"=>"success"]);
       }
       else{
        return response()->json(['errors' => ['message'=>'Unauthenticated'],"status"=>"exception"]);
       }
    }

    function findDonors(UserRequest $req){
        // $date = \Carbon\Carbon::now()->subDays(7);
        $temp = collect($req->all());
        if($req->blood_type=='All')  $temp->forget('blood_type'); 
        if($req->city=='All') $temp->forget('city'); 
        if($req->state=='All') $temp->forget('state'); 
        // $temp->put('created_at','<=',$date);
            $user= User::where($temp->toArray())->get();
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
    function delete(Request $req){
       $user= User::find($req->id);
       $user->delete();
       return "success";
    }
    function getAllRequest(){
    $user=User::find(Auth::user()->id)->with('request')->first();
    return response()->json(['requestData' => $user->request,"status"=>"success"]);
    }
    
}
