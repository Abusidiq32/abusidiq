<section class="portfolio-area section-padding-top" id="portfolio-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="section-title">
                    <h3 class="title">{{ $portfolioSettings->title }}</h3>
                    <div class="desc">
                        <p>{{ $portfolioSettings->sub_title }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ul class="filter-menu">
                    <li class="active" data-filter="*">All Projects</li>
                    @foreach ($portfolioCategories as $portfolioCategory)
                        <li data-filter=".{{ $portfolioCategory->slug }}">{{ $portfolioCategory->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="portfolio-wrapper">
            <div class="row portfolios">
                @foreach ($portfolioItems as $items)
                    <div data-wow-delay="0.3s" class="col-md-6 col-lg-4 filter-item {{$items->category->slug}}">
                        <div class="single-portfolio">
                            <figure class="portfolio-image">
                                <img src="{{ asset($items->image) }}" alt="">
                            </figure>
                            <div class="portfolio-content">
                                <a href="{{asset($items->image)}}" data-lity class="icon"><i
                                        class="fas fa-plus"></i></a>
                                <h4 class="title"><a href="{{route('portfolio.details', $items->id)}}">{{$items->title}}</a></h4>
                                <div class="desc">
                                    <p>{!! Str::limit(strip_tags($items->description, 100)) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
