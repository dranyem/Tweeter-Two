<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;

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
        $profile = \App\User::with('profiles')->find($id);
        $profileTweets = \App\User::with('tweets', 'profiles')->find($id);

        return view('tweeter_profile',['profile' => $profile,
                                        'profileTweets' => $profileTweets
        ]);
    }

    function editProfile(Request $request){
        if(Auth::check()){

            $request->validate([
                'firstname' => 'required|max:50',
                'lastname' => 'required|max:50',
                'bio' => 'required|max:250'
            ]);

            $profile = \App\Profile::find($request->id);
            $profile->firstname = $request->firstname;
            $profile->lastname = $request->lastname;
            $profile->bio = $request->bio;

            $profile->save();

            redirect('/profile/views/'.$request->id);
        }else {
            redirect('/login');
        }


    }
    function showEditProfile(Request $request){
        $profile = \App\Profile::find($request->id);
        return view('tweeter_profile_edit')->with('profile', $profile);
    }
}
