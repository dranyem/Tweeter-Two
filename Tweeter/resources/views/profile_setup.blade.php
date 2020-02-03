profile setup

<form action="/profile/setup" method="post">
    @csrf
<input type="hidden" name="userId" value="{{Auth::user()->id}}">
    <label for="firstName">First Name </label>
    <input type="text" name="firstName" placeholder="First name">
    @error('firstName')
        <span>{{$message}}</span>
    @enderror
    <br>
    <label for="lastName">Last Name </label>
    <input type="text" name="lastName" placeholder="Last name">
    @error('lastName')
        <span>{{$message}}</span>
    @enderror
    <br>
    <label for="bio">Bio </label>
    <textarea name="bio" placeholder="Write something about yourself"></textarea>
    @error('bio')
        <span>{{$message}}</span>
    @enderror
    <br>
    <label for="birthdate">Birthdate </label>
    <input type="date" name="birthDate">
    @error('birthDate')
        <span>{{$message}}</span>
    @enderror
    <br>

    <input type="submit" value="Save Profile">

</form>
