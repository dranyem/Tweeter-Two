<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;

class FollowController extends Controller
{
    function show(){
        $followedByUser = \App\User::find(Auth::user()->id)->follows;

        $listOfFollowedByUser = [];
        $listOfFollowedByUserId = [1,Auth::user()->id];
        foreach($followedByUser as $follow){
            $username = \App\User::find($follow->followed_by);
            $name= \App\User::find($follow->followed_by)->profiles;
            array_push($listOfFollowedByUser,[$follow->id, $follow->followed_by, $username->username, $name->firstname, $name->lastname]);
            array_push($listOfFollowedByUserId, $follow->followed_by);

        }
        $usersToFollow = \App\User::whereNotIn('id', $listOfFollowedByUserId)->get();




        return view('tweeter_follows',['usersToFollow' => $usersToFollow,
                                        'followedByUser' => $listOfFollowedByUser]);
    }
    function follow(Request $request){
        $follow = new \App\Follow();
        $follow->user_id = Auth::user()->id;
        $follow->followed_by = $request->id;
        $follow->save();

        return Redirect::back();
    }

    function unfollow(Request $request){
        \App\Follow::destroy($request->id);
        return Redirect::back();
    }
}
