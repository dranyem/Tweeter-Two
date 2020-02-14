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

            return Redirect::back();
        } else {
            return redirect('/login')->with('messageError', 'Please Login to continue!');
        }

    }

    function unfollow(Request $request){
        if(Auth::check()){
            \App\Follow::where('user_id', Auth::user()->id)
                                ->where('followed_by', $request->id)
                                ->delete();
                return Redirect::back();
        } else {
            return redirect('/login')->with('messageError', 'Please Login to continue!');
        }

    }
}
