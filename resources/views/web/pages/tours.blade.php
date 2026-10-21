@extends('layouts.website.master')
@section('title', 'Tour Packages')
@section('meta_description', 'Ready-made holiday packages to Dubai, the Maldives, Paris, Italy, Switzerland and Canada — fully customisable by ' . config('site.name') . '.')
@section('content')

@include('web.partials.page-banner', ['title' => 'Tour Packages'])

<!-- Our Tour List Section Start -->
<div class="sis-tours-section sisf-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sisf-sis-section-title text-center sis-section-title">
                    <span class="sisf-m-subtitle sis-text-anime-style-3">Holiday Packages</span>
                    <h2 class="sisf-m-title sis-text-anime-style-3">Ready-made Trips, <span class="sisf-e-colored">Made Just for You</span></h2>
                    <div class="sisf-m-text" data-aos="fade-up" data-aos-delay="100">
                        <p>Each package can be adjusted to your dates, budget and number of travellers. Prices depend on season and flight fares, so we send you an up-to-date quote on request.</p>
                    </div>
                </div>
            </div>
            @foreach ($tours as $tour)
                <div class="col-lg-4 col-md-6">
                    @include('web.partials.tour-card', ['tour' => $tour, 'delay' => 100 + ($loop->index % 3) * 200])
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Our Tour List Section End -->

@include('web.partials.cta', ['heading' => 'Want a trip designed around you? Ask for a tailor-made itinerary.'])

@endsection
