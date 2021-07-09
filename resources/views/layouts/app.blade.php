<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'vintagemotors') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js rel="stylesheet">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm d-flex justify-content-between">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset("images/vintagemotors.png") }}" class="logo" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <a class="nav-link" href="{{ route('articles.index') }}">Catalogue</a>
                        <a class="nav-link" href="{{ route('gammes.index') }}">Gammes</a>
                        <a class="nav-link" href="{{ route('promotion.index') }}">Promotions</a>
                        <a class="nav-link" href="{{ route('articles.classement')}}"> Classement des mieux notées</a>
                        <a class="nav-link" href="{{ route('admin')}}">Administration</a>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre></a>
                            <div class="dropdown-menu dropdown-menu-right px-5 justify-content-center" aria-labelledby="navbarDropdown">
                                <a href="{{ route('adminarticle') }}" class="mx-3 text-reset">Gestion des articles</a>
                                <a href="{{ route('adminpromo') }}" class="mx-3 text-reset">Gestion des promotions</a>
                                <a href="{{ route('admingammes') }}" class="mx-3 text-reset">Gestion des gammes</a>
                                <a href="{{ route('adminclient') }}" class="mx-3 text-reset">Gestion des clients</a>
                            </div>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Créer mon compte') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->prenom }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right px-5 justify-content-start" aria-labelledby="navbarDropdown">

                                <a class="nav-link" href="{{ route('compte') }}">Mon compte</a>
                                <a href="{{ route('editaccount') }}" class="mx-3 text-reset">Modifier mes informations</a><br>
                                <a href="{{ route('adresse.edit') }}" class="mx-3 text-reset">Modifier mes adresses</a></br>
                                <a href="{{ route('editpassword') }}" class="mx-3 text-reset"> Modifier le mot de passe</a><br>
                                <a href="{{ route('favoris.index') }}" class="mx-3 text-reset"> Mes favoris</a><br>
                                <a class="nav-link" href="{{ route('panier.show') }}">Panier</a>
                                <a class="nav-link" href="{{ route('commande.index') }}">Mes commandes</a><br>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Se déconnecter') }}
                                </a>

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
        <main class="py-4 p-5">
            <div class="container-fluid text-center">
                @if(session()->has('message'))
                <p class="alert alert-success">{{ session()->get('message') }}</p>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            @yield('content')
        </main>
    </div>
</body>
<footer class="bg-light text-center text-lg-start mt-5">
    <div class="text-center p-3" style="background-color: white;">
        <h6 class="text-dark">© 2021 Copyright: VintageMotors By DIAFAT Lyamin</h6>
        <ul>
            <li class="text-primary d-inline mx-1"><i class="fab fa-facebook-square fa-3x"></i></li>
            <li class="text-primary d-inline mx-1"><i class="fab fa-twitter-square fa-3x"></i></li>
            <li class="text-warning d-inline mx-1"><i class="fab fa-github fa-3x"></i></li>
            <li class="text-danger d-inline mx-1"><i class="fab fa-youtube fa-3x"></i></li>
        </ul>
    </div>
</footer>

</html>