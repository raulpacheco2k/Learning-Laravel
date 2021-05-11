<!doctype html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Dashboard</title>
    <script src="https://unpkg.com/@tabler/core@latest/dist/js/tabler.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@latest/dist/css/tabler.min.css">
</head>
<body class="antialiased" data-new-gr-c-s-check-loaded="14.1009.0" data-gr-ext-installed="">
<div class="wrapper">
    <header class="navbar navbar-expand-md navbar-dark navbar-overlap d-print-none">
        <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                {{ config('app.name') }}
            </h1>
            <div class="navbar-nav flex-row order-md-last">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                       aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                        <div class="d-none d-xl-block ps-2">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="mt-1 small text-muted">{{ Auth::user()->email }}</div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <!--<a href="#" class="dropdown-item">Perfil &amp; conta</a>-->
                        <!--<a href="#" class="dropdown-item">Feedback</a>-->
                        <!--<div class="dropdown-divider"></div>-->
                        <!--<a href="#" class="dropdown-item">Configurações</a>-->
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <button type="submit" class="dropdown-item">Sair</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('base') }}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                           stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                           stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline
                                  points="5 12 3 12 12 3 21 12 19 12"></polyline><path
                                  d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path><path
                                  d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path></svg>
                    </span>
                                <span class="nav-link-title">
                      Home
                    </span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a style="outline:none" class="nav-link dropdown-toggle" href="#navbar-base"
                               data-bs-toggle="dropdown"
                               role="button" aria-expanded="false">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                           stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                           stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline
                                  points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline><line x1="12" y1="12"
                                                                                                        x2="20"
                                                                                                        y2="7.5"></line><line
                                  x1="12" y1="12" x2="12" y2="21"></line><line x1="12" y1="12" x2="4" y2="7.5"></line><line
                                  x1="16" y1="5.25" x2="8" y2="9.75"></line></svg>
                    </span>
                                <span class="nav-link-title">
                      Gestão
                    </span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="dropdown-menu-columns">
                                    <div class="dropdown-menu-column">
                                        <a class="dropdown-item" href="{{ route('produtos.index') }}">Produtos</a>
                                        <a class="dropdown-item" href="{{ route('marcas.index') }}">Marcas</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="page-wrapper">
        <div class="container-xl">
            <div class="page-header text-white d-print-none">
                @yield('submenu')
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    @yield('content')
                </div>
            </div>
        </div>

        <footer class="footer footer-transparent d-print-none">
            <div class="container">
                <div class="row text-center align-items-center flex-row-reverse">
                    <div class="col-lg-auto ms-lg-auto">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item">
                                <p target="_blank" class="link-secondary"
                                   rel="noopener">
                                    Make with
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="icon text-pink icon-filled icon-inline" width="24" height="24"
                                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path>
                                    </svg>
                                    by Raul Pacheco
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item">
                                Copyright © 2021
                                <a href="." class="link-secondary">Raul Pacheco</a>.
                                Todos os direitos reservados.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

    </div>

</div>
</body>
</html>