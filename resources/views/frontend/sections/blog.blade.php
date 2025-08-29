<!-- ### Blogs -->
@if ($blog->count() > 0)
    <section id="blog" class="s-works target-section">
        <div class="row works-portfolio">
            <div class="column lg-12" data-animate-block>
                <div class="blog-title-wrap">
                    <h2 class="text-pretitle with-line h-text" data-animate-el>
                        < {{ $blogSettings->title }} ?>
                    </h2>
                    <p class="h1" data-animate-el>
                        {{ $blogSettings->sub_title }}
                    </p>
                </div>

                <div class="row block-lg-one-third block-md-one-half block-mob-whole">
                    @foreach($blogs->take(3) as $post)
                        <div class="column">
                            <div class="blog-card">
                                <div class="blog-card__image">
                                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                                </div>
                                <div class="blog-card__content">
                                    <h3 class="blog-links"> <a href="{{ route('blog.details', $post->slug) }}">{{ $post->title }}</a></h3>
                                    <p>{{ Str::limit(strip_tags($post->description), 150) }} </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($blog->count() > 3)
                    <div class="row text-center u-add-top">
                        <div class="column">
                            <a href="{{ route('blog') }}" class="btn contact-btn">More Notes</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif