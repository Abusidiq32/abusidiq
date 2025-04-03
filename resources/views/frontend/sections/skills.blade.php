<section class="skills-area section-padding-top" id="skills-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-title">
                            <h3 class="title">{{$skillsSettings->title}}</h3>
                            <div class="desc">
                                <p>{!! $skillsSettings->sub_title !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row skills">
                    @foreach ($skillsItems as $skillsItem)
                    <div class="col-sm-6">
                        <div class="bar_group wow fadeInUp" data-wow-delay="0.3s" data-max="100">
                            <div class="title">{{$skillsItem->name}}</div>
                            <div class="bar_group__bar thick elastic" data-value="{{$skillsItem->percentage}}" data-color="{{getColor($loop->index)}}"
                                data-tooltip="true" data-show-values="false" data-unit="%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <figure class="single-image text-right wow fadeInRight">
                    <img src="{{asset($skillsSettings->image)}}" alt="">
                </figure>
            </div>
        </div>
    </div>
</section>