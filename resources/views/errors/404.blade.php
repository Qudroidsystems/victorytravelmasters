@extends('layouts.website.master')
@section('title', 'Page Not Found')
@section('content')

@include('web.partials.page-banner', ['title' => 'Page Not Found'])

<!-- Error Page Section Start -->
<div class="sis-error-page-section section">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-12 ms-auto me-auto">
                <div class="sisf-error-page-content text-center">
                    <div class="sisf-error-page-image mb-4" data-aos="fade-up" data-aos-delay="100">
                        <figure>
                            <img src="{{ asset('website/images/error_img.png') }}" alt="Page not found">
                        </figure>
                    </div>
                    <div class="sis-section-title mb-4">
                        <h2 class="sis-text-anime-style-3 sisf-m-text mb-3">Looks like this page took a different flight</h2>
                        <p class="mt-0" data-aos="fade-up" data-aos-delay="300">The page you are looking for does not exist or may have moved.</p>
                    </div>
                    <div class="sisf-m-button d-flex justify-content-center flex-wrap gap-3" data-aos="fade-up" data-aos-delay="500">
                        <a href="{{ route('home') }}" class="sis-btn-default">Back to Home <i class="fa-solid fa-arrow-right-long"></i></a>
                        <a href="{{ route('web.contact') }}" class="sis-btn-default btn-light vjm-btn-outline">Contact Us <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Error Page Section End -->

@endsection
