@extends('layouts.website.master')
@section('title', $tour['title'])
@section('meta_description', $tour['summary'])
@section('content')

@include('web.partials.page-banner', ['title' => $tour['title'], 'crumbs' => [['label' => 'Tours', 'url' => route('web.tours')]]])

<!-- Detail Page Section Start -->
<div class="sis-tour-detail-page-section section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                @include('web.partials.sidebar-list', [
                    'heading' => 'Other Tours',
                    'items' => collect($tours)->map(fn ($t) => ['label' => $t['title'], 'url' => route('web.tour', $t['slug']), 'active' => $t['slug'] === $tour['slug']])->all(),
                ])
                @include('web.partials.sidebar-contact')
            </div>
            <div class="col-lg-8">
                <div class="sisf-e-inner">
                    <div class="sis-tour-detail-page-image mb-4">
                        <div class="sis-e-image">
                            <figure class="sis-image-anime sis-reveal">
                                <img src="{{ asset($tour['image']) }}" class="w-100 sis-radius" alt="{{ $tour['title'] }}">
                            </figure>
                        </div>
                    </div>
                    <div class="vjm-facts" data-aos="fade-up">
                        <span class="vjm-fact"><i class="fa-solid fa-location-dot"></i> {{ $tour['destination'] }}</span>
                        <span class="vjm-fact"><i class="fa-regular fa-clock"></i> {{ $tour['duration'] }}</span>
                        <span class="vjm-fact"><i class="fa-solid fa-tag"></i> {{ $tour['price'] ?: 'Price on request' }}</span>
                    </div>
                    <div class="sis-tour-detail-page-content pb-4">
                        @foreach ($tour['description'] as $p)
                            <div class="sis-m-text" data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 200 }}">
                                <p>{{ $p }}</p>
                            </div>
                        @endforeach
                    </div>

                    <div class="sis-e-content--inner mb-4">
                        <div class="sisf-sis-section-title sis-section-title">
                            <h2 class="sisf-m-title sis-text-anime-style-3">Tour <span class="sisf-e-colored">Highlights</span></h2>
                        </div>
                        <div class="row">
                            @foreach (array_chunk($tour['highlights'], (int) ceil(count($tour['highlights']) / 2)) as $column)
                                <div class="col-md-6">
                                    <div class="sisf-sis-listing-items sis-page">
                                        @foreach ($column as $item)
                                            <p class="{{ $loop->last ? 'mb-0 sis-last' : 'mb-3' }}" data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 200 }}">
                                                <span class="sisf-e-colored"><i class="fa-solid fa-check"></i></span>
                                                <span>{{ $item }}</span>
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="sis-e-content--inner">
                        <div class="sisf-sis-section-title sis-section-title">
                            <h2 class="sisf-m-title sis-text-anime-style-3">What’s <span class="sisf-e-colored">Included</span></h2>
                            <div class="sisf-m-text" data-aos="fade-up" data-aos-delay="100">
                                <p>Inclusions can be adjusted. Your written quote will always confirm exactly what you are paying for.</p>
                            </div>
                        </div>
                        <div class="sisf-tour-detail-contents sis-radius pb-2 bg-white" data-aos="fade-up" data-aos-delay="300">
                            <div class="row">
                                <div class="col-md-6 pe-md-0">
                                    <div class="sisf-sis-listing-items sis-page">
                                        <div class="sis-e-title p-3"><h3>What’s Included</h3></div>
                                        @foreach ($tour['included'] as $item)
                                            <p>
                                                <span class="sisf-e-colored"><i class="fa-solid pe-3 fa-check"></i></span>
                                                <span>{{ $item }}</span>
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-6 ps-md-0">
                                    <div class="sisf-sis-listing-items sis-page border-0">
                                        <div class="sis-e-title p-3"><h3>Not Included</h3></div>
                                        @foreach ($tour['excluded'] as $item)
                                            <p>
                                                <span class="sisf-e-colored"><i class="fa-solid pe-3 fa-xmark"></i></span>
                                                <span>{{ $item }}</span>
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sis-e-content--inner mb-0">
                        <div class="sisf-sis-section-title sis-section-title">
                            <span class="sisf-m-subtitle sis-text-anime-style-3">FAQs</span>
                            <h2 class="sisf-m-title sis-text-anime-style-3">Booking <span class="sisf-e-colored">Questions</span></h2>
                        </div>
                        @include('web.partials.faq-accordion', ['faqs' => config('site.faqs')['Tours & Payments'], 'id' => 'tourFaq'])
                        <div class="sisf-m-button pt-4 d-flex flex-wrap gap-3" data-aos="fade-up">
                            <a href="{{ route('web.contact', ['tour' => $tour['slug']]) }}" class="sis-btn-default">Request a Quote<i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Detail Page Section End -->

@include('web.partials.cta', ['heading' => 'Like this trip? Get a personalised quote for your dates.'])

@endsection
