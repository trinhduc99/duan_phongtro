<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title_be')</title>
    @include('partials_be.link_css')
    @yield('css_be')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('partials_be.header')
    @include('partials_be.slidebar')
    @yield('contents_be')
    @include('partials_be.footer')
</div>
@include('partials_be.link_js')
@yield('js_be')
</body>
</html>
