<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Inosoft-Test') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="sidebar">
                <ul>
                    <li style="@if (Request::segment(1)=='store') background:#c31f87 @endif">
                        <a href="{{ route('store') }}">
                            <i class="fa fa-shopping-cart"></i>
                            <span style="padding-left: 10px"> Store
                        </a>
                    </li>
                    <li style="@if (Request::segment(1)=='sales') background:#c31f87 @endif">
                        <a href="{{ route('sales') }}">
                            <i class="fa fa-user"></i>
                            <span style="padding-left: 10px"> Sales
                        </a>
                    </li>
                    <li style="@if (Request::segment(1)=='schedule') background:#c31f87 @endif">
                        <a href="{{ route("schedule") }}">
                            <i class="fa fa-calendar-check-o"></i>
                            <span style="padding-left: 10px"> Schedule
                        </a>
                    </li>
                </ul>

            </div>
        </nav>

        <main class="main-content">
            @yield('content')
        </main>
    </div>
</body>
</html>
