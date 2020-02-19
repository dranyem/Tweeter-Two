@extends('layouts.app')

@section('content')
<div class="card">
    <div class="level">
        <h1 class="title level-item has-text-primary is-2">{{Auth::user()->profiles->firstname.' '.Auth::user()->profiles->lastname}} </h1>
    </div>

    <header class="card-header">
        <p class="card-header-title title has-text-primary is-3">Write a tweet</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form action="/tweet/create" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <article class="media">
                    <figure class="media-left">
                        <p class="image is-64x64">
                            <img src="/storage/avatars/{{Auth::user()->profiles->avatar}}">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="field">
                            <p class="control">
                            <textarea class="textarea is-primary" name="content" placeholder="Write a tweet ..."></textarea>
                            </p>
                        </div>
                        <nav class="level">
                            <div class="level-left">
                                <div class="level-item">
                                    <button class="button is-primary" type="submit">Post Tweet</button>
                                </div>
                            </div>
                        </nav>
                    </div>
                </article>
            </form>
        </div>
    </div>
</div>
<div class="card">
    <header class="card-header">
        <p class="card-header-title has-text-primary title is-3">Tweets</p>
    </header>
    <div class="card-content">
        <h1 class="title">{{$tweets->links('vendor.pagination.bulma')}}</h1>
        <div class="content">
            @foreach ($tweets as $tweet)
            <div class="box">
                @include('tweet.tweet')
            </div>
            @endforeach
        </div>
        <h1 class="title">{{$tweets->links('vendor.pagination.bulma')}}</h1>
    </div>
</div>
@endsection
