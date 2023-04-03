<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">            
                <div class="collapse navbar-collapse" id="barre">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ route('sauces') }}" class="nav-link">ALL SAUCES</a>
                        </li> 
                        <li class="nav-item">
                            <a href="{{ route('ajoutSauce') }}" class="nav-link">ADD SAUCE</a>
                        </li>  
                    </ul>

                    <!-- Center Side Of Navbar -->
                    <div id=avecLogo> 
                        <div id=logo>
                            <img src="https://svgsilh.com/svg/1293270.svg" alt="logo" width="100%" height="100%" >
                        </div>
                        
                        <div id=centre>
                            <h1>HOT TAKES</h1>
                            <h5>THE WEB'S BEST HOT SAUCE REVIEWS</h5>
                        </div>
                    </div>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav2">
                        <!-- Authentication Links -->
                        @guest

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('SIGN UP') }}</a>
                                </li>
                            @endif

                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                                </li>
                            @endif

                        @else
                            <section>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="nav-link" id="logout">
                                    {{ __('LOGOUT') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                </form>
                            <section>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
