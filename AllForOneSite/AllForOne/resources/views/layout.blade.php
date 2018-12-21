<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Project</title>

    <link rel="apple-touch-icon" href="{{ asset('assets/images/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('global/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('global/css/bootstrap-extend.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/site.min.css')}}">
    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('global/vendor/animsition/animsition.css')}}">
    <link rel="stylesheet" href="{{ asset('global/vendor/asscrollable/asScrollable.css')}}">
    <link rel="stylesheet" href="{{ asset('global/vendor/switchery/switchery.css')}}">
    <link rel="stylesheet" href="{{ asset('global/vendor/intro-js/introjs.css')}}">
    <link rel="stylesheet" href="{{ asset('global/vendor/slidepanel/slidePanel.css')}}">
    <link rel="stylesheet" href="{{ asset('global/vendor/flag-icon-css/flag-icon.css')}}">
    <link rel="stylesheet" href="{{ asset('global/vendor/waves/waves.css')}}">
    

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('global/fonts/glyphicons/glyphicons.css')}}">
    <link rel="stylesheet" href="{{ asset('global/fonts/material-design/material-design.min.css')}}">
    <link rel="stylesheet" href="{{ asset('global/fonts/brand-icons/brand-icons.min.css')}}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet"/>
    <link href="{{ asset('css/multiselect.css') }}" rel="stylesheet">


@yield('css')

<!--[if lt IE 9]>
    {{--<script src="{{ asset('global/vendor/html5shiv/html5shiv.min.js')}}"></script>--}}
{{--<![endif]-->--}}
{{--<!--[if lt IE 10]>--}}
{{--<script src="{{ asset('global/vendor/media-match/media.match.min.js')}}"></script>--}}
{{--<script src="{{ asset('global/vendor/respond/respond.min.js')}}"></script>--}}
{{--<![endif]-->--}}
        <!-- Scripts -->
    <script src="{{ asset('global/vendor/modernizr/modernizr.js')}}"></script>
    <script src="{{ asset('global/vendor/breakpoints/breakpoints.js')}}"></script>
    <script>
        Breakpoints();
    </script>
</head>
<body class="site-navbar-small padding-top-0">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<nav id="app" class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse"
     role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
                data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
                data-toggle="collapse">
            <i class="icon md-more" aria-hidden="true"></i>
        </button>
        <a class="navbar-brand navbar-brand-center" href="{{asset('home')}}">
            <img class="navbar-brand-logo navbar-brand-logo-normal" src="{{ asset('assets/images/logo.png')}}"
                 title="Remark">
            <img class="navbar-brand-logo navbar-brand-logo-special" src="{{ asset('assets/images/logo-blue.png')}}"
                 title="Remark">
            <span class="navbar-brand-text"> AllForOne</span>
        </a>
        <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search"
                data-toggle="collapse">
            <span class="sr-only">Toggle Search</span>
            <i class="icon md-search" aria-hidden="true"></i>
        </button>
    </div>
    <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <!-- Navbar Toolbar Right -->
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">

                <li class="nav-item dropdown">
                    <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
                       data-animation="scale-up" role="button">
                        <i class="icon md-notifications" aria-hidden="true"></i>
                    </a>
                    <notifications></notifications>
                </li>
            </ul>
            <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->
        <!-- Site Navbar Seach -->
        <div class="collapse navbar-search-overlap" id="site-navbar-search">
            <form role="search">
                <div class="form-group">
                    <div class="input-search">
                        <i class="input-search-icon md-search" aria-hidden="true"></i>
                        <input type="text" class="form-control" name="site-search" placeholder="Search...">
                        <button type="button" class="input-search-close icon md-close" data-target="#site-navbar-search"
                                data-toggle="collapse" aria-label="Close"></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Site Navbar Seach -->
    </div>
</nav>

<div id="app" class="page animsition padding-top-80">
    @yield('content')
</div>
<!-- Footer -->
<footer class="site-footer">
    <div class="site-footer-legal">© 2018 <a
                href="#">Students</a></div>
    <div class="site-footer-right">
        Crafted with <i class="red-600 icon md-favorite"></i> by <a href="#">amazingSurge</a>
    </div>
</footer>
<!-- Core  -->
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ asset('global/vendor/jquery/jquery.js')}}"></script>
<script src="{{ asset('global/vendor/bootstrap/bootstrap.js')}}"></script>
<script src="{{ asset('global/vendor/animsition/animsition.js')}}"></script>
<script src="{{ asset('global/vendor/asscroll/jquery-asScroll.js')}}"></script>
<script src="{{ asset('global/vendor/mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{ asset('global/vendor/asscrollable/jquery.asScrollable.all.js')}}"></script>
<script src="{{ asset('global/vendor/ashoverscroll/jquery-asHoverScroll.js')}}"></script>
<script src="{{ asset('global/vendor/waves/waves.js')}}"></script>
<!-- Plugins -->
<script src="{{ asset('global/vendor/switchery/switchery.min.js')}}"></script>
<script src="{{ asset('global/vendor/intro-js/intro.js')}}"></script>
<script src="{{ asset('global/vendor/screenfull/screenfull.js')}}"></script>
<script src="{{ asset('global/vendor/slidepanel/jquery-slidePanel.js')}}"></script>
<!-- Scripts -->
<script src="{{ asset('global/js/core.js')}}"></script>
<script src="{{ asset('assets/js/site.js')}}"></script>
<script src="{{ asset('assets/js/sections/menu.js')}}"></script>
<script src="{{ asset('assets/js/sections/menubar.js')}}"></script>
<script src="{{ asset('assets/js/sections/sidebar.js')}}"></script>
<script src="{{ asset('global/js/configs/config-colors.js')}}"></script>
<script src="{{ asset('assets/js/configs/config-tour.js')}}"></script>
<script src="{{ asset('global/js/components/asscrollable.js')}}"></script>
<script src="{{ asset('global/js/components/animsition.js')}}"></script>
<script src="{{ asset('global/js/components/slidepanel.js')}}"></script>
<script src="{{ asset('global/js/components/switchery.js')}}"></script>
<script src="{{ asset('global/js/components/tabs.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
<script src="{{ asset('js/myjs.js') }}"></script>
@yield('js')
<script>
    (function (document, window, $) {
        'use strict';
        var Site = window.Site;
        $(document).ready(function () {
            Site.run();
        });
    })(document, window, jQuery);
</script>
<style>
.bg-dark {
    color: #fff;
    background-color: #343a40;
}
.bg-dark:hover {
    color: #fff;
    background-color: #343a40;
}
</style>
</body>
</html>