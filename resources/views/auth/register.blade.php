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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    @yield('css_profile')
</head>
<body class="dashboard">
<div id="webpage">
    @include('partials_profile.header')
    <div class="container-fluid">
        <div class="row">
            <main role="main" class="ml-sm-auto col-lg-12">
                <div class="container">
                    <div class="bg-light">
                        <article class="card-body mx-auto" style="max-width: 800px;">
                            <h4 class="card-title mt-3 text-center">Create Account</h4>
                            <p class="text-center">Get started with your free account</p>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input id="name" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}"
                                           placeholder="Full name" type="text" required
                                           autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> <!-- form-group// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                    </div>
                                    <input id="email" type="email" placeholder="Email address"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required
                                           autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                    </div>
                                    <input id="phone" type="text" placeholder="Phone number"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           name="phone" value="{{ old('phone') }}" required
                                           autocomplete="phone">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <input id="password" type="password" placeholder="Create password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <input id="password-confirm" type="password"
                                           placeholder="Repeat password"
                                           class="form-control"
                                           name="password_confirmation" required
                                           autocomplete="new-password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Create Account</button>
                                </div>
                                <p class="text-center">Have an account? <a href="{{ route('login') }}">Log In</a></p>
                            </form>
                        </article>
                    </div>
                </div>
                @include('partials_profile.support_box')
                @include('partials_profile.footer')
            </main>
        </div>
    </div>
    @include('partials_profile.bottom_bar')
</div>
<script src="{{asset('profile/js/main-dashboard.min.js')}}"></script>
<script src="{{asset('profile/js/google_map.js')}}"></script>
<script src="{{asset('profile/js/phongtro123.post.js')}}"></script>
<script src="{{asset('profile/js/3rd/feather.min.js')}}"></script>
<script src="{{asset('profile/js/main.js')}}"></script>
@yield('js_profile')
</body>
</html>


