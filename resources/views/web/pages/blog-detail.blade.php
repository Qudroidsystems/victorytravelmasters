@extends('layouts.website.master')
@section('title', $post['title'])
@section('meta_description', $post['excerpt'])
@section('content')

@include('web.partials.page-banner', ['title' => $post['title'], 'crumbs' => [['label' => 'Travel Guides', 'url' => route('web.blog')]]])

<!-- Page Section Start -->
<div class="sisf-page-section section">
    <div class="sisf-grid sisf-layout--template">
        <div class="sisf-grid-inner container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="sisf-blog-item-image mb-3">
                        <div class="sisf-e-media position-relative">
                            <div class="sisf-e-media-image mb-4">
                                <figure class="sis-image-anime sis-reveal">
                                    <img src="{{ asset($post['image']) }}" class="image-fluid sis-radius w-100" alt="{{ $post['title'] }}">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="sisf-blog sisf-blog-single">
                        <div class="sisf-blog-item border-0 mb-0">
                            <div class="sisf-e-inner">
                                <div class="sisf-e-content p-0">
                                    <div class="vjm-post-meta">
                                        <span><i class="fa-regular fa-calendar"></i>{{ \Carbon\Carbon::parse($post['date'])->format('F j, Y') }}</span>
                                        <span><i class="fa-regular fa-folder"></i>{{ $post['category'] }}</span>
                                        <span><i class="fa-regular fa-user"></i>{{ config('site.name') }}</span>
                                    </div>
                                    <div class="sisf-e-text" data-aos="fade-up" data-aos-delay="100">
                                        <p>{{ $post['excerpt'] }}</p>
                                    </div>
                                    <div class="sisf-detail-box position-relative mb-4" data-aos="fade-up" data-aos-delay="200">
                                        <div class="sisf-m-text text-center">
                                            <h2 class="sis-comman-text text-white">{{ $post['quote'] }}</h2>
                                        </div>
                                        <div class="quote-image">
                                            <figure><img src="{{ asset('website/images/quote.svg') }}" alt=""></figure>
                                        </div>
                                    </div>
                                    @foreach ($post['sections'] as $section)
                                        <div class="sisf-sis-section-title mb-4 sis-section-title" data-aos="fade-up">
                                            <h3 class="sisf-m-title sis-comman-text mb-2">{{ $section['h'] }}</h3>
                                            <div class="sisf-m-text">
                                                <p>{{ $section['p'] }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="sisf-e-icon-box py-4">
                            <div class="sisf-e-bottom-holder mb-4" data-aos="fade-up">
                                <div class="sisf-e-left sisf-e-info d-flex align-items-center flex-wrap gap-3">
                                    <span class="tag-links">Tags:</span>
                                    @foreach ($post['tags'] as $tag)
                                        <a href="{{ route('web.blog') }}">{{ $tag }}</a>
                                    @endforeach
                                </div>
                            </div>
                            @php $shareUrl = urlencode(url()->current()); $shareText = urlencode($post['title']); @endphp
                            <div class="sisf-bottom-social-icons d-flex align-items-center gap-3" data-aos="fade-up">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank" rel="noopener" aria-label="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://wa.me/?text={{ $shareText }}%20{{ $shareUrl }}" target="_blank" rel="noopener" aria-label="Share on WhatsApp"><i class="fab fa-whatsapp"></i></a>
                                <a href="https://x.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareText }}" target="_blank" rel="noopener" aria-label="Share on X"><i class="fab fa-x-twitter"></i></a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}" target="_blank" rel="noopener" aria-label="Share on LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="sis-contect-right bg-white p-4 sis-radius" data-aos="fade-up">
                            <h3 class="sis-comman-text mb-2">Need help with this?</h3>
                            <p class="mb-3">Our team can walk you through every step and handle the paperwork for you.</p>
                            <div class="d-flex flex-wrap gap-3">
                                <a href="{{ route('web.contact') }}" class="sis-btn-default">Talk to an Adviser<i class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
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
