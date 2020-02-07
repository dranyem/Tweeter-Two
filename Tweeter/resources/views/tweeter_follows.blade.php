<div>
    <h1>Tweeter Users You are Folllowing</h1>
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
</div>
