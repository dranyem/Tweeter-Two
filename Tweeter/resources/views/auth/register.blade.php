@extends('layouts.app')

@section('content')
<div class="card">
    <header class="card-header">
        <p class="card-header-title is-size-3">Register</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="field">
                    <p class="control has-icons-left has-icons-right">
                        <input id="email" type="text" placeholder="Username" class="input @error('username') is-danger @enderror" name="username"autofocus>
                      <span class="icon is-small is-left">
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
                      <span class="icon is-small is-left">
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
                  <span class="icon is-small is-left">
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
                  <span class="icon is-small is-left">
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






    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="name" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
