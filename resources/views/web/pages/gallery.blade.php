@extends('layouts.website.master')
@section('title', 'Gallery')
@section('content')

@include('web.partials.page-banner', ['title' => 'Gallery'])

<!-- Page Gallery Section Start -->
<div class="sis-page-gallery-section sisf-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sisf-sis-section-title text-center sis-section-title">
                    <span class="sisf-m-subtitle sis-text-anime-style-3">Gallery</span>
                    <h2 class="sisf-m-title sis-text-anime-style-3">Moments That <span class="sisf-e-colored">Inspire Travel</span></h2>
                </div>
            </div>
        </div>
        <div class="sis-gallery-items sis-page-gallery-box">
            <div class="row">
                @foreach ($images as $image)
                    <div class="col-lg-4 col-md-6">
                        <div class="sis-gallery-item mb-4 pb-2" data-aos="fade-up" data-aos-delay="{{ 100 + ($loop->index % 3) * 200 }}">
                            <a href="{{ asset($image) }}">
                                <figure class="sis-image-anime">
                                    <img src="{{ asset($image) }}" class="w-100 sis-radius" alt="Travel gallery image {{ $loop->iteration }}">
                                </figure>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Page Gallery Section End -->

@include('web.partials.cta')

@endsection
