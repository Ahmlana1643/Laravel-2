<div class="col-lg-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="p-3 rounded border">
                <div class="input-group w-100 mx-auto d-flex mb-4">

                    <form action="{{ route('frontend.article.search')}}" method="get" class="w-100">
                        <input type="search" name="keyword" class="form-control p-3" placeholder="Enter keywords..." aria-describedby="search-icon-1">
                    </form>
                    
                </div>
                <h4 class="mb-4">Categories</h4>
                <div class="row g-2">
                    <div class="col-12">
                        @foreach ($categories as $item)
                        <a href="{{ route('category.show', $item->slug) }}" class="link-hover btn btn-light w-100 rounded text-uppercase text-dark py-3">
                            {{ $item->name }} ({{ $item->total_articles }})
                        </a>
                        @endforeach
                    </div>
                </div>
                <h4 class="my-4">Stay Connected</h4>
                <div class="row g-4">
                    <div class="col-12">
                        <a href="#" class="w-100 rounded btn btn-primary d-flex align-items-center p-3 mb-2">
                            <i class="fab fa-facebook-f btn btn-light btn-square rounded-circle me-3"></i>
                            <span class="text-white">13,977 Fans</span>
                        </a>
                        <a href="#" class="w-100 rounded btn btn-danger d-flex align-items-center p-3 mb-2">
                            <i class="fab fa-youtube btn btn-light btn-square rounded-circle me-3"></i>
                            <span class="text-white">7,999 Subscriber</span>
                        </a>
                        <a href="#" class="w-100 rounded btn btn-dark d-flex align-items-center p-3 mb-2">
                            <i class="fab fa-instagram btn btn-light btn-square rounded-circle me-3"></i>
                            <span class="text-white">19,764 Follower</span>
                        </a>
                    </div>
                </div>
                <h4 class="my-4">Popular Article</h4>
                <div class="row g-4">
                    @foreach ($popular_articles as $popular)
                        <div class="col-12">
                            <div class="row g-4 align-items-center features-item">
                                <div class="col-4">
                                    <div class="rounded-circle position-relative">
                                        <div class="overflow-hidden rounded-circle">
                                            <a href="{{ route('articles.show', $popular->slug)}}">
                                                <img src="{{ asset('storage/images/' . $popular->image) }}" class="img-zoomin img-fluid rounded-circle w-100" alt="{{ $popular->title }}">
                                            </a>
                                        </div>
                                        <span class="rounded-circle border border-2 border-white bg-primary btn-sm-square text-white position-absolute" style="top: 10%; right: -10px;">{{ $popular->views }}</span>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="features-content d-flex flex-column">
                                        <p class="text-uppercase mb-2">{{ $popular->category->name }}</p>
                                        <a href="{{ route('articles.show', $popular->slug) }}" class="h6">
                                            {{ $popular->title }}
                                        </a>
                                        <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i>
                                            {{ date('d-m-Y', strtotime($popular->published_at)) }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    <div class="col-lg-12">
                        <div class="border-bottom my-3 pb-3">
                            <h4 class="mb-0">Popular Tags</h4>
                        </div>
                        @foreach ($tags as $tag)
                            <ul class="nav nav-pills d-inline-flex text-center mb-4">
                                <li class="nav-item mb-3">
                                    <a class="d-flex py-2 bg-light rounded-pill me-2" href="{{ route('frontend.tag', $tag->slug) }}">
                                        <span class="text-dark link-hover" style="width: 90px;"># {{ $tag->name }}</span>
                                    </a>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                    <div class="col-lg-12">
                        <div class="position-relative banner-2">
                            <img src="{{ asset('assets/frontend') }}/img/banner-2.jpg" class="img-fluid w-100 rounded" alt="">
                            <div class="text-center banner-content-2">
                                <h6 class="mb-2">The Most Populer</h6>
                                <p class="text-white mb-2">News & Magazine WP Theme</p>
                                <a href="#" class="btn btn-primary text-white px-4">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
