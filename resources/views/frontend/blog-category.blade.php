@extends('frontend.layouts.layout')
@section('content')
    <header class="site-header parallax-bg">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-sm-8">
                    <h2 class="title">{{$category->name}}</h2>
                </div>
                <div class="col-sm-4">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>{{$category->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio-Area-Start -->
    <section class="blog-area section-padding">
        <div class="container">
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-xl-4 col-md-6">
                        <div class="single-blog">
                            <figure class="blog-image">
                                <img src="{{ asset($blog->image) }}" alt="">
                            </figure>
                            <div class="blog-content">
                                <h3 class="title"><a href="{{ route('blog.details', $blog->slug) }}">{{ $blog->title }}</a></h3>
                                <div class="desc">
                                    <p>{{ Str::limit(strip_tags($blog->description), 150, '...') }}</p>
                                </div>
                                <a href="{{ route('blog.details', $blog->slug) }}" class="button-primary-trans mouse-dir">Read More
                                    <span class="dir-part"></span><i class="fal fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <nav class="navigation pagination">
                        <div class="nav-links d-flex justify-content-center">
                            {{$blogs->links()}}
                        </div>
                    </nav>
                </div>
            </div>

            <hr>
            <div class="categories-section">
                @if ($blogCategories)
                    
                <h3 class="categories-title">Categories</h3>
                <div class="categories-list d-flex flex-wrap">
                    @foreach ($blogCategories as $blogCategory)
                        <a href="{{ route('blog.category', $blogCategory->slug) }}" class="nav-link mx-2">
                            <span class="text">{{ $blogCategory->name }}</span>
                        </a>
                    @endforeach
                </div>
                @endif
            </div>

        </div>
    </section>
    <!-- Portfolio-Area-End -->

    <!-- Quote-Area-End -->
@endsection
