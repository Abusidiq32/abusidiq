@php
    $webSettings = \App\Models\WebSettings::first();
    $seoSettings = \App\Models\SeoSettings::first();
    $blogs = \App\Models\Blog::all();
@endphp


<!DOCTYPE html>
<html class="no-js ss-preload" lang="en">

<head>
    <!-- mobile specific metas -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="{{$seoSettings->description}}">
	<meta name="keywords" content="{{$seoSettings->keywords}}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
	<title>{{@$seoSettings->title}}</title>

	<link rel="shortcut icon" type="image/ico" href="{{asset($webSettings->favicon)}}" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/styles.css') }}">

    <!-- favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset($webSettings->favicon)}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset($webSettings->favicon)}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset($webSettings->favicon)}}">
    <link rel="manifest" href="site.webmanifest">

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
    <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

</body>

</html>
