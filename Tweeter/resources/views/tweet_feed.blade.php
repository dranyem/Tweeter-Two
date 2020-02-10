<div class="card">
    <header class="card-header">
        <p class="card-header-title has-text-primary title is-3">Tweets</p>
    </header>
    @foreach ($tweets as $tweet)
        @include('tweet.tweet')
    @endforeach
</div>

