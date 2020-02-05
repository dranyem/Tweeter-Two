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

@foreach ($profileTweets->tweets as $tweet)
    <div class="tweet">
    <h2>{{$profileTweets->profiles->firstname}} {{$profileTweets->profiles->lastname}}</h2>
    <h3><i> @ {{$profileTweets->username}}</i></h3>
    <p>{{$tweet->content}}</p>
    <i>{{$tweet->created_at->diffForHumans()}}</i>
    </div>
@endforeach
