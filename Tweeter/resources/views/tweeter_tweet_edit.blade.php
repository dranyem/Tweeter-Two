@extends('layouts.app')

@section('content')
<div class="card">
    <header class="card-header">
        <p class="card-header-title"> Edit your Tweet</p>
    </header>
    <div class="card-content">
        <div class="content">
            <div class="card-content">
                <div class="box">
                   <article class="media column">
                       <figure class="media-left">
                         <p class="image is-64x64">
                           <a href="/profile/view/{{$tweet->user_id}}">
                               <img src="/storage/avatars/{{$tweet->users->profiles->avatar}}">
                           </a>
                         </p>
                       </figure>
                       <div class="media-content">
                         <div class="content">
                           <p>
                               <a class="has-text-primary is-size-5" href="/profile/view/{{$tweet->user_id}}">
                                   <strong>{{$tweet->users->profiles->firstname}} {{$tweet->users->profiles->lastname}}</strong></a>
                                   <a class="has-text-primary is-size-5" href="/profile/view/{{$tweet->user_id}}"><small><i>@ {{$tweet->users->username}}</i></small>
                               </a>
                               <small>{{$tweet->created_at->diffForHumans()}}</small>
                             <br>
                             <form action="/tweet/edit" method="post">
                                @csrf
                                <input type="hidden" name="tweetId" value="{{$tweet->id}}">
                                <div class="field">
                                    <div class="control">
                                        <textarea class="textarea is-primary" name="content" placeholder="Content">{{$tweet->content}}</textarea>
                                    </div>
                                </div>
                                <div class="field level">
                                    <p class="control level-item">
                                      <button class="button is-success" type="submit">
                                        <span class="icon is-small">
                                            <i class="fas fa-save"></i>
                                        </span>
                                        <span>Save</span>
                                      </button>
                                    </p>
                                  </div>
                            </form>
                           </p>
                         </div>
                         <nav class="level is-mobile">
                           <div class="level-left">
                               <div class="field level-item">
                                   <span class="is-size-5 has-text-primary">{{$tweet->likes->count()}}</span>
                                   <span class="icon has-text-primary is-size-5 is-large">
                                       <i class="fas fa-thumbs-up"></i>
                                   </span>
                               </div>
                               <div class="field level-item">
                                   <span class="is-size-5 has-text-primary">{{$tweet->comments->count()}}</span>
                                   <span class="icon has-text-primary is-size-5 is-large">
                                       <i class="fas fa-comment-dots"></i>
                                   </span>
                               </div>
                           </div>
                         </nav>
                       </div>
                     </article>
                </div>
            </div>
        </div>
        <article class="media">
            <i class="has-text-primary is-size-4">
                @if(in_array(Auth::user()->id, $tweet->likes->pluck('user_id')->toArray()))
                    You
                @endif
            @foreach ($tweet->likes as $like)
                @if($tweet->likes->count() == 2)
                    @if(!($like->user_id == Auth::user()->id))
                        {{$like->users->profiles->firstname}} {{$like->users->profiles->lastname}}
                    @endif
                @else
                    @if(!($like->user_id == Auth::user()->id))
                        {{$like->users->profiles->firstname}} {{$like->users->profiles->lastname}}
                    @endif
                @endif
            @endforeach
            @if ($tweet->likes->count()!=0)
            <span> liked this tweet.</span>
            @endif
            </i>
        </article>
            <h1 class="title has-text-primary is-4">Comments</h1>
            @foreach ($tweet->comments as $comment)
            <article class="media column">
                <figure class="media-left">
                    <p class="image is-48x48">
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
                        {{$comment->content}}
                        <br>
                        <small>{{$comment->created_at->diffForHumans()}}</small>
                      </p>
                    </div>
                </div>
            </article>
            @endforeach
        </article>
    </div>
</div>
@endsection
