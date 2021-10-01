<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Role;
use Illuminate\Http\Request;

class Profilecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles= Profile::all();
        return view('profile.index',compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['roles']=Role::all();
        return view('profile.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Profile::create($request->all());
        if($request->profileimg!=''){  
            $file_extention = $request->profileimg->getClientOriginalExtension();
            $file_name = time().rand(99,999).'_profile.'.$file_extention;
            $file_path = $request->profileimg->move('profile',$file_name);
        }else{
            $file_path ='';
        }
        Profile::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
            'roleid' => $request->roleid,
            'dob' => $request->dob,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'profileimg' => $file_path
        ]);
        return redirect()->route('users.index')
                        ->with('success','Profile created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profilemodel  $profilemodel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profiles = Profile::where('profileid','=',$id)->first();
        return view('profile.show',compact('profiles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profilemodel  $profilemodel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['profiles']=Profile::where('profileid','=',$id)->first();
        //dd($profiles->get());
        //dd($profiles);
        $data['roles']=Role::all();
        return view('profile.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profilemodel  $profilemodel
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        if($request->profileimg!=''){
            $file_extention = $request->profileimg->getClientOriginalExtension();
            $file_name = time().rand(99,999).'_profile.'.$file_extention;
            $file_path = $request->profileimg->move('profile',$file_name);
        }
        $profiles = Profile::where('profileid',$id)->first();
        //dd($profiles->profileid);
         $profiles->name=$request->name;
        $profiles->gender=$request->gender;
        $profiles->dob=$request->dob;
        $profiles->email=$request->email;
        $profiles->roleid=$request->roleid;
        $profiles->mobile=$request->mobile;
        $profiles->address=$request->address;
        if($request->profileimg!=''){$profiles->profileimg=$file_path;}
        $profiles->save();
        return redirect()->route('users.index')->with('success','Profile updated Successfully..!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profilemodel  $profilemodel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Profile::where('profileid',$id)->delete();
        return redirect()->route('users.index')
                        ->with('success','Profile deleted successfully.');
    }
}
