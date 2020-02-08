@extends('layouts.app')

@section('content')
<div class="card">
    <div class="content">
        <header class="card-header">
            <p class="card-header-title is-size-4">Profile Setup</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="/profile/setup" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                    <div class="field">
                        <p class="control has-icons-left">
                            <input  type="file" class="input @error('avatar') is-danger @enderror" name="avatar"autofocus>
                          <span class="icon is-small is-left">
                            <i class="fas fa-image"></i>
                          </span>
                        </p>
                        @error('avatar')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <p class="control has-icons-left">
                            <input type="text" placeholder="First Name" class="input @error('firstName') is-danger @enderror" name="firstName"autofocus>
                          <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                          </span>
                        </p>
                        @error('firstName')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <p class="control has-icons-left">
                            <input type="text" placeholder="Last Name" class="input @error('lastName') is-danger @enderror" name="lastName"autofocus>
                          <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                          </span>
                        </p>
                        @error('lastName')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <p class="control">
                            <textarea class="textarea @error('bio') is-danger @enderror" name="bio" placeholder="Write something about yourself here ..."></textarea>
                        </p>
                        @error('bio')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <p class="control has-icons-left">
                            <input type="text" placeholder="Location" class="input @error('location') is-danger @enderror" name="location"autofocus>
                          <span class="icon is-small is-left">
                            <i class="fas fa-map-marker"></i>
                          </span>
                        </p>
                        @error('firstName')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <p class="control has-icons-left">
                            <input type="date" class="input @error('birthDate') is-danger @enderror" name="birthDate"autofocus>
                          <span class="icon is-small is-left">
                            <i class="fas fa-calendar"></i>
                          </span>
                        </p>
                        @error('birthDate')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <p class="control">
                          <button class="button is-success" type="submit">
                            Save Profile
                          </button>
                        </p>
                      </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

