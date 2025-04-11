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
                    {{ $about->title }}
                </h2>
                <div class="attention-getter" data-animate-el>
                    {!! $about->description !!}
                </div>
                
                
                <a href="{{ route('admin.resume.download') }}" class="btn btn--medium u-fullwidth" data-animate-el>
                    My Resumé 
                </a>

            </div>
        </div>
    </div>


    <div class="row about-expertise" data-animate-block>
        <div class="column lg-12">

            <h2 class="text-pretitle" data-animate-el>Expertise</h2>

            <ul class="skills-list h1" data-animate-el>
                <li>Visual Design</li>
                <li>Branding Identity</li>
                <li>UI Design</li>
                <li>Product Design</li>
                <li>Prototyping</li>
                <li>Illustration</li>
            </ul>

        </div>
    </div>


    <div class="row about-timelines" data-animate-block>

        <div class="column lg-6 tab-12">

            <h2 class="text-pretitle" data-animate-el>
                Experience
            </h2>

            <div class="timeline" data-animate-el>

                <div class="timeline__block">
                    <div class="timeline__bullet"></div>
                    <div class="timeline__header">
                        <h4 class="timeline__title">Dropbox</h3>
                            <h5 class="timeline__meta">Product Designer</h5>
                            <p class="timeline__timeframe">August 2019 - Present</p>
                    </div>
                    <div class="timeline__desc">
                        <p>Lorem ipsum Occaecat do esse ex et dolor culpa nisi ex in magna consectetur nisi
                            cupidatat laboris esse eiusmod deserunt aute do quis velit esse sed Ut proident
                            cupidatat nulla esse cillum laborum occaecat nostrud sit dolor incididunt amet
                            est occaecat nisi.</p>
                    </div>
                </div>

                <div class="timeline__block">
                    <div class="timeline__bullet"></div>
                    <div class="timeline__header">
                        <h4 class="timeline__title">Microsoft</h4>
                        <h5 class="timeline__meta">Frontend Developer</h5>
                        <p class="timeline__timeframe">August 2016 - July 2019</p>
                    </div>
                    <div class="timeline__desc">
                        <p>Lorem ipsum Occaecat do esse ex et dolor culpa nisi ex in magna consectetur nisi
                            cupidatat laboris esse eiusmod deserunt aute do quis velit esse sed Ut proident
                            cupidatat nulla esse cillum laborum occaecat nostrud sit dolor incididunt amet
                            est occaecat nisi.</p>
                    </div>
                </div>

            </div> <!-- end timeline -->

        </div> <!-- end column -->

        <div class="column lg-6 tab-12">

            <h2 class="text-pretitle" data-animate-el>
                Education
            </h2>

            <div class="timeline" data-animate-el>

                <div class="timeline__block">
                    <div class="timeline__bullet"></div>
                    <div class="timeline__header">
                        <h4 class="timeline__title">University of Life</h3>
                            <h5 class="timeline__meta">Master in Graphic Design</h5>
                            <p class="timeline__timeframe">April 2015</p>
                    </div>
                    <div class="timeline__desc">
                        <p>Lorem ipsum Occaecat do esse ex et dolor culpa nisi ex in magna consectetur nisi
                            cupidatat laboris esse eiusmod deserunt aute do quis velit esse sed Ut proident
                            cupidatat nulla esse cillum laborum occaecat nostrud sit dolor incididunt amet
                            est occaecat nisi.</p>
                    </div>
                </div>

                <div class="timeline__block">
                    <div class="timeline__bullet"></div>
                    <div class="timeline__header">
                        <h4 class="timeline__title">School of Cool Designers</h4>
                        <h5 class="timeline__meta">B.A. Degree in Graphic Design</h5>
                        <p class="timeline__timeframe">August 2012</p>
                    </div>
                    <div class="timeline__desc">
                        <p>Lorem ipsum Occaecat do esse ex et dolor culpa nisi ex in magna consectetur nisi
                            cupidatat laboris esse eiusmod deserunt aute do quis velit esse sed Ut proident
                            cupidatat nulla esse cillum laborum occaecat nostrud sit dolor incididunt amet
                            est occaecat nisi.</p>
                    </div>
                </div>

            </div> <!-- end timeline -->

        </div> <!-- end column -->


    </div>

</section>
