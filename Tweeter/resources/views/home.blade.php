@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <a href="/profile">Profile</a>
    <a href="/follows">Tweeter Followers</a>
    @include('create_tweet_form')
    @include('tweet_feed')
@endsection
