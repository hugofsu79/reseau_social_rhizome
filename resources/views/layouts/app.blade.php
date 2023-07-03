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

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

    <!-- Typographie -->
    <link rel="stylesheet" href="https://use.typekit.net/lvh6izs.css">

    <!-- Icone -->
    <script src="https://kit.fontawesome.com/1dd6859436.js" crossorigin="anonymous"></script>

</head>

<body class="pt-5">
    <header>
        <nav class="navbar navbar-expand-md navbar-light shadow-sm fixed-top">
            <div class="container">
                <div class="row">
                    {{-- logo_rhizome --}}
                    <div class="col">
                        <div class="row">

                            <div class="col">
                                <a class="navbar-brand" href="{{ url('/') }}">
                                    <img class="w-50" src="{{ asset('./visual/logo_rhizome.png') }}"
                                        alt="logo_rhizome">
                                </a>
                            </div>

                            <div class="col">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->pseudo }}
                                    </a>

                                    {{-- dropdown connexion/ déco, mon compte --}}
                                    <div class="collapse_co_deco dropdown-menu dropdown-menu-end text-center"
                                        aria-labelledby="navbarDropdown">

                                        <a href="{{ route('users.edit', $user = Auth::user()) }}">Mon compte</a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            {{ __('Déconnexion') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>

                                </li>
                            @endguest
                    </ul>
                    <form action="{{ route('search') }}" method="GET">@csrf
                        <input required class="recherche rounded-pill p-2" type="text" name="search"
                            placeholder="Recherche">
                        <button class="recherche_buttom rounded-pill" type="submit"><i
                                class="fa-solid fa-magnifying-glass" style="color: #FCFFDF;"></i></button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <main>

        <div class="container-fluid text-center mt-5">
            @if (session()->has('message'))
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

    <!-- ajouter un footer -->



</body>
<footer class="text-center">
    <p> RHIZOME 2023 - codé dans la mezzanine de la médiathèque à Niort</p>

</footer>

</html>
