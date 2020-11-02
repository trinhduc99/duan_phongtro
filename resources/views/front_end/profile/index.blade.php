@extends('layouts.profile')
@section('css_profile')
    <link rel="stylesheet" href="{{asset('profile/stylesheets/main.css')}}"/>
@endsection
@section('title_profile')
    Quan ly tai khoan
@endsection
@section('contents_profile')
    <section role="main" class="content-body">
        @include('partials_profile.sidebar_right',['title' =>'Quản lý'])
        <div class="content">

        </div>
    </section>
@endsection
