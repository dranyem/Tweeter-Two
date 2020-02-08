@extends('layouts.app')

@section('content')
<h2>{{$tweet->users->profiles->firstname}} {{$tweet->users->profiles->lastname}}</h2>
<i>@ {{$tweet->users->username}}</i>
<p>{{$tweet->content}}</p>
<h5>{{$tweet->created_at->diffForHumans()}}</h5>
<h3>{{$tweet->likes->count()}} Likes</h3>
<h3>{{$tweet->comments->count()}} Comments</h3>


<i>
    @if(in_array(Auth::user()->id, $tweet->likes->pluck('user_id')->toArray()))
        You
    @endif
@foreach ($tweet->likes as $like)
    @if($tweet->likes->count() == 2)
        ,
        @if(!($like->user_id == Auth::user()->id))
            {{$like->users->profiles->firstname}} {{$like->users->profiles->lastname}}
        @endif
    @else
        @if(!($like->user_id == Auth::user()->id))
            {{$like->users->profiles->firstname}} {{$like->users->profiles->lastname}}
        @endif
    @endif
@endforeach
@if ($tweet->likes->count()!=0)
    liked this tweet.
@endif
</i>

<h4>Comments : </h4>

@foreach ($tweet->comments as $comment)
    @if ($comment->id == $commentId)
        <h4>{{$comment->users->profiles->firstname}} {{$comment->users->profiles->lastname}}</h4>
        <i>@ {{$comment->users->username}}</i>
        <form action="/tweet/comment/edit" method="post">
            @csrf
            <input type="hidden" name="commentId" value="{{$comment->id}}">
            <input type="hidden" name="tweetId" value="{{$comment->tweet_id}}">
            <textarea name="content"  cols="45" rows="3" placeholder="Comment">{{$comment->content}}</textarea>
            <input type="submit" value="Save">
        </form>
        <h5>{{$comment->created_at->diffForHumans()}}</h5>
    @else
        <h4>{{$comment->users->profiles->firstname}} {{$comment->users->profiles->lastname}}</h4>
        <i>@ {{$comment->users->username}}</i>
        <p>{{$comment->content}}</p>
        <h5>{{$comment->created_at->diffForHumans()}}</h5>
    @endif
    --------------------------------------------------------------------------------------------------------
@endforeach

@endsection
