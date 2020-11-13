
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
                <div id="logreg-forms">
                    <form class="form-signin" method="POST" action="{{ route('login') }}">
                        @csrf
                        <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
                        <div class="social-login">
                            <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign in with Facebook</span>
                            </button>
                            <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign in with Google+</span>
                            </button>
                        </div>
                        <p class="text-center"> OR </p>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               placeholder="Email address"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <br>
                        <input id="password" type="password" placeholder="Password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                Forgot password ?
                            </a>
                        @endif
                        <hr>
                        <a href="{{route('register')}}" class="btn btn-primary btn-block" type="button" id="btn-signup"><i class="fas fa-user-plus"></i>
                            Sign up New Account
                        </a>
                    </form>
                    <br>
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


