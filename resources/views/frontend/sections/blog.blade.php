<!-- ### Blogs -->
<section id="blog" class="s-works target-section">
    <div class="row works-portfolio">
        <div class="column lg-12" data-animate-block>
            <div class="blog-title-wrap">
                <h2 class="text-pretitle h-text" data-animate-el>
                    {{ $blogSettings->title }}
                </h2>
                <p class="h1" data-animate-el>
                    {{ $blogSettings->sub_title }}
                </p>
            </div>

            <div class="row block-lg-one-third block-md-one-half block-mob-whole">
                @foreach($blogs->take(3) as $blog)
                    <div class="column">
                        <div class="blog-card">
                            <div class="blog-card__image">
                                <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
                            </div>
                            <div class="blog-card__content">
                                <h3 class="blog-links"> <a href="{{ route('blog.details', $blog->slug) }}">{{ $blog->title }}</a></h3>
                                <p>{{ Str::limit(strip_tags($blog->description), 150) }} </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row text-center u-add-top">
                <div class="column">
                    <a href="{{ route('blog') }}" class="btn contact-btn">More Notes</a>
                </div>
            </div>
        </div>
    </div>
</section>