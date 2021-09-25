<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>About</title>

        <!-- Bootstrap CSS + Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>
    <body class="antialiased">
        <nav class="navbar navbar-expand-md navbar-light pt-3 pb-3 mb-5 shadow">
            <div class="container-xxl">
                <!-- navbar brand/title -->
                <a href="" class="navbar-brand">
                    <span class="text-primary fw-bold">Genshin Impact Wiki</span>
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
                                <a href="" class="nav-link">Characters</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">About</a>
                            </li>
                        </ul>
                    </div>
                    <div class="navbar-nav">
                        <ul class="navbar-nav">
                            <!-- if user is not logged in, show login/register -->
                            <li class="nav-item">
                                <a href="" class="nav-link">Login</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">Register</a>
                            </li>
                            <!-- if user is logged in, show user/profile link -->
                            <li class="nav-item">
                                <a href="" class="nav-link">Username</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10 border m-2 pb-3">
                    <h1>{{$title}}</h1>
                    <p>{{$aboutWebsiteText}}</p>
                    <p>{{$infoAboutWebsite}}</p>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>
