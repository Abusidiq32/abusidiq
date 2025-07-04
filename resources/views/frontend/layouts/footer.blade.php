@php
    $uefulLinks = \App\Models\FooterUsefulLinks::all();
    $SocialLinks = \App\Models\FooterSocialLinks::all();
    $HelpLinks = \App\Models\FooterHelp::all();
    $contactInfo = \App\Models\FooterContact::first();
    $Info = \App\Models\FooterInfo::first();

@endphp

    <!-- ## footer
    ================================================== -->
    <footer class="s-footer">
        <div class="row">
            <div class="column ss-copyright" style="margin-left: 5rem;">
                <span><p>© {{$Info->copyright}}</p>
                </span>
            </div>

            <div class="ss-go-top">
                <a class="smoothscroll" title="Back to Top" href="#top" style="margin-top: 15px; margin-left: 2rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd">
                        <path d="M11 2.206l-6.235 7.528-.765-.645 7.521-9 7.479 9-.764.646-6.236-7.53v21.884h-1v-21.883z" />
                    </svg>
                </a>
            </div>
        </div>

    </footer> <!-- end s-footer -->

</div> <!-- end -s-pagewrap -->

