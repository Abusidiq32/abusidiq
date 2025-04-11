@php
    $SocialLinks = \App\Models\FooterSocialLinks::all();
    $contactInfo = \App\Models\FooterContact::first();
@endphp


            <!-- ### contact -->
            <section id="contact" class="s-contact target-section">

                <div class="row contact-top">
                    <div class="column lg-12">
                        <h2 class="text-pretitle">
                            <h3 class="title">{{$ContactSettings->title}}</h3>
                        </h2>

                        <p class="h1">
                            {!! $ContactSettings->sub_title !!}
                        </p>
                    </div>
                </div> 

                <div class="row contact-bottom">
                    <div class="column lg-3 md-5 tab-6 stack-on-550 contact-block">
                        <h3 class="text-pretitle">Reach me at</h3>
                        <p class="contact-links">
                            <a href="mailto:{{$contactInfo->email}}" class="mailtoui">{{$contactInfo->email}}</a> <br>
                            <a href="tel:+1975432345">{{$contactInfo->phone}}</a>
                        </p>
                    </div>
                    <div class="column lg-4 md-5 tab-6 stack-on-550 contact-block">
                        <h3 class="text-pretitle">Social</h3>
                        <ul class="contact-social">
                            @foreach ( $SocialLinks as $SocialLink)
                                <li><a href="{{$SocialLink->url}}" target="_blank"><i class="{{$SocialLink->icon}}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="column lg-4 md-12 contact-block">
                        <a href="mailto:sayhello@Abusidiq.com" class="mailtoui btn btn--medium u-fullwidth contact-btn">Contact ME.</a>
                    </div>
                </div> 
            </section> 
        </main> 



