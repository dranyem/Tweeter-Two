<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;

class TweetController extends Controller
{

    function createTweet(Request $request){
        if(Auth::check()){
            $request->validate([
                'user_id' => 'required',
                'content' => 'required|max:255'
            ]);

            $tweet = new \App\Tweet();
            $tweet->user_id = $request->user_id;
            $tweet->content = $request->content;
            $tweet->save();

            return Redirect::back();

        }else {
            redirect('/login');
        }

    }
}
