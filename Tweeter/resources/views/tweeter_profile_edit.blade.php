@extends('layouts.app')

@section('content')
<form action="/user/edit" method="post">
@csrf
<h1>User Account Information Edit</h1>
<input type="hidden" name="userId" value="{{$profile->user_id}}">
<input type="text" name="email" placeholder="Email" value="{{$profile->users->email}}">
@error('email')
    <i>{{$message}}</i>
@enderror
<input type="text" name="username" placeholder="Username" value="{{$profile->users->username}}">
@error('username')
    <i>{{$message}}</i>
@enderror
<input type="password" name="password"  placeholder="Password">
@error('password')
    <i>{{$message}}</i>
@enderror
<input type="submit" value="Save">
</form>
<a href="/user/delete?id={{$profile->user_id}}">Delete Account</a><br>
-------------------------------------------------------------------------------------------------------

<form action="/profile/edit" method="post">
    @csrf
    <h1>Profile Information Edit</h1>
    <input type="hidden" name="id" value="{{$profile->id}}">
    <input type="text" name="firstname" value="{{$profile->firstname}}" >
    @error('firstname')
        <i>{{$message}}</i>
    @enderror
    <br>
    <input type="text" name="lastname" value="{{$profile->lastname}}">
    @error('lastname')
        <i>{{$message}}</i>
    @enderror<br>
    <textarea name="bio" placeholder="Write something about yourself here" cols="50" rows="5">{{$profile->bio}}</textarea>
    @error('bio')
        <i>{{$message}}</i>
    @enderror
    <input type="submit" value="Save">
</form>
@endsection


