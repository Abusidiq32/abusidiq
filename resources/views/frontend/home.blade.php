@extends('frontend.layouts.layout')

@section('content')
    <!-- Header-Area-Start -->
    @include('frontend.sections.hero')x
    <!-- Header-Area-End -->

    <!-- About-Area-Start -->
    @include('frontend.sections.about')
    <!-- About-Area-End -->

    <!-- Portfolio-Area-Start -->
    @include('frontend.sections.portfolio')
    <!-- Portfolio-Area-End -->

    <!-- Testimonial-Area-Start -->
    @include('frontend.sections.testimonial')
    <!-- Testimonial-Area-End -->

    <!-- Blog-Area-Start -->
    @include('frontend.sections.blog')
    <!-- Blog-Area-End -->

    <!-- Contact-Area-Start -->
    @include('frontend.sections.contact')
    <!-- Contact-Area-End -->
@endsection
