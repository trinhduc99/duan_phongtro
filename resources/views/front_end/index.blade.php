@extends('layouts.front_end')
@section('title_fe')
    Tim nha tro
@endsection


@section('contents_fe')
    @include('partials_fe.hero')

    <!-- Categories Section Begin -->
    @include('partials_fe.introduce')
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    @include('partials_fe.featured')
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
@endsection

