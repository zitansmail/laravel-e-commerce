<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <style>
    .image {
            background-image: url('images/light.png');
            background: rgb(red, green, blue,0.4);
            background-position: center;
            background-size: cover;
            width: 100%;
            height: 500px;
}
    </style>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!-- Styles -->
    @yield('extra-css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header class="bg-white">
            <div class="container ">
                <div class="row">
                    <div class="col-md-6 lg:text-left sm:text-center">
                        <a href="" class="mr-2"><i class="fas fa-envelope-open our-color"></i>
                        <span class="text-sm ml-2">zitansmil@gmail.com</span></a>
                        <a href="" class="mr-2"><i class="fas fa-phone our-color"></i>
                        <span class="text-sm ml-2">+47890930482</span></a>
                    </div>
                    <div class="col-md-6 lg:text-right  sm:text-center">
                        <a href="#" class="mr-2 ml-2"><i class="fab fa-facebook fa-sm"></i></a>
                        <a href="#" class="mr-2 ml-2"><i class="fab fa-twitter fa-sm"></i></a>
                        <a href="#" class="mr-2 ml-2"><i class="fab fa-youtube fa-sm"></i></a>
                        <a href="#" class="mr-2 ml-2"><i class="fab fa-google fa-sm"></i></a>
                    </div>
                </div>
            </div>
        </header>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-none">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <a href="#" class="my-class">Home</a>
                        <a href="{{ route('shop.index') }}" class="my-class">Products</a>
                        <a href="#" class="my-class">About</a>
                        <a href="#" class="my-class">Contact</a>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item flex ml-4">
                                <a href="" class=""><i class="fa fa-search fa-lg"></i></a>
                                <a class="ml-4" href="{{ route('login') }}"><i class="fas fa-sign-in-alt fa-lg"></i></a>
                                <a href="{{ route('cart.index') }}" class="ml-4"><i class="fas fa-shopping-cart fa-lg"></i></a>
                                <span class="bg-orange-1000 px-2 text-white rounded-full ml-2">{{ Cart::count() }}</span>
                                <a class="ml-4" href="{{ route('register') }}"><i class="fas fa-register fa-lg"></i></a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
        <div class="bg-white ">
            <div class="container">
                <our-footer/>
            </div>
        </div>
    </div>
    @yield('extra-js')
</body>
</html>
