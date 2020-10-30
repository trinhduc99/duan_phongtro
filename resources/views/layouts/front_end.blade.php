<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title_fe')
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('front_end/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front_end/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front_end/css/elegant-icons.css')}}" type="text/css">
{{--    <link rel="stylesheet" href="{{asset('front_end/css/nice-select.css')}}" type="text/css">--}}
    <link rel="stylesheet" href="{{asset('front_end/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front_end/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front_end/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front_end/css/style.css')}}" type="text/css">
    @yield('css_fe')
</head>

<body>
{{--@include('partials_fe.preloader')--}}

<!-- Humberger Begin -->
@include('partials_fe.humberger_menu')
<!-- Humberger End -->

<!-- Header Section Begin -->
@include('partials_fe.header')
<!-- Header Section End -->
<!-- Hero Section Begin -->
@include('partials_fe.hero')
<!-- Hero Section End -->

<!-- Categories Section Begin -->
{{--@include('partials_fe.categories')--}}
<!-- Categories Section End -->

<!-- Featured Section Begin -->
{{--@include('partials_fe.featured')--}}
<!-- Featured Section End -->

<!-- Banner Begin -->
{{--@include('partials_fe.banner')--}}
<!-- Banner End -->

<!-- Latest Product Section Begin -->
{{--@include('partials_fe.late_product')--}}
<!-- Latest Product Section End -->

<!-- Blog Section Begin -->

<!-- Blog Section End -->

<!-- Footer Section Begin -->
@include('partials_fe.footer')
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="{{asset('front_end/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('front_end/js/popper.min.js')}}"></script>
<script src="{{asset('front_end/js/bootstrap.min.js')}}"></script>

{{--<script src="{{asset('front_end/js/jquery.nice-select.min.js')}}"></script>--}}
<script src="{{asset('front_end/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('front_end/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('front_end/js/mixitup.min.js')}}"></script>
<script src="{{asset('front_end/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('front_end/js/main.js')}}"></script>
<script src="{{asset('front_end/js/index.js')}}"></script>
@yield('javascript_fe')
</body>
</html>
