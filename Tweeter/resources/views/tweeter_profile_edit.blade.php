@extends('layouts.app')

@section('content')
<div class="card">
    <div class="content">
        <header class="card-header">
            <p class="card-header-title title has-text-primary is-size-4">Edit User and Profile Information</p>
        </header>
        <div class="card-content">
            <h1 class="subtitle has-text-primary is-size-5">Account Information  </h1>
            <form action="/user/edit" method="post">
                @csrf
                <input type="hidden" name="userId" value="{{$profile->user_id}}">
                <div class="columns is-vcentered">
                    <div class="field column">
                        <p class="is-size-7 has-text-primary">Username :</p>
                        <p class="control has-icons-left has-icons-right">
                            <input id="email" type="text" placeholder="Username" class="input @error('username') is-danger @enderror" name="username" value="{{$profile->users->username}}" required>
                        <span class="icon  has-text-primary is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                        </p>
                        @error('username')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field column">
                        <p class="is-size-7 has-text-primary">Email : </p>
                        <p class="control has-icons-left has-icons-right">
                            <input id="email" type="text" placeholder="Email" class="input @error('email') is-danger @enderror" name="email" value="{{$profile->users->email}}" required>
                        <span class="icon   has-text-primary is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        </p>
                        @error('email')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field column">
                        <p class="is-size-7 has-text-primary">Password : </p>
                        <p class="control has-icons-left">
                            <input id="password" type="password" placeholder="Password" class="input @error('password') is-danger @enderror" name="password">
                        <span class="icon  has-text-primary is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                        </p>
                        @error('password')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field column">
                         <button class="button is-success" type="submit">
                            <span class="icon is-small">
                                <i class="fas fa-save"></i>
                            </span>
                            <span>Save</span>
                        </button>
                    </div>
                    </div>
                </form>

                <a href="/user/delete?id={{Auth::user()->id}}">
                    <button class="button is-danger">
                    <span class="icon is-small">
                        <i class="fas fa-trash"></i>
                    </span>
                    <span>Delete Account</span>
                </button>
                </a>

                <h1 class="subtitle has-text-primary is-size-5">Profile Information  </h1>
                <form action="/profile/edit" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$profile->id}}">
                    <div class="columns">
                        <div class="column">
                            <div class="field level">
                                <p class="is-size-6 has-text-primary level-item">First Name :</p>
                                <p class="control has-icons-left level-item">
                                    <input type="text" placeholder="First Name" class="input @error('firstname') is-danger @enderror" name="firstname" value="{{$profile->firstname}}" >
                                  <span class="icon  has-text-primary is-small is-left">
                                    <i class="fas fa-user"></i>
                                  </span>
                                </p>
                                @error('firstname')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="field level">
                                <p class="is-size-6 has-text-primary level-item">Last Name :</p>
                                <p class="control has-icons-left level-item">
                                    <input type="text" placeholder="Last Name" class="input @error('lastname') is-danger @enderror" name="lastname" value="{{$profile->lastname}}">
                                  <span class="icon  has-text-primary is-small is-left">
                                    <i class="fas fa-user"></i>
                                  </span>
                                </p>
                                @error('lastname')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="field level">
                                <p class="is-size-6 has-text-primary level-item">Location :</p>
                                <p class="control has-icons-left level-item">
                                <input type="text" placeholder="Location" class="input @error('location') is-danger @enderror" name="location" value="{{$profile->location}}">
                                  <span class="icon  has-text-primary is-small is-left">
                                    <i class="fas fa-map-marker"></i>
                                  </span>
                                </p>
                                @error('location')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="field level">
                                <p class="is-size-6 has-text-primary level-item">Birthdate :</p>
                                <p class="control has-icons-left level-item">
                                    <input type="date" class="input @error('birthDate') is-danger @enderror" value="{{$profile->birthdate}}"name="birthDate">
                                  <span class="icon  has-text-primary is-small is-left">
                                    <i class="fas fa-calendar"></i>
                                  </span>
                                </p>
                                @error('birthDate')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="column">
                            <div class="field level">
                                <p class="is-size-6 has-text-primary level-item">Avatar :</p>
                                <p class="control has-icons-left level-item">
                                    <input  type="file" class="input @error('avatar') is-danger @enderror" name="avatar">
                                  <span class="icon  has-text-primary is-small is-left">
                                    <i class="fas fa-image"></i>
                                  </span>
                                </p>
                                @error('avatar')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="field">
                                <p class="is-size-6 has-text-primary">Bio :</p>
                                <p class="control">
                                    <textarea class="textarea @error('bio') is-danger @enderror" name="bio" placeholder="Write something about yourself here ...">{{$profile->bio}}</textarea>
                                </p>
                                @error('bio')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
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
                        </div>
                    </div>
 </div>

        </div>
    </div>
</div>
@endsection


