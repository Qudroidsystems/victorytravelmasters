@extends('layouts.website.master')
@section('title', $destination['name'])
@section('meta_description', $destination['intro'][0])
@section('content')

@include('web.partials.page-banner', ['title' => $destination['name'], 'crumbs' => [['label' => 'Destinations', 'url' => route('web.destinations')]]])

<!-- Detail Page Section Start -->
<div class="sis-destination-detail-page-section section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                @include('web.partials.sidebar-list', [
                    'heading' => 'Other Destinations',
                    'items' => collect($destinations)->map(fn ($d) => ['label' => $d['name'], 'url' => route('web.destination', $d['slug']), 'active' => $d['slug'] === $destination['slug']])->all(),
                ])
                @include('web.partials.sidebar-contact')
            </div>
            <div class="col-lg-8">
                <div class="sisf-e-inner">
                    <div class="sis-destination-detail-page-image mb-4">
                        <div class="sis-e-image">
                            <figure class="sis-image-anime sis-reveal">
                                <img src="{{ asset($destination['image']) }}" class="w-100 sis-radius" alt="{{ $destination['name'] }}">
                            </figure>
                        </div>
                    </div>
                    <div class="vjm-facts" data-aos="fade-up">
                        <span class="vjm-fact"><i class="fa-regular fa-calendar"></i> Best time: {{ $destination['best_time'] }}</span>
                        <span class="vjm-fact"><i class="fa-solid fa-heart"></i> Ideal for: {{ $destination['ideal_for'] }}</span>
                    </div>
                    <div class="sis-destination-detail-page-content pb-4">
                        @foreach ($destination['intro'] as $p)
                            <div class="sis-m-text" data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 200 }}">
                                <p>{{ $p }}</p>
                            </div>
                        @endforeach
                    </div>

                    <div class="sis-e-content--inner mb-4">
                        <div class="sisf-sis-section-title sis-section-title">
                            <h2 class="sisf-m-title sis-text-anime-style-3">Top <span class="sisf-e-colored">Experiences</span></h2>
                            <div class="sisf-m-text" data-aos="fade-up" data-aos-delay="100">
                                <p>Highlights our clients love most in {{ $destination['name'] }}. We can include any of these in a tailor-made itinerary.</p>
                            </div>
                        </div>
                        <div class="sisf-destination-detail-contents p-4 sis-radius bg-white" data-aos="fade-up" data-aos-delay="300">
                            <div class="row">
                                @foreach (array_chunk($destination['highlights'], (int) ceil(count($destination['highlights']) / 2)) as $column)
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

                    <div class="sis-e-content--inner mb-4">
                        <div class="sisf-sis-section-title sis-section-title">
                            <h2 class="sisf-m-title sis-text-anime-style-3">Visa & <span class="sisf-e-colored">Travel Planning</span></h2>
                            <div class="sisf-m-text" data-aos="fade-up" data-aos-delay="100">
                                <p>Entry requirements depend on your passport, the purpose of your trip and current embassy rules. Speak with our team before booking non-refundable flights or hotels — we will confirm what you need and how long it takes, then prepare your application and bookings together.</p>
                            </div>
                        </div>
                    </div>

                    @if (count($tours))
                        <div class="sis-e-content--inner mb-0">
                            <div class="sisf-sis-section-title sis-section-title">
                                <h2 class="sisf-m-title sis-text-anime-style-3">Packages to <span class="sisf-e-colored">{{ $destination['name'] }}</span></h2>
                            </div>
                            <div class="row">
                                @foreach ($tours as $tour)
                                    <div class="col-md-6">
                                        @include('web.partials.tour-card', ['tour' => $tour])
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Detail Page Section End -->

@include('web.partials.cta', ['heading' => 'Ready to visit ' . $destination['name'] . '? Let’s plan it together.'])

@endsection
