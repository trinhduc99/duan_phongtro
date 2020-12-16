<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="tim phong tr">
    <meta name="keywords" content="tim phong tro">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>@yield('title_profile')</title>
    <link rel="stylesheet" href="{{asset('Admin/dist/css/phongtro.dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/bower_components/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/dist/css/skins/skin-blue.min.css')}}">
    @yield('css_profile')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('partials_profile.header')
    @include('partials_profile.slidebar')
    <div class="content-wrapper">
        @yield('contents_profile')
    </div>
    @include('partials_profile.footer')
</div>
<script src="{{asset('Admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('Admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('Admin/dist/js/adminlte.min.js')}}"></script>
@yield('js_profile')
</body>
</html>
