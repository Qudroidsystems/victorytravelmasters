@extends('layouts.website.master')
@section('title', 'Destinations')
@section('meta_description', 'Popular destinations planned by ' . config('site.name') . ': Dubai, Canada, Paris, Italy, the Maldives, Switzerland, Bali and Australia.')
@section('content')

@include('web.partials.page-banner', ['title' => 'Destinations'])

<!-- Destination List Section Start -->
<div class="sis-destination-section sisf-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sisf-sis-section-title text-center sis-section-title">
                    <span class="sisf-m-subtitle sis-text-anime-style-3">Where To Next?</span>
                    <h2 class="sisf-m-title sis-text-anime-style-3">Our Most <span class="sisf-e-colored">Requested Destinations</span></h2>
                    <div class="sisf-m-text" data-aos="fade-up" data-aos-delay="100">
                        <p>From shopping in Dubai to studying in Canada or honeymooning in the Maldives — we handle the visa, flights and bookings for each of these destinations and many more.</p>
                    </div>
                </div>
            </div>
            @foreach ($destinations as $destination)
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 + ($loop->index % 4) * 200 }}">
                    <div class="sisf-destination-list-item">
                        <div class="sisf-e-inner sis-radius position-relative">
                            <div class="sisf-destination-image position-relative">
                                <a href="{{ route('web.destination', $destination['slug']) }}" class="sisf-sis-page-link">
                                    <figure>
                                        <img src="{{ asset($destination['image']) }}" class="w-100 sis-radius" alt="{{ $destination['name'] }}">
                                    </figure>
                                </a>
                            </div>
                            <div class="sisf-e-content d-flex align-items-center justify-content-between">
                                <div class="sisf-sis-e-title">
                                    <h2 class="sisf-e-title sis-comman-text">
                                        <a href="{{ route('web.destination', $destination['slug']) }}">{{ $destination['name'] }}</a>
                                    </h2>
                                </div>
                                <div class="sisf-m-icon-button">
                                    <a href="{{ route('web.destination', $destination['slug']) }}" aria-label="{{ $destination['name'] }}"><i class="fa-solid fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Destination List Section End -->

@include('web.partials.cta', ['heading' => 'Dreaming of somewhere not listed here? We plan trips to almost anywhere.'])

@endsection
