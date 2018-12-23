<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @yield('pageAssets')
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="apple-touch-icon" href="{{ asset('assets/images/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('global/vendor/animsition/animsition.css')}}">
    <link rel="stylesheet" href="{{ asset('global/vendor/asscrollable/asScrollable.css')}}">
    <link rel="stylesheet" href="{{ asset('global/vendor/switchery/switchery.css')}}">
    <link rel="stylesheet" href="{{ asset('global/vendor/intro-js/introjs.css')}}">
    <link rel="stylesheet" href="{{ asset('global/vendor/slidepanel/slidePanel.css')}}">
    <link rel="stylesheet" href="{{ asset('global/vendor/flag-icon-css/flag-icon.css')}}">
    <link rel="stylesheet" href="{{ asset('global/vendor/waves/waves.css')}}">
    <!-- Stylesheets -->
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('global/fonts/glyphicons/glyphicons.css')}}">
    <link rel="stylesheet" href="{{ asset('global/fonts/material-design/material-design.min.css')}}">
    <link rel="stylesheet" href="{{ asset('global/fonts/brand-icons/brand-icons.min.css')}}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet"/>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/multiselect.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-fixed-top sticky-top">
            @if (Auth::guest())
                <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }} </a>
            @else
                <a class="navbar-brand" href="{{ url('/home') }}">{{ config('app.name') }} </a>
            @endif
            <button class="navbar-toggler btn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            @if (Auth::guest())

                @else
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Events
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/allevents') }}">All Events</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('/myevents') }}">MY events</a>
                            <a class="dropdown-item" href="{{ url('/myEntries') }}">My entry's</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/myRating') }}">Ratings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Notification</a>
                    </li>
                    @if(Auth::user()->admin == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="#">Admin</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                    </li>
                </ul>
                @endif
                <ul class="navbar-nav">
                    @if (Auth::guest())
                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu bg-dark" role="menu">
                                <li>
                                    <a class="nav-link" href="">
                                        My acount
                                    </a>
                                    <a class="nav-link" href="{{ url('/logout') }}">
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>