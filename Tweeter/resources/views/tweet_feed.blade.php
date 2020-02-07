<h1>Tweets : </h1>
@foreach ($tweets as $tweet)
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
