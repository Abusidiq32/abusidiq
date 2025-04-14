@extends('frontend.layouts.layout')
@section('content')
    <!-- Portfolio-Area-Start -->
    <section class="blog-details section-padding" style="margin-top: 160px; margin-bottom: 160px;">
        <div class="container">
            <div class="row">
                <div id="notfound">
                    <div class="notfound">
                        <div class="notfound-404">
                            <h1>Oops!</h1>
                        </div>
                        <h2>404 - Page not found</h2>
                        <p>The page you are looking for might have been removed had its name changed or is temporarily
                            unavailable.</p>
                        <a href="{{ url('/') }}">Go To Homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    <!-- Portfolio-Area-End -->
@endsection
