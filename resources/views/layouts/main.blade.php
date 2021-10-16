<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Genshin Impact Archive</title>

    <!-- JQuery Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>

    <!-- Bootstrap CSS, JS, Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    @yield('head-data')

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light pt-3 pb-3 px-3 mb-5 shadow">
    <div class="container-xxl">
        <!-- navbar brand/title -->
        <a href="/" class="navbar-brand">
            <span class="text-primary fw-bold">Genshin Impact Archive</span>
        </a>

        <!-- toggle button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav"
                aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- navbar links-->
        <div class="collapse navbar-collapse justify-content-lg-between align-content-center" id="main-nav">
            <div class="navbar-nav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ url('/characters') }}" class="nav-link">Characters</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/about') }}" class="nav-link">About</a>
                    </li>
                </ul>
            </div>
            <div class="navbar-nav pe-5">
                <ul class="navbar-nav">
                @if (Route::has('login'))
                    @auth
                        <!-- if user is not logged in, show login/register -->
                            <li class="nav-item">
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="profile"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('home') }}" class="dropdown-item">
                                                <i class="bi bi-person-circle"></i>  My profile</a>
                                        </li>
                                        @if(Auth::user()->role === 2)
                                            <li><a href="{{ route('admin-home') }}" class="dropdown-item">
                                                    <i class="bi bi-tools"></i>  Admin page</a>
                                            </li>
                                        @endif
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <i class="bi bi-box-arrow-left"></i> {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Login</a>
                            </li>
                            <!-- if user is logged in, show user/profile link -->
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
    @yield('content')
</body>
<script src="{{ asset('js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous">
</script>

