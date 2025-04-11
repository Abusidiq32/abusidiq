@if ($feedbacks->count())
    <div class="row testimonials">
        <div class="column lg-12" data-animate-block>
            <div class="swiper-container testimonial-slider" data-animate-el>
                <div class="swiper-wrapper">

                    @foreach ($feedbacks as $feedback)
                        <div class="testimonial-slider__slide swiper-slide">
                            <div class="testimonial-slider__author">
                                <img src="{{ asset('frontend/assets/images/avatars/user-02.jpg') }}" alt="Author image"
                                    class="testimonial-slider__avatar">
                                <cite class="testimonial-slider__cite">
                                    <strong>{{ $feedback->name }}</strong>
                                    <span>{{ $feedback->position }}</span>
                                </cite>
                            </div>
                            <p>
                                {{ $feedback->comment }}
                            </p>
                        </div>
                    @endforeach
                    
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
@endif
