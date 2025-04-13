@php
    $SocialLinks = \App\Models\FooterSocialLinks::all();
@endphp

<!-- ## main content -->
<main class="s-content">


    <!-- ### intro-->
    <section id="intro" class="s-intro target-section">

        <div class="row intro-content wide">

            <div class="column">
                <div class="text-pretitle with-line">
                   < Hello World ?>
                </div>

                <h1 class="text-huge-title">
                    {!! str_replace('|', '<br>', e($hero->title)) !!}
                </h1>
                
                <p class="text-subtitle">
                    {!! nl2br(e(wordwrap($hero->sub_title, 60))) !!}
                </p>
                
            </div>

            <ul class="intro-social">
                @foreach ($SocialLinks as $SocialLink)
                    <li><a href="{{$SocialLink->url}}" target="_blank">{{$SocialLink->name}}</a></li>
                @endforeach
            </ul>

        </div> <!-- end intro content -->

        <a href="#about" class="intro-scrolldown smoothscroll">
            <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                fill-rule="evenodd" clip-rule="evenodd">
                <path
                    d="M11 21.883l-6.235-7.527-.765.644 7.521 9 7.479-9-.764-.645-6.236 7.529v-21.884h-1v21.883z" />
            </svg>
        </a>

    </section>