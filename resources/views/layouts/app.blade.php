<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/63e1bb71b2.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #EADBC8">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    NARS Cosmetics
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <form action="{{ route('login') }}" method="get">
                                    <button type="submit" class="btn btn-link link-primary">Sign In</button>
                                </form>
                            @endif

                            @if (Route::has('register'))
                            <form action="{{ route('register') }}" method="get">
                                <button type="submit" class="btn btn-primary rounded-5">Sign Up</button>
                            </form>
                            @endif
                        @else

                            <li class="nav-item">
                                <a class="nav-link" href="/"> {{ __('Home') }}</i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index_product') }}"> {{ __('Products') }}</i></a>
                            </li>
                            @if (Auth::user()->is_admin == 0)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('show_cart') }}">Cart</i></a>
                                </li>

                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="order">Order</i></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa-solid fa-circle-user fa-lg"></i>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('show_profile') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('profile-form').submit();">
                                        <i class="fa-solid fa-circle-user fa-lg"></i>
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket fa-lg"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="profile-form" action="{{ route('show_profile') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
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
