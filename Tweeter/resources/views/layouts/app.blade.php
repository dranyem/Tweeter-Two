<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tweeter</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.0/css/bulma.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        {{-- <Root> --}}
        <section class="hero is-primary is-fullheight">
            <!-- Hero head: will stick at the top -->
            <div class="hero-head">
                <nav class="navbar">
                  <div class="container">
                    <div class="navbar-brand">
                      <a class="navbar-item  has-text-white title is-size-2" href="/home">
                          <span class="icon is-large has-text-white">
                              <i class="fab fa-earlybirds"></i>
                            </span>
                          <span>Tweeter</span>
                      </a>

                      <span class="navbar-burger burger is-large" data-target="navbarMenuHeroA">
                        <span></span>
                        <span></span>
                        <span></span>
                      </span>
                    </div>
                    <div id="navbarMenuHeroA" class="navbar-menu">
                      <div class="navbar-end">
                        @guest
                            <a class="navbar-item has-text-white is-size-4" href="{{ route('login') }}">
                              <span class="icon is-medium">
                                  <i class="fas fa-sign-in-alt"></i>
                              </span>
                              <span>{{ __('Login') }}</span>
                          </a>
                        @if (Route::has('register'))
                                <a class="navbar-item has-text-white is-size-4" href="{{ route('register') }}">
                                  <span class="icon is-medium">
                                      <i class="fas fa-user-plus"></i>
                                  </span>
                                  <span>{{ __('Register') }}</span>
                                  </a>
                        @endif
                    @else
                          <a class="navbar-item has-text-white is-size-4" href="{{ route('home') }}">
                              <span class="icon is-medium">
                                  <i class="fas fa-home"></i>
                              </span>
                              <span>Home</span>
                          </a>
                          <a class="navbar-item has-text-white is-size-4" href="/profile/view/{{Auth::user()->id}}">
                              <span class="icon is-medium">
                                  <i class="fas fa-portrait"></i>
                              </span>
                              <span>Profile</span>
                          </a>
                          <a class="navbar-item has-text-white is-size-4" href="/follows">
                              <span class="icon is-medium">
                                  <i class="fas fa-users"></i>
                              </span>
                              <span>Follows</span>
                          </a>
                          <a class="navbar-item has-text-white is-size-4" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                           <span class="icon is-medium">
                                              <i class="fas fa-sign-out-alt"></i>
                                          </span>
                              {{ __('Logout') }}
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                    @endguest

                      </div>
                    </div>
                  </div>
                </nav>
              </div>
            <!-- Hero content: will be in the middle -->
            <div class="hero-body">
            <div class="container">
                @if (session('messageSuccess'))
                    <article class="message is-success">
                        <div class="message-header">
                        <p>Success</p>
                        </div>
                        <div class="message-body">
                        {{session('messageSuccess')}}
                        </div>
                    </article>
                @endif

                @if (session('messageError'))
                    <article class="message is-danger">
                        <div class="message-header">
                        <p>Error</p>
                        </div>
                        <div class="message-body">
                        {{session('messageError')}}
                        </div>
                    </article>
                @endif
                    @yield('content')
            </div>
            </div>

            <!-- Hero footer: will stick at the bottom -->
            <div class="hero-foot">
            <nav class="tabs">
                <div class="container">

                </div>
            </nav>
            </div>
        </section>
    </div>
    {{-- </Root> --}}

     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" ></script>
</body>
</html>
