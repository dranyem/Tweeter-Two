@extends('layouts.app')

@section('content')
<h1>Edit Your Tweet</h1>

<h2>{{$tweet->users->profiles->firstname}} {{$tweet->users->profiles->lastname}}</h2>
<i>@ {{$tweet->users->username}}</i>
<form action="/tweet/edit" method="post">
    @csrf
    <input type="hidden" name="tweetId" value="{{$tweet->id}}">
    <textarea name="content" cols="40" rows="5" placeholder="Content">{{$tweet->content}}</textarea>
    <input type="submit" value="Save">
</form>

<h5>{{$tweet->created_at->diffForHumans()}}</h5>

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
@endsection
