<?php

namespace App\Http\Controllers;

use App\Follow;
use Illuminate\Http\Request;
use Auth;
use Redirect;

class FollowController extends Controller
{
    function show(){
        $followedByUser = \App\User::whereIn('id', \App\Follow::select('followed_by')->where('user_id', Auth::user()->id)->get())
                            ->get();
        $usersToFollow = \App\User::with('profiles')
                            ->whereNotIn('id', \App\Follow::select('followed_by')->where('user_id', Auth::user()->id)->get())
                            ->get();

        return view('tweeter_follows',['usersToFollow' => $usersToFollow,
                                        'followedByUser' => $followedByUser]);
    }
    function follow(Request $request){
        $follow = new \App\Follow();
        $follow->user_id = Auth::user()->id;
        $follow->followed_by = $request->id;
        $follow->save();

        return Redirect::back();
    }

    function unfollow(Request $request){
        \App\Follow::where('user_id', Auth::user()->id)
                    ->where('followed_by', $request->id)
                    ->delete();
        return Redirect::back();
    }
}
