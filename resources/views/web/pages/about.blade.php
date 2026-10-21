@extends('layouts.website.master')
@section('title', 'About Us')
@section('meta_description', 'Meet ' . config('site.name') . ' — a travel agency built on honest advice for visas, flights, hotels, study abroad and holidays.')
@section('content')
@php $site = config('site'); @endphp

@include('web.partials.page-banner', ['title' => 'About Us'])

@include('web.partials.about-intro')

@include('web.partials.welcome-address')

<!-- Mission & Values Section Start -->
<div class="sis-our-story-section sis-br-radius sis-comman-background section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sisf-sis-section-title text-center sis-section-title">
                    <span class="sisf-m-subtitle sis-text-anime-style-3">Our Mission</span>
                    <h2 class="sisf-m-title text-white sis-text-anime-style-3">Making International Travel<br> <span class="sisf-e-colored">Simple, Safe and Honest</span></h2>
                    <div class="sisf-m-text" data-aos="fade-up" data-aos-delay="100">
                        <p class="text-white">Our mission is to open doors for our clients — to new opportunities, new experiences and new places —<br> by giving them clear guidance, reliable bookings and genuine care at every step.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="sisf-story-inner position-relative">
                    <div class="sisf-story-image-left vjm-founder-photo">
                        <figure class="sis-image-anime sis-reveal">
                            <img src="{{ asset($site['photos']['desk']) }}" class="w-100 sis-radius" alt="{{ $site['owner']['name'] }}">
                        </figure>
                    </div>
                    <div class="sisf-story-contents sisf-float-left-right sis-primary-background rounded-3 p-4">
                        <div class="sisf-e-inner">
                            <div class="sisf-e-icon">
                                <span class="text-white fa-solid fa-plane"></span>
                            </div>
                            <div class="sisf-e-text">
                                <p class="mb-0 text-white"><strong>{{ $site['owner']['name'] }}</strong><br>{{ $site['owner']['title'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="sisf-sis-e-page-list" data-aos="fade-up" data-aos-delay="100">
                    <div class="sisf-e-inner">
                        <div class="sisf-e-icon sis-primary-background border-0 mb-4">
                            <figure>
                                <img src="{{ asset('website/images/story-icon1.svg') }}" alt="">
                            </figure>
                        </div>
                        <div class="sisf-e-content">
                            <div class="sisf-m-title mb-2">
                                <h3 class="sisf-m-titl-inner text-white">Integrity in Every Application</h3>
                            </div>
                            <div class="sisf-m-text">
                                <p class="sisf-page-text-line text-white">We never submit false documents or make promises only an embassy can keep. Truthful applications protect your travel record for the future.</p>
                            </div>
                        </div>
                        <div class="sisf-sis-listing-items">
                            <p class="mb-2">
                                <span class="sisf-e-colored"><i class="fa-solid pe-3 fa-check"></i></span>
                                <span class="text-white">Transparent fees, agreed in writing before work begins.</span>
                            </p>
                            <p class="mb-0">
                                <span class="sisf-e-colored"><i class="fa-solid pe-3 fa-check"></i></span>
                                <span class="text-white">Clear timelines and regular status updates.</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="sisf-sis-e-page-list" data-aos="fade-up" data-aos-delay="300">
                    <div class="sisf-e-inner">
                        <div class="sisf-e-icon sis-primary-background border-0 mb-4">
                            <figure>
                                <img src="{{ asset('website/images/story-icon2.svg') }}" alt="">
                            </figure>
                        </div>
                        <div class="sisf-e-content">
                            <div class="sisf-m-title mb-2">
                                <h3 class="sisf-m-titl-inner text-white">Care That Continues After Booking</h3>
                            </div>
                            <div class="sisf-m-text">
                                <p class="sisf-page-text-line text-white">Our relationship does not end when you pay. If a flight changes or something goes wrong abroad, you have a team at home ready to help.</p>
                            </div>
                        </div>
                        <div class="sisf-sis-listing-items mb-0 pb-0 border-0">
                            <p class="mb-2">
                                <span class="sisf-e-colored"><i class="fa-solid pe-3 fa-check"></i></span>
                                <span class="text-white">Direct WhatsApp and phone access to your adviser.</span>
                            </p>
                            <p class="mb-0">
                                <span class="sisf-e-colored"><i class="fa-solid pe-3 fa-check"></i></span>
                                <span class="text-white">Help with changes, cancellations and refunds.</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mission & Values Section End -->

<!-- How It Works Section Start -->
<div class="sis-services-section section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sisf-sis-section-title text-center sis-section-title">
                    <span class="sisf-m-subtitle sis-text-anime-style-3">How It Works</span>
                    <h2 class="sisf-m-title sis-text-anime-style-3">Start Your Journey in<br> <span class="sisf-e-colored">Three Simple Steps</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($site['steps'] as $step)
                <div class="col-lg-4 col-md-6">
                    <div class="sisf-sis-e-service-list" data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 200 }}">
                        <div class="sisf-e-inner bg-white p-4 sis-radius position-relative vjm-step-card">
                            <span class="vjm-step-number">0{{ $loop->iteration }}</span>
                            <div class="sisf-service-inner-top">
                                <div class="sisf-e-icon mb-4">
                                    <figure>
                                        <img src="{{ asset('website/images/how-work-icon' . $loop->iteration . '.svg') }}" alt="">
                                    </figure>
                                </div>
                                <div class="sisf-e-content">
                                    <div class="sisf-m-title mb-2">
                                        <h2 class="sisf-m-title-inner sisf-primary-text sis-comman-text">{{ $step['title'] }}</h2>
                                    </div>
                                    <div class="sisf-m-text">
                                        <p class="sisf-page-text-line mb-0">{{ $step['text'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- How It Works Section End -->

<!-- Why Choose Us Section Start -->
<div class="sis-why-choose-us-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="sisf-why-choose-inner">
                    <div class="sisf-why-choose-image-left">
                        <figure class="sis-image-anime sis-reveal">
                            <img src="{{ asset('website/images/why-choose-img.jpg') }}" class="w-100 sis-radius" alt="Travellers">
                        </figure>
                    </div>
                    <div class="sisf-why-choose-bottom-image" data-aos="zoom-in" data-aos-delay="500">
                        <figure>
                            <img src="{{ asset('website/images/service-bottom-image.png') }}" alt="">
                        </figure>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="sis-page-content-right sis-comman-background sis-radius p-4">
                    <div class="sisf-sis-section-title mb-4 sis-section-title">
                        <span class="sisf-m-subtitle sis-text-anime-style-3">Why Choose Us</span>
                        <h2 class="sisf-m-title text-white sis-text-anime-style-3">Travel With Confidence, <span class="sisf-e-colored">Not Guesswork</span></h2>
                        <div class="sisf-m-text" data-aos="fade-up" data-aos-delay="100">
                            <p class="text-white mt-3">Travel rules change often and mistakes are expensive. We keep up with the details so you do not have to.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="sisf-why-choose-image-right vjm-founder-photo">
                                <figure class="sis-image-anime sis-reveal">
                                    <img src="{{ asset($site['photos']['laptop']) }}" class="w-100 sis-radius" alt="{{ $site['owner']['name'] }} at work">
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="sisf-sis-listing-items">
                                @foreach ($site['why'] as $point)
                                    <p class="{{ $loop->last ? 'mb-0' : 'mb-2' }}" data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 200 }}">
                                        <span class="sisf-e-colored"><i class="fa-solid fa-check"></i></span>
                                        <span class="text-white">{{ $point }}</span>
                                    </p>
                                @endforeach
                            </div>
                            <div class="sisf-m-button pt-4" data-aos="fade-up" data-aos-delay="700">
                                <a href="{{ route('web.contact') }}" class="sis-btn-default">Plan Your Trip<i class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Why Choose Us Section End -->

@include('web.partials.testimonials')

<!-- FAQ Preview Section Start -->
<div class="sis-faq-section section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="sisf-sis-section-title text-center sis-section-title">
                    <span class="sisf-m-subtitle sis-text-anime-style-3">FAQs</span>
                    <h2 class="sisf-m-title sis-text-anime-style-3">Questions We <span class="sisf-e-colored">Hear Often</span></h2>
                </div>
                @include('web.partials.faq-accordion', ['faqs' => array_merge(array_slice($site['faqs']['Visas & Travel Documents'], 0, 2), array_slice($site['faqs']['Tours & Payments'], 2, 2)), 'id' => 'aboutFaq'])
                <div class="sisf-m-button pt-4 d-flex justify-content-center" data-aos="fade-up">
                    <a href="{{ route('web.faq') }}" class="sis-btn-default">See All FAQs<i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FAQ Preview Section End -->

@include('web.partials.cta')

@endsection
