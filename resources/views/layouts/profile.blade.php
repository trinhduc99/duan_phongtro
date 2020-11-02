<!doctype html>
<html class="fixed" lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title_profile')</title>
    <meta name="keywords" content="HTML5 Admin Template"/>
    <meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
    <meta name="author" content="JSOFT.net">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
          rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('profile/vendor/bootstrap/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('profile/vendor/font-awesome/css/font-awesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('profile/stylesheets/theme.css')}}"/>
    <link rel="stylesheet" href="{{asset('profile/stylesheets/skins/default.css')}}"/>
@yield('css_profile')
</head>
<body>
<section class="body">
    @include('partials_profile.header')
    <div class="inner-wrapper">
        @include('partials_profile.sidebar_left')
        @yield('contents_profile')
    </div>


</section>
<script src="{{asset('profile/vendor/jquery/jquery.js')}}"></script>
<script src="{{asset('profile/vendor/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('profile/vendor/nanoscroller/nanoscroller.js')}}"></script>
<script src="{{asset('profile/vendor/modernizr/modernizr.js')}}"></script>
<script src="{{asset('profile/javascripts/theme.js')}}"></script>
<script src="{{asset('profile/javascripts/theme.custom.js')}}"></script>
<script src="{{asset('profile/javascripts/theme.init.js')}}"></script>
@yield('js_profile')
</body>
</html>
