
    <!-- # page wrap -->
    <div class="s-pagewrap">

        <div class="circles">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    
        <!-- ## site header -->
        <header class="s-header">
    
            <div class="header-mobile">
                <span class="mobile-home-link"><a href="">Abusidiq.</a></span>
                <a class="mobile-menu-toggle" href="#0"><span>Menu</span></a>
            </div>
    
            <div class="row wide main-nav-wrap">
                <nav class="column lg-12 main-nav">
                    <ul>
                        <li><a href="{{ url('/')}}" class="home-link">Abusidiq</a></li>
                        <li class="current"><a href="#intro" class="smoothscroll">Intro</a></li>
                        <li><a href="#about" class="smoothscroll">About</a></li>
                        @if ($portfolioItems->count() > 0)
                            <li><a href="#works" class="smoothscroll">Projects</a></li>
                        @endif
                        @if ($blog->count() > 0)
                            <li><a href="#blog" class="smoothscroll">Notes</a></li>
                        @endif
                        <li><a href="#contact" class="smoothscroll">Contact Me</a></li>
                    </ul>
                </nav>
            </div>
    
        </header> 
