@extends('layouts.app')
@section('content')
<img class="image is-128x128" src="/storage/avatars/{{$profile->profiles->avatar}}" alt="">
<h1>{{$profile->profiles->firstname}} {{ $profile->profiles->lastname}}</h1>
<h3>{{$profile->email}}</h3>
<h2><i>@ {{$profile->username}}</i></h2>
<h3>{{$profile->profiles->birthdate}}</h3>
<p>{{$profile->profiles->bio}}</p>
<p>Member since : {{$profile->created_at->format('m-d-Y')}}</p>
@if (Auth::user()->id == $profile->id)
<a href="/profile/edit?id={{Auth::user()->id}}">Edit Your Profile</a>
@endif
<hr>

<h1>Tweets : </h1>
@foreach ($profileTweets as $tweet)
    <a href="/profile/view/{{$tweet->user_id}}">
        <h2>{{$tweet->users->profiles->firstname}} {{$tweet->users->profiles->lastname}}</h2>
        <h3><i> @ {{$tweet->users->username}}</i></h3>
    </a>
    <a href="/tweet/view/{{$tweet->id}}"> <p>{{$tweet->content}}</p></a>
    <i>{{$tweet->created_at->diffForHumans()}}</i>

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
    -----------------------------------------------------------------------------------------------------------
@endforeach
@endsection


