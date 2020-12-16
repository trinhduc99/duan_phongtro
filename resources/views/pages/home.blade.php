<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="description" content="tim phong tr">
  <meta name="keywords" content="tim phong tro">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}"/>
  <title>@yield('title_profile')</title>
  <link rel="stylesheet" href="{{asset('profile/stylesheets/toastr.min.css')}}">
  <link rel="stylesheet" href="{{asset('profile/stylesheets/sweetalert2.min.css')}}">
  <link rel="stylesheet" href="{{asset('profile/stylesheets/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('profile/stylesheets/dropzone.min.css')}}">
  <link rel="stylesheet" href="{{asset('profile/dashboard_resource/css/reset.min.css')}}">
  <link rel="stylesheet" href="{{asset('profile/dashboard_resource/css/main.css')}}">
  <link rel="stylesheet" href="{{asset('profile/dashboard_resource/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('profile/dashboard_resource/css/phongtro.dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('profile/dashboard_resource/css/phongtro.dashboard.responsive.css')}}">
  @yield('css_profile')
</head>
<body class="dashboard">
<div id="webpage">
  @include('partials_profile.header')

  <div class="container-fluid">
    <div class="row">
      <nav class="col-lg-2 d-none d-lg-block bg-light sidebar">
        @include('partials_profile.user_info')
        @include('partials_profile.slidebar')
      </nav>
      <main role="main" class="ml-sm-auto col-lg-10">
        @include('partials_profile.user_info_mobile')
        @yield('breadcrumb_profile')
        @yield('contents_profile')
        @include('partials_profile.support_box')
        @include('partials_profile.footer')
      </main>
    </div>
  </div>
  @include('partials_profile.bottom_bar')
</div>
@include('partials_profile.mobile_panel')
<script src="{{asset('profile/js/main-dashboard.min.js')}}"></script>
<script src="{{asset('profile/js/google_map.js')}}"></script>
<script src="{{asset('profile/js/phongtro123.post.js')}}"></script>
<script src="{{asset('profile/js/3rd/feather.min.js')}}"></script>
<script src="{{asset('profile/js/main.js')}}"></script>
@yield('js_profile')
</body>
</html>
