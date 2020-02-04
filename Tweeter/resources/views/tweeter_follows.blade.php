<div>
    <h1>Tweeter Users You are Folllowing</h1>
    @foreach ($followedByUser as $user)
    <a href="/profile/{{$user[1]}}"><h5>{{$user[3]." ".$user[4]}}</h5> {{$user[2]}}</a>

        <form action="/follows/unfollowUser" method="get">
            <button type="submit" name="id" value="{{$user[0]}}">Unfollow</button>
        </form>
    @endforeach
</div>

<div>
    <h1>Other Tweeter Users</h1>
    @foreach ($usersToFollow as $user)
        <h3>{{$user->username}}</h3>
        <form action="/follows/followUser" method="get">
            <button type="submit"name="id" value="{{$user->id}}">Follow</button>
        </form>
    @endforeach
</div>
