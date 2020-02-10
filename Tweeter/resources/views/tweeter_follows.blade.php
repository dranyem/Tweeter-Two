
@extends('layouts.app')
@section('content')

<div class="columns">
    <div class="column">
        <div class="card">
            <div class="card-header">
                <p class="card-header-title title has-text-primary is-3">Tweeter users you are Following</p>
            </div>
            <div class="card-content">
                @foreach ($followedByUser as $user)
                <a class="box" href="/profile/view/{{$user->id}}">
                    <div class="columns">
                        <div class="column">
                            <img class="image is-96x96" src="/storage/avatars/{{$user->profiles->avatar}}" alt="">
                        </div>
                        <div class="column is-two-thirds">
                            <p class="title has-text-primary is-5">{{$user->profiles->firstname." ".$user->profiles->lastname}}</p>
                            <p class="subtitle has-text-primary is-6"><i>@ {{$user->username}}</i></p>
                            <form action="/follows/unfollowUser" method="get">
                                <button class="button is-small is-danger" type="submit" name="id" value="{{$user->id}}">Unfollow</button>
                            </form>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="column">
        <div class="card">
            <div class="card-header">
                <p class="card-header-title title has-text-primary is-3">Other Tweeter Users</p>
            </div>
            <div class="card-content">
                @foreach ($usersToFollow as $user)
                    @if (!($user->id == 1 || $user->id==Auth::user()->id))
                        <a class="box" href="/profile/view/{{$user->id}}">
                            <div class="columns">
                                <div class="column">
                                    <img class="image is-96x96" src="/storage/avatars/{{$user->profiles->avatar}}" alt="">
                                </div>
                                <div class="column is-two-thirds">
                                    <p class="title has-text-primary is-5">{{$user->profiles->firstname." ".$user->profiles->lastname}}</p>
                                    <p class="subtitle has-text-primary is-6"><i>@ {{$user->username}}</i></p>
                                    <form action="/follows/followUser" method="get">
                                        <button class="button is-success" type="submit"name="id" value="{{$user->id}}">Follow</button>
                                    </form>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
    </div>
</div>






{{-- <div>
    <h1></h1>
    @foreach ($followedByUser as $user)
    <a href="/profile/view/{{$user->id}}"><h5>{{$user->profiles->firstname." ".$user->profiles->lastname}}</h5> {{$user->username}}</a>

        <form action="/follows/unfollowUser" method="get">
            <button type="submit" name="id" value="{{$user->id}}">Unfollow</button>
        </form>
    @endforeach
</div>

<div>
    <h1>Other Tweeter Users</h1>
    @foreach ($usersToFollow as $user)
        @if (!($user->id == 1 || $user->id==Auth::user()->id))
        <a href="/profile/view/{{$user->id}}"><h5>{{$user->profiles->firstname." ".$user->profiles->lastname}}</h5> {{$user->username}}</a>
        <form action="/follows/followUser" method="get">
            <button type="submit"name="id" value="{{$user->id}}">Follow</button>
        </form>
        @endif
    @endforeach
</div> --}}
@endsection

