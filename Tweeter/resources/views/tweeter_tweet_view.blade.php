@extends('layouts.app')

@section('content')
<div class="card">
    <header class="card-header">
        <p class="card-header-title title has-text-primary is-4">Tweet</p>
    </header>
    <div class="card-content">
        <div class="box">
            @include('tweet.tweet')
        </div>

        <article class="media">
            <i class="has-text-primary is-size-4">
                @if(in_array(Auth::user()->id, $tweet->likes->pluck('user_id')->toArray()))
                    <a class ="has-text-primary" href="/profile/view/{{Auth::user()->id}}">You</a>,
                @endif
            @foreach ($tweet->likes as $like)
                @if($tweet->likes->count() == 2)
                    @if(!($like->user_id == Auth::user()->id))
                        <a class ="has-text-primary" href="/profile/view/{{$like->user_id}}">{{$like->users->profiles->firstname}} {{$like->users->profiles->lastname}}</a>
                    @endif
                @else
                    @if(!($like->user_id == Auth::user()->id))
                    <a class ="has-text-primary" href="/profile/view/{{$like->user_id}}">{{$like->users->profiles->firstname}} {{$like->users->profiles->lastname}}</a>,
                    @endif
                @endif
            @endforeach
            @if ($tweet->likes->count()!=0)
            <span> liked this tweet.</span>
            @endif
            </i>
        </article>
        <article class="media-content">
            <article class="media">
                <figure class="media-left">
                  <p class="image is-64x64">
                  <img src="/storage/avatars/{{Auth::user()->profiles->avatar}}">
                  </p>
                </figure>
                <div class="media-content">
                    <div class="content">
                        <form action="/tweet/comment" method="post">
                            @csrf
                            <input type="hidden" name="tweetId" value="{{$tweet->id}}">
                            <div class="field">
                                <p class="control">
                                <textarea class="textarea" name="comment" placeholder="Add a comment..."></textarea>
                                </p>
                            </div>
                            <div class="field">
                                <p class="control">
                                </p>
                            </div>
                            <div class="level">
                                <div class="level-item">
                                    <p class="control">
                                    <button class="button is-link" type="submit">Post comment</button>
                                    </p>
                                </div>
                                <div class="level-item">
                                <giphy tweet-id="{{$tweet->id}}"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </article>
            <h1 class="title has-text-primary is-4">Comments</h1>
            @foreach ($tweet->comments as $comment)
            <article class="media">
                <figure class="media-left">
                    <p class="image is-32x32">
                        <a href="/profile/view/{{$comment->users->id}}">
                      <img src="/storage/avatars/{{$comment->users->profiles->avatar}}"></a>
                    </p>
                  </figure>
                  <div class="media-content">
                    <div class="content">
                      <p>
                      <a class="has-text-primary is-size-6" href="/profile/view/{{$comment->users->id}}"><strong>{{$comment->users->profiles->firstname}} {{$comment->users->profiles->lastname}}</strong></a>
                      <a class="has-text-primary is-size-6" href="/profile/view/{{$comment->users->id}}"><small>@ {{$comment->users->username}}</small></a>
                        <br>
                       @php
                           if (filter_var($comment->content, FILTER_VALIDATE_URL)) {
                                echo "<img src='$comment->content'>";
                            } else {
                                echo $comment->content;
                            }
                       @endphp
                        <br>
                        <small>{{$comment->created_at->diffForHumans()}}</small>
                      </p>
                    </div>
                </div>
                <div class="">
                    <div class="level"></div>

                    @if ($comment->user_id == Auth::user()->id)
                        @if (filter_var($comment->content, FILTER_VALIDATE_URL))
                            <a class="button is-danger is-small" href="/tweet/comment/delete?commentId={{$comment->id}}">
                                <span class="icon is-small"><i class="fas fa-trash"></i></span>
                                <span>Delete</span>
                            </a>
                        @else
                            <a class="button is-warning is-small" href="/tweet/comment/edit?commentId={{$comment->id}}&tweetId={{$tweet->id}}">
                                <span class="icon is-small"><i class="fas fa-edit"></i></span>
                                <span>Edit</span>
                            </a>
                            <a class="button is-danger is-small" href="/tweet/comment/delete?commentId={{$comment->id}}">
                                <span class="icon is-small"><i class="fas fa-trash"></i></span>
                                <span>Delete</span>
                            </a>
                        @endif

                @endif
                </div>
            </article>
            @endforeach

        </article>
    </div>
</div>
@endsection
