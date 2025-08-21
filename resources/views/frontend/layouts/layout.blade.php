@php
    $webSettings = \App\Models\WebSettings::first();
    $seoSettings = \App\Models\SeoSettings::first();
    $blogs = \App\Models\Blog::all();
@endphp


<!DOCTYPE html>
{{-- <html class="no-js ss-preload" lang="en"> --}}
<html class="no-js ss-preload" lang="en" data-home="{{ url('/') }}/">


<head>
    <!-- mobile specific metas -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('seo_description', $seoSettings->description ?? '')">
    <meta name="keywords" content="@yield('seo_keywords', $seoSettings->keywords ?? '')">
    <meta name="author" content="@yield('seo_author', 'Abubakar Abdulganiyu')">
    <link rel="canonical" href="@yield('canonical', url()->current())">
    
    <title>@yield('seo_title', $seoSettings->title ?? 'Abubakar Sidiq')</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" type="image/ico" href="{{asset($webSettings->favicon)}}" />

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset($webSettings->favicon)}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset($webSettings->favicon)}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset($webSettings->favicon)}}">
    <link rel="manifest" href="site.webmanifest">

    @vite(['resources/css/app.css', 'resources/css/frontend/styles.css', 'resources/css/frontend/vendor.css'])
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
    {{-- @vite(['resources/js/frontend/main.js', 'resources/js/frontend/plugins.js']) --}}

</body>

</html>
