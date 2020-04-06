<base-tweet
:logged-in-user="{{json_encode(Auth::user()->id)}}"
:tweet-id="{{json_encode($tweet->id)}}"
:user-avatar="{{json_encode($tweet->users->profiles->avatar)}}"
:user-id="{{json_encode($tweet->user_id)}}"
:user-first-name="{{json_encode($tweet->users->profiles->firstname)}}"
:user-last-name="{{json_encode($tweet->users->profiles->lastname)}}"
:user-user-name="{{json_encode($tweet->users->username)}}"
:tweet-date="{{ json_encode($tweet->created_at->diffForHumans()) }}"
:tweet-content="{{json_encode($tweet->content)}}"
:likes-count="{{json_encode($tweet->likes->count())}}"
:comment-count="{{json_encode($tweet->comments->count())}}"
:likes-list="{{ json_encode($tweet->likes->pluck('user_id')->toArray()) }}"
/>
