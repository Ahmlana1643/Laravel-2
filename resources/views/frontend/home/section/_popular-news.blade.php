<!-- Most Populer News Start -->
<div class="container-fluid populer-news py-5">
    <div class="container py-5">
        <div class="tab-class mb-4">
            <div class="row g-4">
                <div class="col-lg-8 col-xl-9">
                    <div class="d-flex flex-column flex-md-row justify-content-md-between border-bottom mb-4">
                        <h1 class="mb-4">Categories</h1>
                        <ul class="nav nav-pills d-inline-flex text-center">
                            @foreach ($categories as $category)
                            <li class="nav-item mb-3">
                                <a class="d-flex py-2 bg-light rounded-pill {{ $loop->first ? 'active' : '' }} me-2"
                                    data-bs-toggle="pill" href="#tab-{{ $category->id }}">
                                    <span class="text-dark" style="width: 100px;">{{ $category->name }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-content mb-4">
                        @foreach ($categories as $category)
                        <div id="tab-{{ $category->id }}" class="tab-pane fade show {{ $loop->first ? 'active' : '' }}">
                            <div class="row g-4">
                                @foreach ($category->articles as $article)
                                <div class="col-lg-4">
                                    <div class="position-relative rounded overflow-hidden">
                                        <img src="{{ asset('storage/images/' . $article->image) }}"
                                            class="img-zoomin img-fluid rounded w-100" alt="{{ $article->title }}">
                                        <div class="position-absolute text-white px-4 py-2 bg-primary rounded"
                                            style="top: 20px; right: 20px;">
                                            {{ $category->name }}
                                        </div>
                                    </div>
                                    <div class="my-4">
                                        <a href="{{ route('articles.show', $article->slug) }}" class="h4">{{ $article->title }}</a>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-clock"></i> {{ $article->created_at->diffForHumans() }}</a>
                                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> {{ $article->views }} Views</a>
                                    </div>
                                    <p class="my-4">{{ Str::limit($article->content, 200, '...') }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="border-bottom mb-4">
                        <h2 class="my-4">Latest Articles</h2>
                    </div>
                    <div class="row g-4">
                        @foreach ($latestArticles as $article)
                        <div class="col-lg-6">
                            <div class="latest-news-item bg-light rounded">
                                <div class="rounded-top overflow-hidden">
                                    <img src="{{ asset('storage/images/' . $article->image) }}"
                                        class="img-zoomin img-fluid rounded-top w-100" alt="{{ $article->title }}">
                                </div>
                                <div class="d-flex flex-column p-4">
                                    <a href="{{ route('articles.show', $article->slug) }}" class="h6">
                                        {{ $article->title }}
                                     </a>
                                    <div class="d-flex justify-content-between">
                                        <a href="#" class="small text-body link-hover">by {{ $article->user->name }}</a>
                                        <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> {{ date('Y-m-d H:i:s', $article->created_at) }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="p-3 rounded border">
                                <h4 class="mb-4">Stay Connected</h4>
                                <div class="row g-4">
                                    <div class="col-12">
                                        <a href="#"
                                            class="w-100 rounded btn btn-primary d-flex align-items-center p-3 mb-2">
                                            <i
                                                class="fab fa-facebook-f btn btn-light btn-square rounded-circle me-3"></i>
                                            <span class="text-white">13,977 Fans</span>
                                        </a>
                                        <a href="#"
                                            class="w-100 rounded btn btn-danger d-flex align-items-center p-3 mb-2">
                                            <i class="fab fa-youtube btn btn-light btn-square rounded-circle me-3"></i>
                                            <span class="text-white">7,999 Subscriber</span>
                                        </a>
                                        <a href="#"
                                            class="w-100 rounded btn btn-dark d-flex align-items-center p-3 mb-2">
                                            <i
                                                class="fab fa-instagram btn btn-light btn-square rounded-circle me-3"></i>
                                            <span class="text-white">19,764 Follower</span>
                                        </a>
                                        <a href="#"
                                            class="w-100 rounded btn btn-secondary d-flex align-items-center p-3 mb-2">
                                            <i class="bi-cloud btn btn-light btn-square rounded-circle me-3"></i>
                                            <span class="text-white">31,999 Subscriber</span>
                                        </a>
                                    </div>
                                </div>
                                <h4 class="my-4">Popular Article</h4>
                                <div class="row g-4">
                                    @foreach ($popularArticles as $popular)
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Most Populer News End -->
