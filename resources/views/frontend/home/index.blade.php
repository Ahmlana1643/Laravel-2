@extends('frontend.layout.main')

@section('title', 'Home')

@push('meta')
    <meta name="robots" content="index, follow">
    <meta name="author" content="Agil Ahmad Maulana | Ahmlana1643.github.io">
    <meta name="keywords" content="MyBlog, BLog Technology">
    <meta name="description" content="MyBlog is a blog that shares knowledge about technology">
    <meta property="og:title" content="MyBlog">
    <meta property="og:image" content="id_ID">
    <meta name="image" content="id_ID">
@endpush

@push('css')
    <link href="{{ asset('assets/frontend') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
@endpush

@push('js')
<script src="{{ asset('assets/frontend') }}/lib/owlcarousel/owl.carousel.min.js"></script>

@endpush

@section('content')

{{-- main post --}}
@include('frontend.home.section._main-post')

{{-- Banner --}}
@include('frontend.home.section._banner-start')

{{-- latest news --}}
@include('frontend.home.section._latest-news')

{{-- popular news --}}
@include('frontend.home.section._popular-news')

@endsection
