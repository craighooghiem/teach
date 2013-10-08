<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>HardHat Hire</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="{{ URL::asset('css/normalize.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/fonts.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
        <script src="{{ URL::asset('js/vendor/modernizr-2.6.2.min.js') }}"></script>
    </head>
    <body>

    <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
           <a class="brand" href="../">Hard Hat Hire</a>
           <div class="nav-collapse collapse" id="main-menu">
            <ul class="nav" id="main-menu-left">
              <li><a href="{{ URL::to('jobs') }}">Jobs</a></li>
              <li><a href="{{ URL::to('profile') }}">Profile</a></li>
            </ul>
           </div>
        </div>
    </div>
    </div>

        <div id="wrapper">
            @if(Session::has('flash_notice'))
                <div id="flash_notice">{{ Session::get('flash_notice') }}</div>
            @endif

            @yield('content')
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="{{ URL::asset('js/plugins.js') }}"></script>
        <script src="{{ URL::asset('js/main.js') }}"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
