<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeUser;
use Illuminate\Support\Facades\Hash;
use DB;     



class BeUserController extends Controller
{
    public function index()
    {
        $data = BeUser::all();
        return $data;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'wo_do_so' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'dob' => 'required',
            'age' => '',
            'gender' => 'required',
            'address' => 'required',
            'city' => 'required',
            'district' => 'required',
            'state' => 'required',
            'blood_type' => '',
            'do_av_blood'=> '',
            'do_av_sdp'=> '',
            'do_av_ffp'=> '',
            'do_av_rdp'=>'',
            'do_av_wbc'=> '',
            'no_times_do'=> '',
            'last_do_date'=>'',
            'last_do_place'=>'',
            'last_do_bloodtype'=> '',
            'type_do_blood'=> '',
            'type_do_sdp'=> '',
            'type_do_ffp'=> '',
            'type_do_rdp'=> '',
            'type_do_wbc'=> '',
            'vehicle_car'=>'',
            'vehicle_bike'=>'',
            'travel_do_blood'=>'',
            'convt_time_int'=>'',
            'ready_emergency'=>'',
            'volunteer_admin'=>'',
            'volunteer_pick'=>'',
            'volunteer_other'=>'',
            'purpose'=>'',
            'role'=>'',
            'password'=>'',
            'is_donor_active'=>'',
            'is_volunteer_active'=>'',



        ]);

        $User =new BeUser();
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
        return $User;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showbyId($id)
    {
        $user = BeUser::findOrFail($id);
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $User =  BeUser::findOrFail($id);
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
        $User->vehicle_avalability = $request->vehicle_avalability;
        $User->travel_do_blood = $request->travel_do_blood;
        $User->convt_time_int = $request->convt_time_int;
        $User->ready_emergency = $request->ready_emergency;
        $User->interest_volunteer = $request->interest_volunteer;
        $User->purpose = $request->purpose;
        $User->role = $request->role;
        $User->password = Hash::make($request->password);
        $User->is_donor_active = $request->is_donor_active;
        $User->is_volunteer_active = $request->is_volunteer_active;
        $User->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        
        $User = BeUser::findOrFail($id);
        $User->delete();
        return $User;
    }

/**
     * Search the specified resource from storage using first name
     *
     * @param  str  $first_name
     * @return \Illuminate\Http\Response
     */
     function searchbyName($name)
    {
        return BeUser::where('name','like','%'.$name.'%')->get();
    
    }

    function searchbyBloodType($blood_type)
    {
        return BeUser::where('blood_type','like','%'.$blood_type.'%')->get();
    
    }

    function searchbyTypeDoBlood($do_av_blood)
    {
        return BeUser::where('do_av_blood','like','%'.$do_av_blood.'%')->get();
    
    }

    
    function searchbyTypeDoSDP($do_av_sdp)
    {
        return BeUser::where('do_av_sdp','like','%'.$do_av_sdp.'%')->get();
    
    }
    
    function searchbyTypeDoFFP($do_av_ffp)
    {
        return BeUser::where('do_av_ffp','like','%'.$do_av_ffp.'%')->get();
    
    }
    
    function searchbyTypeDoRDP($do_av_rdp)
    {
        return BeUser::where('do_av_rdp','like','%'.$do_av_rdp.'%')->get();
    
    }

    function searchbyTypeDoWBC($do_av_wbc)
    {
        return BeUser::where('do_av_wbc','like','%'.$do_av_wbc.'%')->get();
    
    }
  


}
