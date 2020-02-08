@extends('layouts.app')

@section('content')
<form action="/profile/edit" method="post">
    @csrf
    <h1>Profile Edit</h1>
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
    <textarea name="bio" placeholder="Write something about yourself here" cols="100" rows="10">{{$profile->bio}}</textarea>
    @error('bio')
        <i>{{$message}}</i>
    @enderror
    <br>

    <h1>User Information Edit</h1>



    <input type="submit" value="Save">
</form>
@endsection


