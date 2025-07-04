@extends('frontend.layouts.layout')
@section('content')
    <header class="site-header parallax-bg py-5">
        <div class="container text-center">
            <h2 class="fw-bold blogpage">{{ $blogSettings->title }}</h2>
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            <div class="row gx-5">

                <!-- BLOG LIST -->
                <div class="col-lg-12">
                    <div class="row gy-4">
                        @foreach ($blogs as $blog)
                            <div class="col-md-4">
                                <div class="blog-card h-100">
                                    <div class="blog-card__image">
                                        <a href="{{ route('blog.details', $blog->slug) }}">
                                            <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}"
                                                class="img-fluid rounded">
                                        </a>
                                    </div>
                                    <div class="blog-card__content">
                                        <h5 class="mb-2 mt-0">
                                            <a href="{{ route('blog.details', $blog->slug) }}"
                                                class="text-light text-decoration-none">
                                                {{ $blog->title }}
                                            </a>
                                        </h5>
                                        <p class="small text-secondary">
                                            {{ Str::limit(strip_tags($blog->description), 100) }}
                                        </p>
                                        <a href="{{ route('blog.details', $blog->slug) }}"
                                            class="btn btn-link">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $blogs->links() }}
                    </div>
                </div>

                <!-- SIDEBAR -->
                <div class="col-lg-4">
                    <div>
                        <!-- Categories -->
                        <div class="p-3 rounded">
                            <h5 class="fw-bold mb-3">Categories</h5>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($blogCategories as $blogCategory)
                                    <a href="{{ route('blog.category', $blogCategory->slug) }}" class="badge bg-dark">
                                        {{ $blogCategory->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
