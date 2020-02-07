@extends('layouts.app')

@section('content')
<h2>{{$tweet->users->profiles->firstname}} {{$tweet->users->profiles->lastname}}</h2>
<i>@ {{$tweet->users->username}}</i>
<p>{{$tweet->content}}</p>
<h5>{{$tweet->created_at->diffForHumans()}}</h5>

@if(in_array(Auth::user()->id, $tweet->likes->pluck('user_id')->toArray()))
    <a href="/tweet/unlike?tweetId={{$tweet->id}}">Unlike</a>
@else
    <a href="/tweet/like?tweetId={{$tweet->id}}">Like</a>
@endif

@if (Auth::user()->id == $tweet->user_id)
<a href="/tweet/edit?tweetId={{$tweet->id}}">Edit</a>
<a href="/tweet/delete?tweetId={{$tweet->id}}">Delete</a>
@endif
<h3>{{$tweet->likes->count()}} Likes</h3>
<h3>{{$tweet->comments->count()}} Comments</h3>


<i>
    @if(in_array(Auth::user()->id, $tweet->likes->pluck('user_id')->toArray()))
        You,
    @endif
@foreach ($tweet->likes as $like)
    @if($tweet->likes->count() == 2)
        @if(!($like->user_id == Auth::user()->id))
            {{$like->users->profiles->firstname}} {{$like->users->profiles->lastname}},
        @endif
    @else
        @if(!($like->user_id == Auth::user()->id))
            {{$like->users->profiles->firstname}} {{$like->users->profiles->lastname}},
        @endif
    @endif
@endforeach
@if ($tweet->likes->count()!=0)
    liked this tweet.
@endif
</i>
<form action="/tweet/comment" method="post">
    @csrf
    <input type="hidden" name="tweetId" value="{{$tweet->id}}">
    <textarea name="comment" placeholder="Comment" cols="40" rows="3"></textarea>
    <input type="submit" value="Comment">
</form>

<h4>Comments : </h4>

@foreach ($tweet->comments as $comment)
    <h4>{{$comment->users->profiles->firstname}} {{$comment->users->profiles->lastname}}</h4>
    <i>@ {{$comment->users->username}}</i>
    <p>{{$comment->content}}</p>
    <h5>{{$comment->created_at->diffForHumans()}}</h5>

    @if ($comment->user_id == Auth::user()->id)
        <a href="/tweet/comment/edit?commentId={{$comment->id}}&tweetId={{$tweet->id}}">Edit</a>
        <a href="/tweet/comment/delete?commentId={{$comment->id}}">Delete</a><br>
    @endif
    --------------------------------------------------------------------------------------------------------
@endforeach

@endsection
