@extends('layouts.website.master')
@section('title', 'Our Services')
@section('meta_description', 'Visa assistance, study abroad, flight booking, hotel reservations, holiday packages and honeymoons from ' . config('site.name') . '.')
@section('content')

@include('web.partials.page-banner', ['title' => 'Our Services'])

<!-- Intro Start -->
<div class="sis-services-section sisf-section pb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sisf-sis-section-title text-center sis-section-title">
                    <span class="sisf-m-subtitle sis-text-anime-style-3">What We Do</span>
                    <h2 class="sisf-m-title sis-text-anime-style-3">Everything You Need to <span class="sisf-e-colored">Travel Well</span></h2>
                    <div class="sisf-m-text" data-aos="fade-up" data-aos-delay="100">
                        <p>Choose a single service or let us handle your whole trip — from visa paperwork to the moment you land back home.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Intro End -->

<!-- Our Services List Section Start -->
<div class="sis-services-section sisf-section">
    <div class="container">
        <div class="row">
            @foreach ($services as $service)
                <div class="col-lg-4 col-md-6">
                    <div class="sisf-sis-e-service-list" data-aos="fade-up" data-aos-delay="{{ 100 + ($loop->index % 3) * 200 }}">
                        <div class="sisf-e-inner bg-white p-4 sis-radius">
                            <div class="sisf-service-inner-top">
                                <div class="sisf-e-icon mb-4">
                                    <figure>
                                        <img src="{{ asset($service['icon']) }}" alt="">
                                    </figure>
                                </div>
                                <div class="sisf-e-content">
                                    <div class="sisf-m-title mb-2">
                                        <h2 class="sisf-m-title-inner sisf-primary-text sis-comman-text">
                                            <a href="{{ route('web.service', $service['slug']) }}" class="sisf-page-link">{{ $service['title'] }}</a>
                                        </h2>
                                    </div>
                                    <div class="sisf-m-text">
                                        <p class="sisf-page-text-line mb-0">{{ $service['short'] }}</p>
                                    </div>
                                    <div class="sis-services-category">
                                        <span class="sis-services-category__item">{{ $service['tag'] }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="sisf-service-inner-bottom">
                                <div class="sisf-m-button">
                                    <a href="{{ route('web.service', $service['slug']) }}" class="sis-btn-default">View Service<i class="fa-solid fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Our Services List Section End -->

@include('web.partials.cta', ['heading' => 'Not sure which service you need? Tell us your plans and we will guide you.'])

@endsection
