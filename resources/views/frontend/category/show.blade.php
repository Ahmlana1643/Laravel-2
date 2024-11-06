@extends('frontend.layout.main')

@section('title', 'Category : ' . $category->name)

@push('meta')
    <meta name="robots" content="index, follow">
    <meta name="author" content="Agil Ahmad Maulana | Ahmlana1643.github.io">
    <meta name="keywords" content="{{ $category->name }}, MyBlog, BLog Technology">
    <meta name="description" content="MyBlog is a blog that shares knowledge about technology">
    <meta property="og:title" content="MyBlog">
    <meta property="og:image" content="contoh.jpg">
    <meta name="image" content="contoh.jpg">
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
            <li class="breadcrumb-item active text-dark">{{ $category->name }}</li>
        </ol>
        <div class="row g-4">

            <div class="col-lg-8">
                <div class="mb-4">
                    <a href="#" class="h1 display-5">Category : {{ $category->name }}</a>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @forelse ($articles as $item)
                                <div class="col-lg-6">
                                    <div class="latest-news-carousel">
                                        <div class="latest-news-item mb-4">
                                            <div class="bg-light rounded">
                                                <div class="rounded-top overflow-hidden">
                                                    <a href="{{ route('articles.show', $item->slug) }}">
                                                        <img src="{{ asset('storage/images/' . $item->image) }}" class="img-zoomin img-fluid rounded-top w-100" alt="{{ $item->title }}">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column p-4">
                                                    <a href="{{ route('articles.show', $item->slug) }}" class="h4">{{ $item->title }}</a>
                                                    <div class="d-flex justify-content-between">
                                                        <a href="#" class="small text-body link-hover">by {{ $item->user->name }}</a>
                                                        <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> {{ date('d-m-Y', strtotime($item->published_at)) }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @empty
                            <div class="col-lg-12">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Sorry!</strong> No article found.
                                </div>
                            </div>
                            @endforelse

                            <div class="d-flex justify-content-center">
                                {{ $articles->links() }}
                            </div>

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

