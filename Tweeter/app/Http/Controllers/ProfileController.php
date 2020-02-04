<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function show(){
        return view('profile_setup');
    }

    function createProfile(Request $request){
        $request->validate([
            'firstName' => 'required|max:50',
            'lastName' => 'required|max:50',
            'bio' => 'required|max:100',
            'birthDate'=> 'required'
        ]);

        $profile = new \App\Profile();
        $profile->firstname = $request->firstName;
        $profile->lastname = $request->lastName;
        $profile->bio = $request->bio;
        $profile->birthdate = $request->birthDate;
        $profile->user_id = $request->userId;
        $profile->save();

        return redirect('/home');
    }
    function showTweetProfile($id){

        return view('tweeter_profile');
    }
}
