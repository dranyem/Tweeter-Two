@extends('layouts.app')

@section('content')
<div class="columns">
    <div class="column"></div>
    <div class="column is-half">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title is-size-3  has-text-primary">Register</p>
            </header>
            <div class="card-content">
                <div class="content">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input id="email" type="text" placeholder="Username" class="input @error('username') is-danger @enderror" name="username"autofocus>
                              <span class="icon  has-text-primary is-small is-left">
                                <i class="fas fa-user"></i>
                              </span>
                            </p>
                            @error('username')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input id="email" type="text" placeholder="Email" class="input @error('email') is-danger @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                              <span class="icon  has-text-primary is-small is-left">
                                <i class="fas fa-envelope"></i>
                              </span>
                            </p>
                            @error('email')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror

                        </div>
                      <div class="field">
                        <p class="control has-icons-left">
                            <input id="password" type="password" placeholder="Password" class="input @error('password') is-danger @enderror" name="password" autocomplete="current-password">
                          <span class="icon  has-text-primary is-small is-left">
                            <i class="fas fa-lock"></i>
                          </span>
                        </p>
                        @error('password')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                      </div>

                      <div class="field">
                        <p class="control has-icons-left">
                            <input id="password-confirm" placeholder="Confirm Password" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
                          <span class="icon  has-text-primary is-small is-left">
                            <i class="fas fa-lock"></i>
                          </span>
                        </p>
                        @error('password_confirmation')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                      </div>
                      <div class="field">
                        <p class="control">
                          <button class="button is-success" type="submit">
                            Register
                          </button>
                        </p>
                      </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    <div class="column"></div>
</div>
@endsection
