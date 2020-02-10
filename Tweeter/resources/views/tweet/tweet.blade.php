<div class="card-content">
    <div class="box">
       <article class="media">
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
                 <a class="has-text-black" href="/tweet/view/{{$tweet->id}}"> {{$tweet->content}}</a>
               </p>
             </div>
             <nav class="level">
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
                   @if(in_array(Auth::user()->id, $tweet->likes->pluck('user_id')->toArray()))
                       <a class="level-item button is-small is-danger" href="/tweet/unlike?tweetId={{$tweet->id}}">
                           <span class="icon is-small"><i class="fas fa-thumbs-down"></i></span>
                           <span>Unlike</span>
                       </a>
                   @else
                       <a class="level-item button is-small is-info" href="/tweet/like?tweetId={{$tweet->id}}">
                           <span class="icon is-small"><i class="fas fa-thumbs-up"></i></span>
                           <span>Like</span>
                       </a>
                   @endif
               </div>
             </nav>
           </div>
           <div class="media-right">
               @if (Auth::user()->id == $tweet->user_id)
                   <a class="button is-small is-warning" href="/tweet/edit?tweetId={{$tweet->id}}">
                       <span class="icon is-small"><i class="fas fa-edit"></i></span>
                       <span>Edit</span>
                   </a>
                   <a class="button is-small is-danger" href="/tweet/delete?tweetId={{$tweet->id}}">
                       <span class="icon is-small"><i class="fas fa-trash"></i></span>
                       <span>Delete</span>
                   </a>
               @endif
           </div>
         </article>
    </div>
</div>
