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
    <link rel="stylesheet" href="{{ url('app.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="auth-bg">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm auth-bg__accent">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @can('view-patients')
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-light" href="{{ route('patients.index') }}">{{
                                __('Pacientes') }}</a>
                        </li>
                    </ul>
                    @endcan
                    @can('view-dates')
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-light" href="{{ route('dates.index') }}">{{ __('Citas')
                                }}</a>
                        </li>
                    </ul>
                    @endcan
                    @can('view-treatments')
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-light" href="{{ route('treatments.index') }}">{{
                                __('Tratamientos') }}</a>
                        </li>
                    </ul>
                    @endcan
                    @can('view-diseases')
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-light" href="{{ route('diseases.index') }}">{{
                                __('Enfermedades') }}</a>
                        </li>
                    </ul>
                    @endcan
                    @can('view-allergies')
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-light" href="{{ route('allergies.index') }}">{{
                                __('Alergias') }}</a>
                        </li>
                    </ul>
                    @endcan
                    @can('view-users')
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-light" href="{{ route('users.index') }}">{{ __('Usuarios')
                                }}</a>
                        </li>
                    </ul>
                    @endcan
                    @can('view-roles')
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-light" href="{{ route('roles.index') }}">{{ __('Roles')
                                }}</a>
                        </li>
                    </ul>
                    @endcan
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto auth-bg__accent">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item auth-bg__accent">
                            <a class="nav-link fw-bold text-light auth-bg__accent" href="{{ route('login') }}">{{
                                __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-light auth-bg__accent" href="{{ route('register') }}">{{
                                __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown auth-bg__accent">
                            <a id="navbarDropdown" class="nav-link fw-bold text-light dropdown-toggle" href="#"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end auth-bg__accent"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item fw-bold text-light auth-bg__accent" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar Sesión') }}
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
