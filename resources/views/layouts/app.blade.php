<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | Games Collection</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="{{ route('games-collection.index') }}">Dashboard</a>
        <!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <ul class="app-menu">
            <li><a class="app-menu__item {{ str_contains(\Request::route()->getName(), 'games-collection') ? 'active' : '' }}"
                    href="{{ route('games-collection.index') }}"><i class="app-menu__icon"></i><span
                        class="app-menu__label">Games Collections</span></a></li>
            <li><a class="app-menu__item {{ str_contains(\Request::route()->getName(), 'console') ? 'active' : '' }}"
                    href="{{ route('console.index') }}"><i class="app-menu__icon"></i><span
                        class="app-menu__label">Consoles</span></a></li>
            <li><a class="app-menu__item {{ str_contains(\Request::route()->getName(), 'publisher') ? 'active' : '' }}"
                    href="{{ route('publisher.index') }}"><i class="app-menu__icon"></i><span
                        class="app-menu__label">Publishers</span></a></li>
            <li><a class="app-menu__item {{ str_contains(\Request::route()->getName(), 'developer') ? 'active' : '' }}"
                    href="{{ route('developer.index') }}"><i class="app-menu__icon"></i><span
                        class="app-menu__label">Developers</span></a></li>
            <li><a class="app-menu__item {{ str_contains(\Request::route()->getName(), 'language') ? 'active' : '' }}"
                    href="{{ route('language.index') }}"><i class="app-menu__icon"></i><span
                        class="app-menu__label">Languages</span></a></li>
            <li><a class="app-menu__item {{ str_contains(\Request::route()->getName(), 'fsk') ? 'active' : '' }}"
                    href="{{ route('fsk.index') }}"><i class="app-menu__icon"></i><span
                        class="app-menu__label">FSKs</span></a></li>
        </ul>
    </aside>
    <main class="app-content">
        @yield('content')
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @stack('scripts')
</body>

</html>
