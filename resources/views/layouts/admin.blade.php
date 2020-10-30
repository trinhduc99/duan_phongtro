@extends('layouts.back_end')
@section('title_be')
    Trang chủ
@endsection
@section('contents_be')
    <div class="content-wrapper">
        @include('partials_be.content_header',['name'=>'Home','key'=>''])
        <div class="content">
            <div class="col-md-12">
                Trang chủ
            </div>
        </div>
    </div>
@endsection
