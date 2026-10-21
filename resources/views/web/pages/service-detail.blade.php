@extends('layouts.website.master')
@section('title', $service['title'])
@section('meta_description', $service['short'])
@section('content')

@include('web.partials.page-banner', ['title' => $service['title'], 'crumbs' => [['label' => 'Services', 'url' => route('web.services')]]])

<!-- Detail Page Section Start -->
<div class="sis-service-detail-page-section section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                @include('web.partials.sidebar-list', [
                    'heading' => 'Our Services',
                    'items' => collect($services)->map(fn ($s) => ['label' => $s['title'], 'url' => route('web.service', $s['slug']), 'active' => $s['slug'] === $service['slug']])->all(),
                ])
                @include('web.partials.sidebar-contact')
            </div>
            <div class="col-lg-8">
                <div class="sisf-e-inner">
                    <div class="sis-service-detail-page-image mb-4">
                        <div class="sis-e-image">
                            <figure class="sis-image-anime sis-reveal">
                                <img src="{{ asset($service['image']) }}" class="w-100 sis-radius" alt="{{ $service['title'] }}">
                            </figure>
                        </div>
                    </div>
                    <div class="sis-service-detail-page-content pb-4">
                        @foreach ($service['intro'] as $p)
                            <div class="sis-m-text" data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 200 }}">
                                <p>{{ $p }}</p>
                            </div>
                        @endforeach
                    </div>
                    @if (!empty($service['flyer']))
                        <div class="vjm-flyer-inline mb-4" data-aos="fade-up">
                            <a href="{{ asset($service['flyer']) }}" class="vjm-flyer-link">
                                <img src="{{ asset($service['flyer']) }}" alt="{{ $service['title'] }} flyer" class="sis-radius">
                            </a>
                            <div>
                                <span class="sisf-m-subtitle">Programme Flyer</span>
                                <h3 class="sis-comman-text mt-2 mb-2">{{ $service['title'] }}</h3>
                                <p class="mb-3">Tap the flyer to view it full size, or contact us for the latest details and requirements.</p>
                                <div class="d-flex flex-wrap gap-3">
                                    <a href="{{ route('web.contact', ['service' => $service['slug']]) }}" class="sis-btn-default">Apply / Enquire<i class="fa-solid fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="sis-e-content--inner mb-4">
                        <div class="sisf-sis-section-title sis-section-title">
                            <h2 class="sisf-m-title sis-text-anime-style-3">How We <span class="sisf-e-colored">Help You</span></h2>
                        </div>
                        <div class="row">
                            @foreach ($service['features'] as $feature)
                                <div class="col-md-6">
                                    <div class="sisf-sis-e-page-list sisf-sis-detail-page-item mb-4 pb-2" data-aos="fade-up" data-aos-delay="{{ 100 + ($loop->index % 2) * 200 }}">
                                        <div class="sisf-e-inner p-4 sis-radius">
                                            <div class="sisf-e-icon sis-primary-background border-0 mb-4">
                                                <figure>
                                                    <img src="{{ asset('website/images/detail-icon' . (($loop->index % 4) + 1) . '.svg') }}" alt="">
                                                </figure>
                                            </div>
                                            <div class="sisf-e-content">
                                                <div class="sisf-m-title mb-2">
                                                    <h3 class="sisf-m-title-inner sis-page-text-line">{{ $feature['title'] }}</h3>
                                                </div>
                                                <div class="sisf-m-text">
                                                    <p class="sisf-page-text-line mb-0">{{ $feature['text'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="sis-e-content--inner mb-4">
                        <div class="sisf-sis-section-title sis-section-title">
                            <h2 class="sisf-m-title sis-text-anime-style-3">What’s <span class="sisf-e-colored">Covered</span></h2>
                        </div>
                        <div class="sisf-destination-detail-contents p-4 sis-radius bg-white" data-aos="fade-up" data-aos-delay="200">
                            <div class="row">
                                @foreach (array_chunk($service['checklist'], (int) ceil(count($service['checklist']) / 2)) as $column)
                                    <div class="col-md-6">
                                        <div class="sisf-sis-listing-items">
                                            @foreach ($column as $item)
                                                <p class="{{ $loop->last ? 'mb-0' : 'mb-2' }}">
                                                    <span class="sisf-e-colored"><i class="fa-solid pe-3 fa-check"></i></span>
                                                    <span>{{ $item }}</span>
                                                </p>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    @if (!empty($service['faqs']))
                        <div class="sis-e-content--inner mb-0">
                            <div class="sisf-sis-section-title sis-section-title">
                                <span class="sisf-m-subtitle sis-text-anime-style-3">FAQs</span>
                                <h2 class="sisf-m-title sis-text-anime-style-3">Common <span class="sisf-e-colored">Questions</span></h2>
                            </div>
                            @include('web.partials.faq-accordion', ['faqs' => $service['faqs'], 'id' => 'serviceFaq'])
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Detail Page Section End -->

@include('web.partials.cta', ['heading' => 'Ready to get started with ' . strtolower($service['title']) . '? Let’s talk.'])

@endsection
