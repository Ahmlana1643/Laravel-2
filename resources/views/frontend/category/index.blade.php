@extends('frontend.layout.main')

@section('title', 'All Category')

@push('meta')
    <meta name="robots" content="index, follow">
    <meta name="author" content="Agil Ahmad Maulana | Ahmlana1643.github.io">
    <meta name="keywords" content="Category MyBlog, BLog Technology">
    <meta name="description" content="MyBlog is a blog that shares knowledge about technology">
    <meta property="og:title" content="MyBlog">
    <meta property="og:image" content="id_ID">
    <meta name="image" content="id_ID">
@endpush

@push('css')

@endpush

@push('js')

@endpush

@section('content')

<!-- Single Product Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <ol class="breadcrumb justify-content-start mb-4">
            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
            <li class="breadcrumb-item active text-dark">All Category</li>
        </ol>
        <div class="row g-4">

            <div class="col-lg-8">
                <div class="mb-4">
                    <a href="#" class="h1 display-5">All Category</a>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @foreach ($categories as $item)
                                <div class="col-lg-4">
                                    <a href="{{ route('category.show', $item->slug) }}">
                                        <div class="card bg-light mb-3">
                                            <div class="card-body text-center p-4">
                                                <h5 class="card-title">{{ $item->name }} ({{ $item->total_articles }})</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            @include('frontend.articles._side-menu')
        </div>
    </div>
</div>
<!-- Single Product End -->

@endsection
