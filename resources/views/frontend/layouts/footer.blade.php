@php
    $uefulLinks = \App\Models\FooterUsefulLinks::all();
    $SocialLinks = \App\Models\FooterSocialLinks::all();
    $HelpLinks = \App\Models\FooterHelp::all();
    $contactInfo = \App\Models\FooterContact::first();
    $Info = \App\Models\FooterInfo::first();

@endphp



<footer class="footer-area">
    <div class="container">
        <div class="row footer-widgets">
            @if ($SocialLinks)
                <div class="col-md-12 col-lg-3 widget">
                    <div class="text-box">
                        <figure class="footer-logo">
                            <img src="{{asset($webSettings->logo)}}" alt="">
                        </figure>
                        <p>{{$Info->info}}</p>
                        <ul class="d-flex flex-wrap">
                            @foreach ($SocialLinks as $SocialLink)
                                
                            <li><a href="{{$SocialLink->url}}" target="_blank"><i class="{{$SocialLink->icon}}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="col-md-4 col-lg-2 offset-lg-1 widget">
                <h3 class="widget-title">Useful Link</h3>
                <ul class="nav-menu">
                    @foreach ($uefulLinks as $uefulLink)
                        <li><a href="{{$uefulLink->url}}">{{$uefulLink->name}}</a></li>
                    @endforeach

                </ul>
            </div>
            <div class="col-md-4 col-lg-3 widget">
                <h3 class="widget-title">Contact Info</h3>
                <ul>
                    <li>{{ $contactInfo->address}}</li>
                    <li><a href="#">{{$contactInfo->phone}}</a></li>
                    <li><a href="#">{{$contactInfo->email}}</a></li>
                </ul>
            </div>
            <div class="col-md-4 col-lg-3 widget">
                <h3 class="widget-title">Help</h3>
                <ul class="nav-menu">
                    @foreach ($HelpLinks as $HelpLink)
                        <li><a href="{{$HelpLink->url}}" target="_blank">{{$HelpLink->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright">
                        {{-- <p>Copyright 2025 <span>Abusidiq-digitals</span> All Rights Reserved.</p> --}}
                        <p>{{$Info->copyright}}</p>
                        <p>{{$Info->powered_by}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
