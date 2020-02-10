<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
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
            'birthDate'=> 'required',
            'location' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if(!empty($request->avatar)){
            $avatarName = Auth::user()->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
            $request->avatar->storeAs('avatars',$avatarName);
        }else {
            $avatarName= 'user.svg';
        }

        $profile = new \App\Profile();
        $profile->firstname = $request->firstName;
        $profile->lastname = $request->lastName;
        $profile->bio = $request->bio;
        $profile->birthdate = $request->birthDate;
        $profile->user_id = $request->userId;
        $profile->location =$request->location;
        $profile->avatar = $avatarName;
        $profile->save();

        return redirect('/home');
    }
    function showTweetProfile($id){
        $profile = \App\User::find($id);
        return view('tweeter_profile',['profile' => $profile]);
    }

    function editProfile(Request $request){
        if(Auth::check()){

            $request->validate([
                'firstname' => 'required|max:50',
                'lastname' => 'required|max:50',
                'bio' => 'required|max:250',
                'location' => 'required|max:250',
                'birthDate' => 'required',
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

            ]);

            $profile = \App\Profile::find($request->id);
            $profile->firstname = $request->firstname;
            $profile->lastname = $request->lastname;
            $profile->bio = $request->bio;
            $profile->location = $request->location;
            $profile->birthdate = $request->birthDate;
            if(!empty($request->avatar)){
                if($profile->avatar != 'user.jpg'){
                    Storage::delete($profile->avatar);
                }
                $avatarName = Auth::user()->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
                $request->avatar->storeAs('avatars',$avatarName);
                $profile->avatar = $avatarName;
            }

            $profile->save();

           return redirect('/profile/view/'.$request->id);
        }else {
           return redirect('/login');
        }
    }
    function showEditProfile(Request $request){
        if($request->id != Auth::user()->id){
            return redirect('/home');
        }
        $profile = \App\Profile::find($request->id);
        return view('tweeter_profile_edit')->with('profile', $profile);
    }

    function userDelete(Request $request){
        if($request->id != Auth::user()->id){
            return redirect('/home');
        }
        if(Auth::check()){
            \App\Profile::where('user_id', $request->id)->delete();
            \App\Follow::where('user_id', $request->id)->delete();
            \App\Tweet::where('user_id', $request->id)->delete();
            \App\Comment::where('user_id', $request->id)->delete();
            \App\Like::where('user_id', $request->id)->delete();
            \App\User::destroy($request->id);
        }
        return redirect('/login');
    }

    function userEdit(Request $request){
        if(Auth::check()){
            if(Auth::user()->email == $request->email )

            $request->validate([
                'email' => 'required|max:255|string|email',
                'username' => 'required|max:255|string'
            ]);

            $user = \App\User::find($request->userId);
            $user->email = $request->email;
            $user->username = $request->username;
            if(!empty($request->password)){
                $user->password = Hash::make($request->password);
            }
            $user->save();
             return redirect('/profile/view/'.$user->profiles->id);
        } else {
            return redirect('/login');
        }
    }

    function test(Request $request){
        $test = $request->location;
        return dd($test);
    }
}
