/* ===================================================================
 * Luther 1.0.0 - Main JS
 *
 * ------------------------------------------------------------------- */

(function(html) {

    "use strict";

    html.className = html.className.replace(/\bno-js\b/g, '') + ' js ';



   /* Animations
    * -------------------------------------------------- */
    const tl = anime.timeline( {
        easing: 'easeInOutCubic',
        duration: 800,
        autoplay: false
    })
    .add({
        targets: '#loader',
        opacity: 0,
        duration: 1000,
        begin: function() {
            // Original behavior: reset to top at start
            window.scrollTo(0, 0);
        }
    })
    .add({
        targets: '#preloader',
        opacity: 0,
        complete: function() {
            const pre = document.querySelector("#preloader");
            if (pre) {
                pre.style.visibility = "hidden";
                pre.style.display = "none";
            }
        }
    })
    .add({
        targets: '.s-header',
        translateY: [-100, 0],
        opacity: [0, 1]
    }, '-=200')
    .add({
        targets: [ '.s-intro .text-pretitle', '.s-intro .text-huge-title', '.s-intro .text-subtitle' ],
        translateX: [100, 0],
        opacity: [0, 1],
        delay: anime.stagger(400)
    })
    .add({
        targets: '.circles span',
        keyframes: [
            {opacity: [0, .3]},
            {opacity: [.3, .1], delay: anime.stagger(100, {direction: 'reverse'})}
        ],
        delay: anime.stagger(100, {direction: 'reverse'})
    })
    .add({
        targets: '.intro-social li',
        translateX: [-50, 0],
        opacity: [0, 1],
        delay: anime.stagger(100, {direction: 'reverse'})
    })
    .add({
        targets: '.intro-scrolldown',
        translateY: [100, 0],
        opacity: [0, 1]
    }, '-=800');



   /* Preloader
    * -------------------------------------------------- */
    const ssPreloader = function() {

        const preloader = document.querySelector('#preloader');
        if (!preloader) return;
        
        window.addEventListener('load', function() {
            document.querySelector('html').classList.remove('ss-preload');
            document.querySelector('html').classList.add('ss-loaded');

            document.querySelectorAll('.ss-animated').forEach(function(item){
                item.classList.remove('ss-animated');
            });

            tl.play();
        });

    }; // end ssPreloader


   /* Mobile Menu
    * ---------------------------------------------------- */ 
    const ssMobileMenu = function() {

        const toggleButton = document.querySelector('.mobile-menu-toggle');
        const mainNavWrap = document.querySelector('.main-nav-wrap');
        const siteBody = document.querySelector("body");

        if (!(toggleButton && mainNavWrap)) return;

        toggleButton.addEventListener('click', function(event) {
            event.preventDefault();
            toggleButton.classList.toggle('is-clicked');
            siteBody.classList.toggle('menu-is-open');
        });

        mainNavWrap.querySelectorAll('.main-nav a').forEach(function(link) {
            link.addEventListener("click", function() {

                // at 800px and below
                if (window.matchMedia('(max-width: 800px)').matches) {
                    toggleButton.classList.toggle('is-clicked');
                    siteBody.classList.toggle('menu-is-open');
                }
            });
        });

        window.addEventListener('resize', function() {

            // above 800px
            if (window.matchMedia('(min-width: 801px)').matches) {
                if (siteBody.classList.contains('menu-is-open')) siteBody.classList.remove('menu-is-open');
                if (toggleButton.classList.contains("is-clicked")) toggleButton.classList.remove("is-clicked");
            }
        });

    }; // end ssMobileMenu


   /* Highlight active menu link on pagescroll
    * ------------------------------------------------------ */
    const ssScrollSpy = function() {

        const sections = document.querySelectorAll(".target-section");
        if (!sections.length) return;

        window.addEventListener("scroll", navHighlight);

        function navHighlight() {
            let scrollY = window.pageYOffset;

            sections.forEach(function(current) {
                const sectionHeight = current.offsetHeight;
                const sectionTop = current.offsetTop - 50;
                const sectionId = current.getAttribute("id");

                // Guard: not all pages have all links/sections
                const link = document.querySelector('.main-nav a[href*="' + sectionId + '"]');
                if (!link || !link.parentNode) return;
                const li = link.parentNode;

                if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                    li.classList.add("current");
                } else {
                    li.classList.remove("current");
                }
            });
        }

    }; // end ssScrollSpy


   /* Animate elements if in viewport
    * ------------------------------------------------------ */
    const ssViewAnimate = function() {

        const blocks = document.querySelectorAll("[data-animate-block]");
        if (!blocks.length) return;

        window.addEventListener("scroll", viewportAnimation);

        function viewportAnimation() {

            let scrollY = window.pageYOffset;

            blocks.forEach(function(current) {

                const viewportHeight = window.innerHeight;
                const triggerTop = (current.offsetTop + (viewportHeight * .2)) - viewportHeight;
                const blockHeight = current.offsetHeight;
                const blockSpace = triggerTop + blockHeight;
                const inView = scrollY > triggerTop && scrollY <= blockSpace;
                const isAnimated = current.classList.contains("ss-animated");

                if (inView && (!isAnimated)) {
                    anime({
                        targets: current.querySelectorAll("[data-animate-el]"),
                        opacity: [0, 1],
                        translateY: [100, 0],
                        delay: anime.stagger(400, {start: 200}),
                        duration: 800,
                        easing: 'easeInOutCubic',
                        begin: function() {
                            current.classList.add("ss-animated");
                        }
                    });
                }
            });
        }

    }; // end ssViewAnimate


   /* Swiper
    * ------------------------------------------------------ */ 
    const ssSwiper = function() {

        const container = document.querySelector('.swiper-container');
        if (!container) return;

        /* eslint-disable no-unused-vars */
        const mySwiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                401: { slidesPerView: 1, spaceBetween: 20 },
                801: { slidesPerView: 2, spaceBetween: 32 },
                1201: { slidesPerView: 2, spaceBetween: 80 }
            }
         });
         /* eslint-enable no-unused-vars */

    }; // end ssSwiper


   /* Lightbox
    * ------------------------------------------------------ */
    const ssLightbox = function() {

        const folioLinks = document.querySelectorAll('.folio-list__item-link');
        if (!folioLinks.length) return;

        const modals = [];

        folioLinks.forEach(function(link) {
            let modalbox = link.getAttribute('href');
            let instance = basicLightbox.create(
                document.querySelector(modalbox),
                {
                    onShow: function(instance) {
                        document.addEventListener("keydown", function(event) {
                            event = event || window.event;
                            if (event.keyCode === 27) {
                                instance.close();
                            }
                        });
                    }
                }
            );
            modals.push(instance);
        });

        folioLinks.forEach(function(link, index) {
            link.addEventListener("click", function(event) {
                event.preventDefault();
                modals[index].show();
            });
        });

    };  // end ssLightbox


   /* Alert boxes
    * ------------------------------------------------------ */
    const ssAlertBoxes = function() {

        const boxes = document.querySelectorAll('.alert-box');
        if (!boxes.length) return;
  
        boxes.forEach(function(box){
            box.addEventListener('click', function(event) {
                if (event.target.matches(".alert-box__close")) {
                    event.stopPropagation();
                    event.target.parentElement.classList.add("hideit");

                    setTimeout(function(){
                        box.style.display = "none";
                    }, 500);
                }    
            });
        });

    }; // end ssAlertBoxes


    /* Smoothscroll (only for links targeting the current page)
    * ------------------------------------------------------ */
    // const ssMoveTo = function () {
    //     const triggers = document.querySelectorAll('.smoothscroll');
    //     if (!triggers.length || !window.MoveTo) return;

    //     const moveTo = new MoveTo({
    //         tolerance: 0,
    //         duration: 1200,
    //         easing: 'easeInOutCubic',
    //         container: window
    //     }, {
    //         easeInQuad (t,b,c,d){ t/=d; return c*t*t+b; },
    //         easeOutQuad(t,b,c,d){ t/=d; return -c*t*(t-2)+b; },
    //         easeInOutQuad(t,b,c,d){ t/=d/2; if(t<1) return c/2*t*t+b; t--; return -c/2*(t*(t-2)-1)+b; },
    //         easeInOutCubic(t,b,c,d){ t/=d/2; if(t<1) return c/2*t*t*t+b; t-=2; return c/2*(t*t*t+2)+b; }
    //     });

    //     // Normalize a URL to "origin + pathname/" (ignore hash & query)
    //     const normalize = (u) => {
    //         const url = new URL(u, location.href);
    //         // normalize trailing slash for robust comparison
    //         const path = url.pathname.replace(/\/+$/, '/') || '/';
    //         return url.origin + path;
    //     };

    //     const here = normalize(location.href);

    //     triggers.forEach((a) => {
    //         const href = a.getAttribute('href') || '';
    //         if (!href.includes('#')) return; // nothing to smooth-scroll

    //         const targetUrl = new URL(href, location.href);
    //         const samePage = normalize(targetUrl.href) === here;

    //         if (samePage) {
    //             // This is a same-page anchor → use smooth scroll
    //             moveTo.registerTrigger(a);
    //         } else {
    //             // Different page → DO NOT register with MoveTo so navigation proceeds normally
    //             // (Optional) ensure nothing else cancels it
    //             a.addEventListener('click', () => { /* allow default */ }, { capture: true });
    //         }
    //     });
    // };

    /* Smoothscroll (works for #id and /#id on the current page) */
const ssMoveTo = function () {
    const triggers = document.querySelectorAll('.smoothscroll');
    if (!triggers.length || !window.MoveTo) return;

    const moveTo = new MoveTo({
        tolerance: 0,
        duration: 1200,
        easing: 'easeInOutCubic',
        container: window
    }, {
        easeInQuad (t,b,c,d){ t/=d; return c*t*t+b; },
        easeOutQuad(t,b,c,d){ t/=d; return -c*t*(t-2)+b; },
        easeInOutQuad(t,b,c,d){ t/=d/2; if (t<1) return c/2*t*t+b; t--; return -c/2*(t*(t-2)-1)+b; },
        easeInOutCubic(t,b,c,d){ t/=d/2; if (t<1) return c/2*t*t*t+b; t-=2; return c/2*(t*t*t+2)+b; }
    });

    // Compare only origin+normalized pathname
    const normalize = (u) => {
        const url = new URL(u, location.href);
        const path = url.pathname.replace(/\/+$/, '/') || '/';
        return url.origin + path;
    };
    const here = normalize(location.href);

    triggers.forEach((a) => {
        const href = a.getAttribute('href') || '';
        if (!href.includes('#')) return;

        const targetUrl = new URL(href, location.href);
        const samePage = normalize(targetUrl.href) === here;
        const id = targetUrl.hash.slice(1);
        const el = id && document.getElementById(id);

        if (samePage && el) {
            // Smooth-scroll on the current page (works for '#id' and '/#id')
            a.addEventListener('click', function (e) {
                e.preventDefault();         // stay on page
                moveTo.move(el);            // smooth scroll
                if (location.hash !== targetUrl.hash) {
                    history.pushState(null, '', targetUrl.hash); // keep hash/back nav
                }
            });
        }
        // Different page? Do nothing here → allow normal navigation to /#id
    });
};



   /* Initialize
    * ------------------------------------------------------ */
    (function ssInit() {

        ssPreloader();
        ssMobileMenu();
        ssScrollSpy();
        ssViewAnimate();
        ssSwiper();
        ssLightbox();
        ssAlertBoxes();
        ssMoveTo();

    })();


   /* ------------------------------------------------------
    * After preloader finishes, honor incoming #hash (if any)
    * (your timeline calls scrollTo(0,0), so we scroll afterwards)
    * ------------------------------------------------------ */
    (function () {
        function preloaderGone() {
            const pre = document.querySelector('#preloader');
            return !pre || pre.style.display === 'none' || pre.style.visibility === 'hidden';
        }
        function scrollToHashIfAny() {
            if (!location.hash) return;
            const el = document.getElementById(location.hash.slice(1));
            if (el) el.scrollIntoView({ behavior: 'smooth' });
        }
        window.addEventListener('load', function () {
            (function waitForPreloader() {
                if (preloaderGone()) {
                    requestAnimationFrame(scrollToHashIfAny);
                } else {
                    setTimeout(waitForPreloader, 50);
                }
            })();
        });
    })();

})(document.documentElement);
