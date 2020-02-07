<h2>{{$tweet->users->profiles->firstname}} {{$tweet->users->profiles->lastname}}</h2>
<i>@ {{$tweet->users->username}}</i>
<p>{{$tweet->content}}</p>
<h5>{{$tweet->created_at->diffForHumans()}}</h5>

@if(in_array(Auth::user()->id, $tweet->likes->pluck('user_id')->toArray()))
    <a href="/tweet/unlike?tweetId={{$tweet->id}}">Unlike</a>
@else
    <a href="/tweet/like?tweetId={{$tweet->id}}">Like</a>
@endif
<h3>{{$tweet->likes->count()}} Likes</h3>


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
liked this tweet.</i>
<form action="/tweet/comment" method="post">
<textarea name="comment" placeholder="Comment" cols="40" rows="3"></textarea>
<input type="submit" value="Comment">
</form>

<h5>Comments : </h5>

