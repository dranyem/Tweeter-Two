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

    function deleteTweet(Request $request){
        if(Auth::check()){
            \App\Tweet::destroy($request->tweetId);

            return redirect('/home');
        }else{
            return redirect('/login');
        }
    }

    function editTweet(Request $request){
        if(Auth::check()){
            $request->validate([
                'content' => 'required|max:250'
            ]);

            $tweet = \App\Tweet::find($request->tweetId);
            $tweet->content = $request->content;
            $tweet->save();

            return redirect('/tweet/view/'.$request->tweetId);
        }else{
            return redirect('/login');
        }
    }

    function editTweetView(Request $request){
        $tweet =\App\Tweet::orderBy('created_at', 'asc')->find($request->tweetId);
        return view('tweeter_tweet_edit')->with(['tweet'=> $tweet]);
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
        $tweet =\App\Tweet::orderBy('created_at', 'asc')->find($id);
        return view('tweeter_tweet_view', ['tweet'=> $tweet]);
    }

    function commentOnTweet(Request $request){
        if(Auth::check()){
            $request->validate([
                'comment' => 'required|max:250'
            ]);

            $comment = new \App\Comment();
            $comment->user_id = Auth::user()->id;
            $comment->tweet_id = $request->tweetId;
            $comment->content = $request->comment;
            $comment->save();

            return Redirect::back();
        } else {
            return redirect('/login');
        }
    }

    function commentDelete(Request $request){
        if(Auth::check()){
            \App\Comment::destroy($request->commentId);

            return Redirect::back();
        } else {
            return redirect('/login');
        }
    }

    function commentEdit(Request $request){
        if(Auth::check()){
            $request->validate([
                'content' => 'required|max:250'
            ]);

            $comment = \App\Comment::find($request->commentId);
            $comment->content = $request->content;
            $comment->save();

            return redirect('/tweet/view/'.$request->tweetId);

        }else{
            return redirect('login');
        }
    }

    function commentEditView(Request $request){
        $tweet = \App\Tweet::find($request->tweetId);

        return view('tweeter_tweet_comment_edit')->with(['tweet' => $tweet, 'commentId' => $request->commentId]);
    }
}
