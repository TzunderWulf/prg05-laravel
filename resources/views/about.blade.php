<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>About</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS + Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>
    <body class="antialiased">
        <nav class="navbar">
            <div class="navbar-block">
                <div class="nav-item"><a href="/">Homepage</a></div>
                <div class="nav-item"><a href="/genshin-characters">Characters</a></div>
                <div class="nav-item"><a href="/about">About</a></div>
            </div>
            <div class="navbar-block user-related-nav">
{{--                if not logged in show, login and register button, else show  user profile --}}
                <div class="nav-item"><a href="/login">Login</a></div>
                <div class="nav-item"><a href="/register">Register</a></div>
            </div>
        </nav>
        <div class="content">
            <main>
               <h1>{{$title}}</h1>
               <p>{{$aboutWebsiteText}}</p>
               <p>{{$infoAboutWebsite}}</p>
            </main>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>
