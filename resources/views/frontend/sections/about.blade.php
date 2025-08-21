<!-- ### about
================================================== -->
<section id="about" class="s-about target-section">


    <div class="row about-info wide" data-animate-block>

        <div class="column lg-6 md-12 about-info__pic-block">
            <img src="{{ asset($about->image) }}" srcset="{{ asset($about->image) }} 1x, {{ asset($about->image) }} 2x"
                alt="" class="about-info__pic" data-animate-el>
        </div>

        <div class="column lg-6 md-12">
            <div class="about-info__text">

                <h2 class="text-pretitle with-line" data-animate-el>
                    < {{ $about->title }} ?>
                </h2>
                <div class="attention-getter" data-animate-el>
                    {!! $about->description !!}
                </div>


                <a href="{{ route('resume.download') }}" class="btn btn--medium u-fullwidth" data-animate-el>
                    My Resumé
                </a>

            </div>
        </div>
    </div>


    <div class="row about-expertise" data-animate-block>
        <div class="column lg-12">
            @if (!$skillsItems->isEmpty())
                <h2 class="text-pretitle with-line h-text" data-animate-el>
                   < {{$skillsSettings->title}} ?>
                </h2>
            @endif

            <ul class="skills-list h1" data-animate-el>
                @foreach ($skillsItems as $skillsItem)
                    <li>{{ $skillsItem->name }}</li>
                @endforeach
            </ul>

        </div>
    </div>


    <div class="row about-timelines" data-animate-block>

        <div class="column lg-6 tab-12">
            @if (!$experiences->isEmpty())
                <h2 class="text-pretitle" data-animate-el>
                    Experience
                </h2>
            @endif

            <div class="timeline" data-animate-el>

                @foreach ($experiences as $experience)
                    <div class="timeline__block">
                        <div class="timeline__bullet"></div>
                        <div class="timeline__header">
                            <h4 class="timeline__title">{{ $experience->company }}</h3>
                                <h5 class="timeline__meta">{{ $experience->title }}</h5>
                                <p class="timeline__timeframe">
                                    {{ date('F Y', strtotime($experience->start_date)) }} -
                                    {{ $experience->end_date ? date('F Y', strtotime($experience->end_date)) : 'Present' }}
                                </p>
                        </div>
                        <div class="timeline__desc">
                            <p>{{ $experience->description }}</p>
                        </div>
                    </div>
                @endforeach


            </div> <!-- end timeline -->

        </div> <!-- end column -->

        <div class="column lg-6 tab-12">
            @if (!$educations->isEmpty())
                <h2 class="text-pretitle" data-animate-el>
                    Education
                </h2>
            @endif


            <div class="timeline" data-animate-el>

                @foreach ($educations as $education)
                    <div class="timeline__block">
                        <div class="timeline__bullet"></div>
                        <div class="timeline__header">
                            <h4 class="timeline__title">{{ $education->university }}</h3>
                                <h5 class="timeline__meta">{{ $education->field_of_study }}</h5>
                                <p class="timeline__timeframe">
                                    {{ date('F Y', strtotime($education->graduation_date)) }}</p>
                        </div>
                        <div class="timeline__desc">
                            <p>{!! $education->description !!}</p>
                        </div>
                    </div>
                @endforeach

            </div> <!-- end timeline -->

        </div> <!-- end column -->


    </div>

</section>
