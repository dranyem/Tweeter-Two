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

            return Redirect::back()->with('messageSuccess', 'Tweet successfully created!');
        }else {
            return redirect('/login')->with('messageError', 'Please Login to continue!');
        }
    }

    function deleteTweet(Request $request){
        if(Auth::check()){
            $tweet = \App\Tweet::find($request->tweetId);

            if($tweet->user_id == Auth::user()->id){
                \App\Tweet::destroy($request->tweetId);
                $message = 'Tweet successfully deleted!';
                $messageType = 'messageSuccess';
            } else {
                $message = 'Tweet belongs to a different user. Unable to delete!';
                $messageType = 'messageError';
            }
            return redirect('/home')->with($messageType, $message);
        }else{
            return redirect('/login')->with('messageError', 'Please Login to continue!');
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

            return redirect('/tweet/view/'.$request->tweetId)->with('messageSuccess', 'Tweet edited successfully!');
        }else{
            return redirect('/login')->with('messageError', 'Please Login to continue!');
        }
    }

    function editTweetView(Request $request){
        if(Auth::check()){
            $tweet =\App\Tweet::orderBy('created_at', 'asc')->find($request->tweetId);
            if($tweet == null){
               return redirect('/home')->with('messageError', 'Tweet does not exist!');
            }
            if($tweet->user_id != Auth::user()->id){
                return redirect('/home')->with('messageError', 'Tweet does not belong to you to edit!');
            }

            return view('tweeter_tweet_edit')->with(['tweet'=> $tweet]);
        } else {
            return redirect('/login')->with('messageError', 'Please Login to continue!');
        }
    }

    function likeTweet(Request $request){
        if(Auth::check()){
            $like = new \App\Like();
            $like->user_id = Auth::user()->id;
            $like->tweet_id = $request->tweetId;
            $like->save();
            return Redirect::back()->with('messageSuccess', 'Liked tweet successfully.');
        }else {
            return redirect('/login')->with('messageError', 'Please Login to continue!');
        }
    }

    function unlikeTweet(Request $request){
        if(Auth::check()){
            \App\Like::where('user_id',Auth::user()->id)
                        ->where('tweet_id', $request->tweetId)
                        ->delete();
            return Redirect::back()->with('messageSuccess', 'Unliked tweet successfully.');
        }else {
            return redirect('/login')->with('messageError', 'Please Login to continue!');
        }
    }

    function viewProfileTweet($id){
        if(Auth::check()){
            $tweet =\App\Tweet::orderBy('created_at', 'asc')->find($id);
            if($tweet === null){
                return redirect('/home')->with('messageError', 'Tweet does not exist!');
            } else {
                return view('tweeter_tweet_view', ['tweet'=> $tweet]);
            }
        } else {
            return redirect('/login')->with('messageError', 'Please Login to continue!');
        }

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

            return Redirect::back()->with('messageSuccess', 'Comment added successfully!');
        } else {
            return redirect('/login')->with('messageError', 'Please Login to continue!');
        }
    }

    function commentDelete(Request $request){
        if(Auth::check()){
            $comment = \App\Comment::find($request->commentId);

            if($comment->user_id == Auth::user()->id){
                \App\Comment::destroy($request->commentId);
                $message = 'Comment deleted successfully';
                $messageType = 'messageSuccess';
            } else {
                $message = 'Comment does not belong to you to delete!';
                $messageType = 'messageError';
            }

            return Redirect::back()->with($messageType, $message);
        } else {
            return redirect('/login')->with('messageError', 'Please Login to continue!');
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

            return redirect('/tweet/view/'.$request->tweetId)->with('messageSuccess', 'Comment edited successfully!');

        }else{
            return redirect('login')->with('messageError', 'Please Login to continue!');
        }
    }

    function commentEditView(Request $request){
        if(Auth::check()){
            $tweet = \App\Tweet::find($request->tweetId);
            $comment = \App\Comment::find($request->commentId);
            if($tweet == null || $comment == null){
                return redirect('/home')->with('messageError', 'Comment does not exist!');
            }
            if($comment->user_id != Auth::user()->id){
                return redirect('/home')->with('messageError', 'Comment does not belong to you to edit!');
            }
            return view('tweeter_tweet_comment_edit')->with(['tweet' => $tweet, 'commentId' => $request->commentId]);
        } else {
            return redirect('/login')->with('messageError', 'Please Login to continue!');
        }


    }
}
