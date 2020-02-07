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
            return redirect('/login');
        }
    }

    function likeTweet(Request $request){
        if(Auth::check()){
            $like = new \App\Like();
            $like->user_id = Auth::user()->id;
            $like->tweet_id = $request->tweetId;
            $like->save();
            return Redirect::back();
        }else {
            return redirect('/login');
        }
    }

    function unlikeTweet(Request $request){
        if(Auth::check()){
            \App\Like::where('user_id',Auth::user()->id)
                        ->where('tweet_id', $request->tweetId)
                        ->delete();
            return Redirect::back();
        }else {
            return redirect('/login');
        }
    }
    function viewProfileTweet($id){
        $tweet =\App\Tweet::find($id);
        return view('tweeter_tweet_view', ['tweet'=> $tweet]);
    }
}
