<form action="/tweet/create" method="post">
    @csrf
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <textarea name="content" placeholder="Tweet what's on your mind!" cols="100" rows="5"></textarea>
    @error('content')
        <span>{{$message}}</span>
    @enderror
    <input type="submit" value="Create Tweet">

</form>
