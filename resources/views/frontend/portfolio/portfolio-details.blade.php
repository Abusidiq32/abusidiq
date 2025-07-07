@extends('frontend.layouts.layout')

@section('content')
    <header class="site-header parallax-bg py-5 text-center text-white">
        <div class="container">
            <h2 class="fw-bold blogpage" style="margin-left: 20rem;margin-right: 20rem; color: var(--color-1)">Portfolio Details - {{$portfolioItem->title}}</h2>
        </div>
    </header>

    <!-- Portfolio-Area-Start -->
    <section class="portfolio-details section-padding mb-60" id="portfolio-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    {{-- <h2 class="head-title">{{$portfolioItem->title}}</h2> --}}
                    <figure class="image-block">
                        <img src="{{asset($portfolioItem->image)}}" alt="" class="img-fix">
                    </figure>
                    <div class="portflio-info">
                        <div class="single-info">
                            <h4 class="title">Client</h4>
                            <p>{{$portfolioItem->client}}</p>
                        </div>
                        <div class="single-info">
                            <h4 class="title">Date</h4>
                            <p>{{date('d M, Y', strtotime($portfolioItem->created_at))}}</p>
                        </div>
                        <div class="single-info">
                            <h4 class="title">Website</h4>
                            <p><a href="{{$portfolioItem->website}}" target="_blank">{{$portfolioItem->website}}</a></p>
                        </div>
                        <div class="single-info">
                            <h4 class="title">Category</h4>
                            <p>{{$portfolioItem->category->name}}</p>
                        </div>
                    </div>
                    <div class="description">
                        {!! $portfolioItem->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio-Area-End -->

    <!-- Quote-Area-Start -->
    {{-- <section class="quote-area section-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="quote-box">
                        <div class="row ">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="quote-content">
                                    <h3 class="title">Your Journey Today</h3>
                                    <div class="desc">
                                        <p>Still top of and the drops. What don't issued character god, no ports,
                                            credit question.</p>
                                    </div>
                                    <a href="#" class="button-orange mouse-dir">Get Started <span
                                            class="dir-part"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Quote-Area-End -->
@endsection
