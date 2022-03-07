<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RequestDonor;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

// use App\Models\BeUser;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


use App\Http\Requests\UserRequest;


class UsersController extends Controller
{
    function store(UserRequest $request)
    {
        $User =new User();
        $User->name = $request->name;
        $User->wo_do_so = $request->wo_do_so;
        $User->email = $request->email;
        $User->phone = $request->phone;
        $User->dob = $request->dob;
        $User->age = $request->age;
        $User->gender = $request->gender;
        $User->address = $request->address;
        $User->city = $request->city;
        $User->district = $request->district;
        $User->state = $request->state;
        $User->blood_type = $request->blood_type;
        $User->do_av_blood = $request->do_av_blood;
        $User->do_av_sdp = $request->do_av_sdp;
        $User->do_av_ffp = $request->do_av_ffp;
        $User->do_av_rdp = $request->do_av_rdp;
        $User->do_av_wbc = $request->do_av_wbc;
        $User->no_times_do = $request->no_times_do;
        $User->last_do_date = $request->last_do_date;
        $User-> last_do_place= $request->last_do_place;
        $User->last_do_bloodtype = $request->last_do_bloodtype;
        $User->type_do_blood = $request->type_do_blood;
        $User->type_do_sdp = $request->type_do_sdp;
        $User->type_do_ffp = $request->type_do_ffp;
        $User->type_do_rdp = $request->type_do_rdp;
        $User->type_do_wbc = $request->type_do_wbc;
        $User->vehicle_car = $request->vehicle_car;
        $User->vehicle_bike = $request->vehicle_bike;
        $User->travel_do_blood = $request->travel_do_blood;
        $User->convt_time_int = $request->convt_time_int;
        $User->ready_emergency = $request->ready_emergency;
        $User->volunteer_admin = $request->volunteer_admin;
        $User->volunteer_pick = $request->volunteer_pick;
        $User->volunteer_other = $request->volunteer_other;
        $User->purpose = $request->purpose;
        $User->role = $request->role;
        $User->password = Hash::make($request->password);
        $User->is_donor_active = $request->is_donor_active;
        $User->is_volunteer_active = $request->is_volunteer_active;

        $User->save();
        $token = $User->createToken('authtoken');
        
        return response()->json(
            [
                'message'=>'User Registered',
                'data'=> ['token' => $token->plainTextToken, 'user' => $User]
            ]
        );
    }

    // function register(UserRequest $req){
    //     // return $req->all();
    //     $temp = collect($req->all());
    //     $temp->put('password', Hash::make($req->password));
    //     $user = User::create($temp->toArray());
    //     return response()->json(['registerData' => $user,"status"=>"success"]);
    // }

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
        //  $temp->put('is_donor_active','=',1);
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
    $user=User::find($req->id)->with('request')->first();
    return response()->json(['requestData' => $user->request,"status"=>"success"]);

    }

    function getAllDetails(Request $req){
       
    $user=User::find($req->id)->with('donor')->with('donation_history')->first();
    return response()->json(['requestData' => $user,"status"=>"success"]);
    }
//email verification
    public function sendVerificationEmail(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return [
                'message' => 'Already Verified'
            ];
        }

        $request->user()->sendEmailVerificationNotification();

        return ['status' => 'verification-link-sent'];
    }

    public function verify(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return [
                'message' => 'Email already verified'
            ];
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return [
            'message'=>'Email has been verified'
        ];
    }

    
}
