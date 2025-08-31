@php
    $webSettings = \App\Models\WebSettings::first();
    $seoSettings = \App\Models\SeoSettings::first();
    $about       = \App\Models\About::first();
    $blogs       = \App\Models\Blog::all();
@endphp


<!DOCTYPE html>
{{-- <html class="no-js ss-preload" lang="en"> --}}
<html class="no-js ss-preload" lang="en" data-home="{{ url('/') }}/">


<head>
    <!-- meta basics -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- SEO defaults (overridable per-page) -->
    <meta name="description" content="@yield('seo_description', $seoSettings->description ?? '')">
    <meta name="keywords" content="@yield('seo_keywords', $seoSettings->keywords ?? '')">
    <meta name="author" content="@yield('seo_author', 'Abubakar Abdulganiyu')">
    <link rel="canonical" href="@yield('canonical', url()->current())">
    
    <title>@yield('seo_title', $seoSettings->title ?? 'Abubakar Sidiq')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    @if(!empty($webSettings?->favicon))
        <link rel="shortcut icon" type="image/ico" href="{{ asset($webSettings->favicon) }}" />
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset($webSettings->favicon) }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset($webSettings->favicon) }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset($webSettings->favicon) }}">
    @endif
    <link rel="manifest" href="site.webmanifest">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/css/frontend/styles.css', 'resources/css/frontend/vendor.css'])

    {{-- Person schema to unify your name variants + profiles --}}
    @php
        $personSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'Person',
            'name' => 'Abubakar Sidiq Abdulganiyu',
            'alternateName' => [
                'Abubakar Sidiq',
                'Abusidiq32',
                'Abusidiq32_',
                'ayoola32',
                'Abusidiq Digitals',

            ],
            'givenName' => 'Abubakar',
            'additionalName' => ['Sidiq'],
            'familyName' => 'Abdulganiyu',
            'jobTitle' => 'PHP/Laravel Developer',
            'url' => url('/'),
            'image' => asset($about->image), 
            'sameAs' => [
                'https://www.linkedin.com/in/abusidiq32/',
                'https://www.facebook.com/abusidiq32',
                'https://x.com/abusidiq32',
                'https://www.instagram.com/abusidiq32_',
            ],
        ];
    @endphp
    <script type="application/ld+json">
        {!! json_encode($personSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
    </script>


    @php
        $defaultOg = $about?->image
            ? secure_asset($about->image)
            : secure_asset('images/og-default.jpg'); // create this fallback
    @endphp

    {{-- Open Graph (profile) --}}
    <meta property="og:type" content="profile">
    <meta property="og:site_name" content="Abubakar S. Abdulganiyu">
    <meta property="og:title" content="@yield('seo_title', $seoSettings->title ?? 'Abubakar S. Abdulganiyu')">
    <meta property="og:description" content="@yield('seo_description', $seoSettings->description ?? '')">
    <meta property="og:url" content="@yield('canonical', url()->current())">
    <meta property="og:image" content="@yield('og_image', $defaultOg)">
    <meta property="og:image:secure_url" content="@yield('og_image', $defaultOg)">
    <meta property="og:image:width" content="@yield('og_image_width','1200')">
    <meta property="og:image:height" content="@yield('og_image_height','630')">
    <meta property="og:image:alt" content="@yield('og_image_alt','Abubakar Sidiq – PHP/Laravel Developer')">    
    <meta property="profile:first_name" content="Abubakar">
    <meta property="profile:last_name" content="Abdulganiyu">
    <meta property="profile:username" content="=abusidiq32">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="@yield('twitter_card','summary_large_image')">
    <meta name="twitter:title" content="@yield('seo_title', $seoSettings->title ?? 'Abubakar Sidiq Abdulganiyu')">
    <meta name="twitter:description" content="@yield('seo_description', $seoSettings->description ?? '')">
    <meta name="twitter:image" content="@yield('twitter_image', $defaultOg)">
    <meta name="twitter:site" content="@abusidiq32">
    <meta name="twitter:creator" content="@abusidiq32">


    @stack('head')

</head>

<body id="top">
	
    <!-- # preloader -->
    <div id="preloader">
        <div id="loader">
        </div>
    </div>

    <!-- Nav-Area-Start -->
    @include('frontend.layouts.navbar')

    <!-- Content-Area-Start -->
    @yield('content')

    <!-- Footer-Area-Start -->
    @include('frontend.layouts.footer')


    <!-- Java Script -->
    <script src="https://cdn.jsdelivr.net/npm/animejs@3.2.1/lib/anime.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/moveto@1.8.2/dist/moveTo.min.js" defer></script>

    
    <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    {{-- @vite(['resources/js/frontend/plugins.js', 'resources/js/frontend/main.js']) --}}

</body>

</html>
