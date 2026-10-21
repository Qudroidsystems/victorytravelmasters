@extends('layouts.website.master')
@section('title', 'Travel Guides')
@section('meta_description', 'Practical travel guides from ' . config('site.name') . ': visa tips, study abroad timelines, flight booking advice and destination guides.')
@section('content')

@include('web.partials.page-banner', ['title' => 'Travel Guides'])

<!-- Page Section Start -->
<div class="sisf-page-section section">
    <div class="sisf-grid sisf-layout--template">
        <div class="sisf-grid-inner container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="sisf-blog sisf--blog sisf-blog-standard-page">
                        @foreach ($posts as $post)
                            <div class="sisf-blog-item">
                                <div class="sisf-e-inner position-relative">
                                    <div class="sisf-e-media position-relative">
                                        <div class="sisf-e-media-image">
                                            <a href="{{ route('web.post', $post['slug']) }}">
                                                <figure class="sis-image-anime sis-reveal">
                                                    <img src="{{ asset($post['image']) }}" class="image-fluid sis-radius" alt="{{ $post['title'] }}">
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="sisf-e-info mb-2 sisf-info--top-holder">
                                            <div class="post-meta-list-after">
                                                <a href="{{ route('web.post', $post['slug']) }}" class="post-cat">{{ $post['category'] }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sisf-e-content p-0 d-flex align-items-center justify-content-between gap-4">
                                        <div class="sisf-e-text">
                                            <h2 class="sisf-e-title mb-2">
                                                <a class="sisf-e-title-link" href="{{ route('web.post', $post['slug']) }}">{{ $post['title'] }}</a>
                                            </h2>
                                            <p class="sisf-e-excerpt mb-0">{{ $post['excerpt'] }}</p>
                                        </div>
                                        <div class="sisf-sis-blog-bottom">
                                            <div class="sisf-e-info">
                                                <div class="sisf-e-info-icon">
                                                    <a href="{{ route('web.post', $post['slug']) }}" aria-label="Read {{ $post['title'] }}"><i class="fa-solid fa-arrow-right-long"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('web.partials.blog-sidebar')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Section End -->

@endsection
