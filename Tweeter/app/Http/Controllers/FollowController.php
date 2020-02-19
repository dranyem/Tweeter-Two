<?php

namespace App\Http\Controllers;

use App\Follow;
use Illuminate\Http\Request;
use Auth;
use Redirect;

class FollowController extends Controller
{
    function show(){
        if(Auth::check()){
            $profile = \App\User::find(Auth::user()->id)->profiles;
            if($profile == null){
                return view('profile_setup');
            }
            $followedByUser = \App\User::whereIn('id', \App\Follow::select('followed_by')->where('user_id', Auth::user()->id)->get())
                            ->get();
            $usersToFollow = \App\User::whereNotIn('id', \App\Follow::select('followed_by')->where('user_id', Auth::user()->id)->get())
                            ->get();

            return view('tweeter_follows',['usersToFollow' => $usersToFollow,
                                        'followedByUser' => $followedByUser]);
        } else {
            return redirect('/login')->with('messageError', 'Please Login to continue!');
        }

    }
    function follow(Request $request){
        if(Auth::check()){
            $follow = new \App\Follow();
            $follow->user_id = Auth::user()->id;
            $follow->followed_by = $request->id;
            $follow->save();

            $user = \App\User::find($request->id);
            return Redirect::back()->with('messageSuccess', 'Followed '.$user->profiles->firstname.' '.$user->profiles->lastname .' successfully!');
        } else {
            return redirect('/login')->with('messageError', 'Please Login to continue!');
        }

    }

    function unfollow(Request $request){
        if(Auth::check()){
            \App\Follow::where('user_id', Auth::user()->id)
                                ->where('followed_by', $request->id)
                                ->delete();
                                $user = \App\User::find($request->id);
                return Redirect::back()->with('messageSuccess', 'Unfollowed '.$user->profiles->firstname.' '.$user->profiles->lastname .' succesfully!');
        } else {
            return redirect('/login')->with('messageError', 'Please Login to continue!');
        }

    }
}
