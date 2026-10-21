@extends('layouts.website.master')
@section('title', 'Visas, Flights, Study Abroad & Holidays')
@section('content')
    @php
        $heroSlides = [
            ['image' => 'website/images/slide-bg1.jpg', 'subtitle' => 'Visas · Work Permits · Study Abroad · Holidays',
             'title' => 'Your Journey Abroad Starts With the Right Guide',
             'text' => 'Honest advice, careful visa preparation and reliable bookings — so you can travel, study or holiday abroad with confidence.',
             'button' => 'Explore Our Services', 'url' => route('web.services')],
            ['image' => 'website/images/slide-bg2.jpg', 'subtitle' => 'Study Abroad · MBBS · Healthcare Programmes',
             'title' => 'From Admission Letter to Your First Day on Campus',
             'text' => 'Degrees, medicine (MBBS/MD/MS) and healthcare leadership programmes in Canada, the UK, the USA, Europe and beyond — with admission and visa support.',
             'button' => 'Study Abroad Support', 'url' => route('web.service', 'study-abroad')],
            ['image' => 'website/images/slide-bg3.jpg', 'subtitle' => 'Holidays You Will Remember',
             'title' => 'Dubai, Paris, the Maldives — Planned From Start to Finish',
             'text' => 'Flights, hotels, visas and tours in one well-organised package, with a real team to call whenever you need us.',
             'button' => 'View Tour Packages', 'url' => route('web.tours')],
        ];
    @endphp
    <!-- Hero Section Start -->
    <div class="sis-hero hero-slider sis-br-radius mt-3 sis-home-image">
        <div class="hero-slider-layout hero-slider--layout position-relative">
            <div class="swiper">
                <div class="swiper-wrapper">
                                    @foreach ($heroSlides as $slide)
                                    <div class="swiper-slide">
                        <div class="hero-slide align-items-center pb-0">
                            <div class="hero-slider-image">
                                <img src="{{ asset($slide['image'])}}" alt="{{ $slide['title'] }}">
                            </div>
                            <!-- Content Start -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-9 col-lg-6">
                                        <!-- Hero Content Start -->
                                        <div class="hero-content text-start pb-0">
                                            <!-- Hero Title Start -->
                                            <div class="sis-section-title mb-0">
                                                <span class="sisf-subtitle text-white sis-text-anime-style-2">{{ $slide['subtitle'] }}</span>
                                                <h1 class="sis-text-anime-style-2 text-start">{{ $slide['title'] }}</h1>
                                                <div class="sisf-m-text" data-aos="fade-up" data-aos-delay="300">
                                                    <p class="text-white text-start">{{ $slide['text'] }}</p>
                                                </div>
                                                <div class="button-group d-flex align-items-center flex-wrap gap-3">
                                                    <div class="sisf-m-button aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                                                        <a href="{{ $slide['url'] }}" class="sis-btn-default">{{ $slide['button'] }}<i class="fa-solid fa-arrow-right-long"></i></a>
                                                    </div>
                                                    <div class="sisf-m-button aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
                                                        <a href="{{ route('web.contact') }}" class="sis-btn-default btn-light">Talk to Us<i class="fa-solid fa-arrow-right-long"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hero Title End -->
                                        </div>
                                        <!-- Hero Content End -->
                                    </div>
                                    <div class="col-xl-3 col-lg-6"></div>
                                </div>
                            </div>
                            <!-- Content End -->
                        </div>
                    </div>
                                    @endforeach
                                </div>
                <div class="hero-pagination d-flex justify-content-center"></div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->
    @include('web.partials.about-intro', ['home' => true])

    @include('web.partials.welcome-address', ['short' => true])
    <!-- Top Destination Section Start -->
    <div class="sis-destination-section section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Title Start -->
                    <div class="sisf-sis-section-title text-center sis-section-title">
                        <span class="sisf-m-subtitle sis-text-anime-style-3">Popular Destinations</span>
                        <h2 class="sisf-m-title sis-text-anime-style-3">Where Our Clients <span class="sisf-e-colored">Love<br> to Travel</span></h2>
                        <div class="sisf-m-text" data-aos="fade-up" data-aos-delay="100">
                            <p>From shopping trips to Dubai and studies in Canada to honeymoons in the Maldives —<br> we handle the visas, flights and bookings for every one of these destinations.</p>
                        </div>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="sisf-destination-list">
                        <div class="sis-comman-swiper-slider" data-aos="fade-up" data-aos-delay="100">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    @foreach (config('site.destinations') as $destination)
                                    <div class="swiper-slide">
                                        <div class="sisf-destination-list-item">
                                            <div class="sisf-e-inner sis-radius position-relative">
                                                <div class="sisf-destination-image position-relative">
                                                    <a href="{{ route('web.destination', $destination['slug']) }}" class="sisf-sis-page-link">
                                                        <figure>
                                                            <img src="{{ asset($destination['image'])}}" class="w-100 sis-radius" alt="{{ $destination['name'] }}">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <!-- Content Start -->
                                                <div class="sisf-e-content d-flex align-items-center justify-content-between">
                                                    <div class="sisf-sis-e-title">
                                                        <h3 class="sisf-e-title">
                                                            <a href="{{ route('web.destination', $destination['slug']) }}">{{ $destination['name'] }}</a>
                                                        </h3>
                                                    </div>
                                                    <div class="sisf-m-icon-button">
                                                        <a href="{{ route('web.destination', $destination['slug']) }}"><i class="fa-solid fa-arrow-right-long"></i></a>
                                                    </div>
                                                </div>
                                                <!-- Content End -->
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="sis-comman-bottom-line-text sis-e-bottom d-flex flex-wrap gap-5">
                        <div class="sisf-m-button" data-aos="fade-up" data-aos-delay="100">
                            <a href="{{ route('web.destinations') }}" class="sis-btn-default">See All Destinations<i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                        <div class="sisf-sis-e-box">
                            <p class="mb-1" data-aos="fade-up" data-aos-delay="300">Don’t see your destination? We plan trips to almost anywhere. <a href="{{ route('web.contact') }}">Ask us</a></p>
                            <p class="mb-0" data-aos="fade-up" data-aos-delay="500">Visa advice, flights and hotels — all in one place <span class="sisf-e-colored"><i class="fa-solid fa-plane"></i></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Destination Section End -->
    <!-- Tour List Section Start -->
    <div class="sis-tour-list-section sis-br-radius position-relative">
        <div class="sis-page-list-background sis-radius">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Section Title Start -->
                        <div class="sisf-sis-section-title sis-section-title">
                            <span class="sisf-m-subtitle sis-text-anime-style-3">Our Tour Packages</span>
                            <h2 class="sisf-m-title text-white sis-text-anime-style-3"><span class="sisf-e-colored">Ready-made Holidays,</span> Tailored to You</h2>
                        </div>
                        <!-- Section Title End -->
                    </div>
                    <div class="col-lg-6">
                        <!-- Section Title Start -->
                        <div class="sisf-sis-section-title sis-section-title">
                            <div class="sisf-m-text" data-aos="fade-up" data-aos-delay="100">
                                <p class="text-white">Choose one of our curated packages and we will adjust it to your dates, budget and number of travellers. Every quote clearly shows what is included before you pay.</p>
                            </div>
                            <div class="sisf-m-button-inner d-flex justify-content-between flex-wrap">
                                <div class="sisf-m-button pt-4" data-aos="fade-up" data-aos-delay="300">
                                    <a href="{{ route('web.tours') }}" class="sis-btn-default">View All Packages<i class="fa-solid fa-arrow-right-long"></i></a>
                                </div>
                                <div class="sis-e-icon-top position-relative d-inline-block" data-aos="zoom-in" data-aos-delay="600">
                                    <div class="sis-e-icon-spin">
                                        <figure>
                                            <img src="{{ asset('website/images/icon-top.svg')}}" class="spin-img" alt="Victory Journey Masters">
                                        </figure>
                                    </div>
                                    <div class="sis-m-icon-top">
                                        <figure>
                                            <img src="{{ asset('website/images/page-comman-icon.svg')}}" alt="Victory Journey Masters">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Section Title End -->
                    </div>
                </div>
                <div class="sisf-tour-list-part">
                    <div class="row">
                        <div class="col-12">
                            <div class="sis-comman--swiper-slider" data-aos="zoom-in" data-aos-delay="300">
                                <div class="swiper">
                                    <div class="swiper-wrapper">
                                    @foreach (config('site.tours') as $tour)
                                    <div class="swiper-slide">
                                            <div class="sisf-tour-list-item sis-radius bg-white">
                                                <div class="sisf-e-inner mb-0">
                                                    <!-- Vehicle Image Start -->
                                                    <div class="sisf-tour-image position-relative">
                                                        <a href="{{ route('web.tour', $tour['slug']) }}">
                                                            <figure class="sis-image-anime">
                                                                <img src="{{ asset($tour['image'])}}" class="w-100" alt="{{ $tour['title'] }}">
                                                            </figure>
                                                        </a>
                                                        <div class="sis-tours-category">
                                                            <span>{{ $tour['destination'] }}</span>
                                                        </div>
                                                    </div>
                                                    <!-- Vehicle Image End-->
                                                    <!-- Vehicle Content Start -->
                                                    <div class="sisf-tour-content p-3">
                                                        <div class="sisf-tour-title mb-1">
                                                            <h3 class="sis-tour-item__link">
                                                                <a href="{{ route('web.tour', $tour['slug']) }}">{{ $tour['title'] }}</a>
                                                            </h3>
                                                        </div>
                                                        <div class="sisf-m-text">
                                                            <p class="mb-3">{{ $tour['summary'] }}</p>
                                                        </div>
                                                        <div class="sis-tour-item__price_wrap">
                                                            <div class="sis-tour-item__start mb-1">
                                                                <span><i class="fa-regular fa-clock pe-1"></i> {{ $tour['duration'] }}</span>
                                                            </div>
                                                            <div class="sis-tour-item__price">
                                                                <h3 class="mb-0 sisf-e-colored {{ $tour['price'] ? '' : 'vjm-price-request' }}">{{ $tour['price'] ?: 'Price on request' }}</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Vehicle Content End -->
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tour List Section End -->
    <!-- How It Work Section Start -->
    <div class="sis-how-it-work-section section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Title Start -->
                    <div class="sisf-sis-section-title text-center sis-section-title">
                        <span class="sisf-m-subtitle sis-text-anime-style-3">How it works</span>
                        <h2 class="sisf-m-title sis-text-anime-style-3">Start Your Journey in<br> <span class="sisf-e-colored">Three Simple Steps</span></h2>
                        <div class="sisf-m-text" data-aos="fade-up" data-aos-delay="100">
                            <p>Whether it is a visa, an admission or a family holiday, our process is simple, transparent<br> and built around you.</p>
                        </div>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="sisf-journey-staps">
                        <!-- Nav Tabs Button Start -->
                        <div class="nav-tabs sis-journey-stap-tab" role="tablist">
                            <div class="sis-journey-stap-type active" data-bs-toggle="tab" data-bs-target="#your-destination" role="tabpanel">
                                <div class="sisf-how-works-right-content" data-aos="fade-up" data-aos-delay="100">
                                    <div class="sisf-e-inner d-flex gap-4">
                                        <div class="sisf-e-icon">
                                            <figure>
                                                <img src="{{ asset('website/images/how-work-icon1.svg')}}" alt="Victory Journey Masters">
                                            </figure>
                                        </div>
                                        <div class="sisf-e-content">
                                            <div class="sisf-m-title mb-2">
                                                <h3 class="sisf-m-titl-inner">{{ config('site.steps.0.title') }}</h3>
                                            </div>
                                            <div class="sisf-m-text">
                                                <p class="mb-0 sisf-page-text-line">{{ config('site.steps.0.text') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sis-journey-stap-type" data-bs-toggle="tab" data-bs-target="#journey" role="tabpanel">
                                <div class="sisf-how-works-right-content" data-aos="fade-up" data-aos-delay="100">
                                    <div class="sisf-e-inner d-flex gap-4">
                                        <div class="sisf-e-icon">
                                            <figure>
                                                <img src="{{ asset('website/images/how-work-icon2.svg')}}" alt="Victory Journey Masters">
                                            </figure>
                                        </div>
                                        <div class="sisf-e-content">
                                            <div class="sisf-m-title mb-2">
                                                <h3 class="sisf-m-titl-inner">{{ config('site.steps.1.title') }}</h3>
                                            </div>
                                            <div class="sisf-m-text">
                                                <p class="mb-0 sisf-page-text-line">{{ config('site.steps.1.text') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sis-journey-stap-type pb-0" data-bs-toggle="tab" data-bs-target="#confidence" role="tabpanel">
                                <div class="sisf-how-works-right-content" data-aos="fade-up" data-aos-delay="100">
                                    <div class="sisf-e-inner d-flex gap-4">
                                        <div class="sisf-e-icon">
                                            <figure>
                                                <img src="{{ asset('website/images/how-work-icon3.svg')}}" alt="Victory Journey Masters">
                                            </figure>
                                        </div>
                                        <div class="sisf-e-content">
                                            <div class="sisf-m-title mb-2">
                                                <h3 class="sisf-m-titl-inner">{{ config('site.steps.2.title') }}</h3>
                                            </div>
                                            <div class="sisf-m-text">
                                                <p class="mb-0 sisf-page-text-line">{{ config('site.steps.2.text') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Nav Tabs Button End -->
                        <!-- Tab Contect Start-->
                        <div class="sis-journey-tab-content tab-content">
                            <!-- Your Destination Type List Start -->
                            <div id="your-destination" class="tab-pane active sis-zoom-anim">
                                <div class="sisf-e-content-on-image position-relative">
                                    <div class="sisf-how-work-image">
                                        <figure class="sis-image-anime sis-reveal">
                                            <img src="{{ asset('website/images/how-works-img.jpg')}}" class="w-100 sis-radius" alt="Victory Journey Masters">
                                        </figure>
                                    </div>
                                    <div class="sis-e-left-top-text sisf-float-left-right" data-aos="zoom-in" data-aos-delay="300">
                                        <h3>Lagos <span class="sisf-e-colored fa-solid fa-plane"></span> Dubai</h3>
                                    </div>
                                    <div class="sis-e-right-content">
                                        <div class="sisf-e-inner sis-radius bg-white p-3 sis-fade">
                                            <div class="sisf-m-inner d-flex align-items-center gap-4">
                                                <div class="sisf-icon-image">
                                                    <figure>
                                                        <img src="{{ asset('website/images/how-work-icon-left.jpg')}}" class="sis-radius" alt="Victory Journey Masters">
                                                    </figure>
                                                </div>
                                                <div class="sisf-e-content">
                                                    <div class="sisf-m-content">
                                                        <p class="mb-0">Your plan</p>
                                                    </div>
                                                    <div class="sisf-m-title">
                                                        <h3>Dubai Family Holiday</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sisf-e--inner mt-3">
                                                <div class="sis-progressbar sisf-progressbar">
                                                    <div class="sis-skills-progress-bar mb-0">
                                                        <!-- Skill Item Start -->
                                                        <div class="sis-skillbar" data-percent="45%">
                                                            <div class="sis-skill-data justify-content-start gap-1 mb-2">
                                                                <div class="sis-skill-no">45%</div>
                                                                <div class="sis-skill-title mb-0">planned</div>
                                                            </div>
                                                            <div class="sis-skill-progress">
                                                                <div class="sis-count-bar"></div>
                                                            </div>
                                                        </div>
                                                        <!-- Skill Item End -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Your Destination Type List End -->
                            <!-- Your Journey Type List Start -->
                            <div id="journey" class="tab-pane fade sis-zoom-anim">
                                <div class="sisf-e-content-on-image position-relative">
                                    <div class="sisf-how-work-image">
                                        <figure class="sis-image-anime sis-reveal">
                                            <img src="{{ asset('website/images/how-works-img1.jpg')}}" class="w-100 sis-radius" alt="Victory Journey Masters">
                                        </figure>
                                    </div>
                                    <div class="sis-e-left-top-text sisf-float-left-right p-3 rounded-4" data-aos="zoom-in" data-aos-delay="300">
                                        <h3>Tailor-made Itinerary</h3>
                                        <p class="my-1">Visa • Flights • Hotel • Tours</p>
                                        <p class="mb-0 sisf-e-colored fw-bold">Written quote before you pay</p>
                                    </div>
                                    <div class="sis-e-right-content">
                                        <div class="sisf-e-inner sisf-page sis-radius sis-fade">
                                            <div class="sisf-m-inner">
                                                <div class="sisf-icon-image">
                                                    <figure>
                                                        <img src="{{ asset('website/images/form-img.png') }}" class="sis-radius" alt="Victory Journey Masters">
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Your Journey Type List End -->
                            <!-- Confidence Type List Start -->
                            <div id="confidence" class="tab-pane fade sis-zoom-anim">
                                <div class="sisf-e-content-on-image position-relative">
                                    <div class="sisf-how-work-image">
                                        <figure class="sis-image-anime sis-reveal">
                                            <img src="{{ asset('website/images/how-works-img2.jpg')}}" class="w-100 sis-radius" alt="Victory Journey Masters">
                                        </figure>
                                    </div>
                                    <div class="sis-e-left-top-text px-3 sisf-float-left-right" data-aos="zoom-in" data-aos-delay="300">
                                        <h3><span class="sisf-e-colored pe-2 fa-solid fa-phone"></span> Support While You Travel</h3>
                                    </div>
                                    <div class="sis-e-right-content">
                                        <div class="sisf-e-inner sis-radius sis-fade">
                                            <div class="sisf-m-inner">
                                                <div class="sisf-icon-image">
                                                    <figure>
                                                        <img src="{{ asset('website/images/travel-img.png') }}" class="sis-radius" alt="Victory Journey Masters">
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Confidence Type List End -->
                        </div>
                        <!-- Tab Contect End-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="sis-comman-bottom-line-text sis-e-bottom text-center">
                        <div class="sisf-sis-e-box">
                            <p class="mb-0" data-aos="fade-up" data-aos-delay="300">Ready when you are. <a href="{{ route('web.contact') }}">Book a free consultation</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- How It Work Section End -->
    <!-- Our Services Section Start -->
    <div class="sis-our-services-section sis-br-radius sis-comman-background">
        <div class="sisf-services-background section">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-7">
                        <!-- Section Title Start -->
                        <div class="sisf-sis-section-title sis-section-title">
                            <span class="sisf-m-subtitle sis-text-anime-style-3">Our Services</span>
                            <h2 class="sisf-m-title text-white sis-text-anime-style-3"><span class="sisf-e-colored">Travel Services</span> <br>Built Around You</h2>
                            <div class="sisf-m-text" data-aos="fade-up" data-aos-delay="100">
                                <p class="text-white">One trusted team for your visa, studies, flights, hotels and holidays — <br>so nothing falls through the cracks.</p>
                            </div>
                        </div>
                        <!-- Section Title End -->
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Item Start -->
                                <div class="sisf-sis-e-service-list" data-aos="fade-up" data-aos-delay="100">
                                    <div class="sisf-e-inner">
                                        <div class="sisf-e-icon mb-4">
                                            <figure>
                                                <img src="{{ asset('website/images/service-icon1.svg')}}" alt="Victory Journey Masters">
                                            </figure>
                                        </div>
                                        <div class="sisf-e-content">
                                            <div class="sisf-m-title mb-2">
                                                <h3 class="sisf-m-titl-inner"><a class="text-white" href="{{ route('web.service', config('site.services.0.slug')) }}">{{ config('site.services.0.title') }}</a></h3>
                                            </div>
                                            <div class="sisf-m-text">
                                                <p class="text-white sis-page-text-line">{{ config('site.services.0.short') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Item End -->
                                <!-- Item Start -->
                                <div class="sisf-sis-e-service-list" data-aos="fade-up" data-aos-delay="300">
                                    <div class="sisf-e-inner">
                                        <div class="sisf-e-icon mb-4">
                                            <figure>
                                                <img src="{{ asset('website/images/service-icon2.svg')}}" alt="Victory Journey Masters">
                                            </figure>
                                        </div>
                                        <div class="sisf-e-content">
                                            <div class="sisf-m-title mb-2">
                                                <h3 class="sisf-m-titl-inner"><a class="text-white" href="{{ route('web.service', config('site.services.1.slug')) }}">{{ config('site.services.1.title') }}</a></h3>
                                            </div>
                                            <div class="sisf-m-text">
                                                <p class="text-white sis-page-text-line">{{ config('site.services.1.short') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Item End -->
                            </div>
                            <div class="col-md-6">
                                <!-- Item Start -->
                                <div class="sisf-sis-e-service-list" data-aos="fade-up" data-aos-delay="100">
                                    <div class="sisf-e-inner">
                                        <div class="sisf-e-icon mb-4">
                                            <figure>
                                                <img src="{{ asset('website/images/service-icon3.svg')}}" alt="Victory Journey Masters">
                                            </figure>
                                        </div>
                                        <div class="sisf-e-content">
                                            <div class="sisf-m-title mb-2">
                                                <h3 class="sisf-m-titl-inner"><a class="text-white" href="{{ route('web.service', config('site.services.2.slug')) }}">{{ config('site.services.2.title') }}</a></h3>
                                            </div>
                                            <div class="sisf-m-text">
                                                <p class="text-white sis-page-text-line">{{ config('site.services.2.short') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Item End -->
                                <!-- Item Start -->
                                <div class="sisf-sis-e-service-list" data-aos="fade-up" data-aos-delay="300">
                                    <div class="sisf-e-inner">
                                        <div class="sisf-e-icon mb-4">
                                            <figure>
                                                <img src="{{ asset('website/images/service-icon4.svg')}}" alt="Victory Journey Masters">
                                            </figure>
                                        </div>
                                        <div class="sisf-e-content">
                                            <div class="sisf-m-title mb-2">
                                                <h3 class="sisf-m-titl-inner"><a class="text-white" href="{{ route('web.service', config('site.services.4.slug')) }}">{{ config('site.services.4.title') }}</a></h3>
                                            </div>
                                            <div class="sisf-m-text">
                                                <p class="text-white sis-page-text-line">{{ config('site.services.4.short') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Item End -->
                            </div>
                            <div class="col-12">
                                <div class="sisf-m-button pt-2" data-aos="fade-up" data-aos-delay="500">
                                    <a href="{{ route('web.services') }}" class="sis-btn-default">View All Services<i class="fa-solid fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="sisf-service-image-right position-relative">
                            <div class="sisf-services-bottom-image" data-aos="zoom-in" data-aos-delay="500">
                                <figure>
                                    <img src="{{ asset('website/images/service-bottom-image.png') }}" alt="Victory Journey Masters">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services Section End -->

    @include('web.partials.flyers')

    <!-- What We Offer Section Start -->
    <div class="sis-what-we-offer-section section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="sisf-page-images-wrapper sis-gallery-items position-relative">
                        <!-- Image Start -->
                        <div class="sis-gallery-item-image sisf-image-inner">
                            <a href="{{ asset('website/images/what-we-offer1.png') }}">
                                <figure class="sis-image-anime sis-reveal">
                                    <img src="{{ asset('website/images/what-we-offer1.png') }}" class="w-100 sis-radius" alt="Victory Journey Masters">
                                </figure>
                            </a>
                        </div>
                        <!-- Image End -->
                        <!-- Image Start -->
                        <div class="sis-gallery-item-image sisf-image-inner sisf-m-center position-absolute">
                            <a href="{{ asset('website/images/what-we-offer2.png') }}">
                                <figure class="sis-image-anime sis-reveal">
                                    <img src="{{ asset('website/images/what-we-offer2.png') }}" class="w-100 sis-radius" alt="Victory Journey Masters">
                                </figure>
                            </a>
                        </div>
                        <!-- Image End -->
                        <!-- Image Start -->
                        <div class="sis-gallery-item-image sisf-image-inner sisf-m-end position-absolute">
                            <a href="{{ asset('website/images/what-we-offer3.png') }}">
                                <figure class="sis-image-anime sis-reveal">
                                    <img src="{{ asset('website/images/what-we-offer3.png') }}" class="w-100 sis-radius" alt="Victory Journey Masters">
                                </figure>
                            </a>
                        </div>
                        <!-- Image End -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Section Title Start -->
                    <div class="sisf-sis-section-title sis-section-title">
                        <span class="sisf-m-subtitle sis-text-anime-style-3">What We Offer</span>
                        <h2 class="sisf-m-title sis-text-anime-style-3">Trips for Every Reason <span class="sisf-e-colored"> You Travel</span></h2>
                        <div class="sisf-m-text" data-aos="fade-up" data-aos-delay="100">
                            <p class="mt-2">People travel for many reasons — to rest, to celebrate, to learn or to do business. Whatever your reason, we plan the trip around what matters most to you.</p>
                        </div>
                    </div>
                    <!-- Section Title End -->
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Item Start -->
                            <div class="sisf-sis-e-page-list" data-aos="fade-up" data-aos-delay="100">
                                <div class="sisf-e-inner">
                                    <div class="sisf-e-icon mb-3">
                                        <figure>
                                            <img src="{{ asset('website/images/what-we-offer-icon1.svg')}}" alt="Victory Journey Masters">
                                        </figure>
                                    </div>
                                    <div class="sisf-e-content">
                                        <div class="sisf-m-title mb-2">
                                            <h3 class="sisf-m-titl-inner">Family Holidays</h3>
                                        </div>
                                        <div class="sisf-m-text">
                                            <p class="sisf-page-text-line">School-break trips with family-friendly hotels, easy transfers and activities for every age.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Item End -->
                            <!-- Item Start -->
                            <div class="sisf-sis-e-page-list" data-aos="fade-up" data-aos-delay="300">
                                <div class="sisf-e-inner">
                                    <div class="sisf-e-icon mb-3">
                                        <figure>
                                            <img src="{{ asset('website/images/what-we-offer-icon2.svg')}}" alt="Victory Journey Masters">
                                        </figure>
                                    </div>
                                    <div class="sisf-e-content">
                                        <div class="sisf-m-title mb-2">
                                            <h3 class="sisf-m-titl-inner">Honeymoons & Celebrations</h3>
                                        </div>
                                        <div class="sisf-m-text">
                                            <p class="sisf-page-text-line">Romantic escapes, anniversaries and milestone birthdays with thoughtful special touches.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Item End -->
                        </div>
                        <div class="col-md-6">
                            <!-- Item Start -->
                            <div class="sisf-sis-e-page-list" data-aos="fade-up" data-aos-delay="100">
                                <div class="sisf-e-inner">
                                    <div class="sisf-e-icon mb-3">
                                        <figure>
                                            <img src="{{ asset('website/images/what-we-offer-icon3.svg')}}" alt="Victory Journey Masters">
                                        </figure>
                                    </div>
                                    <div class="sisf-e-content">
                                        <div class="sisf-m-title mb-2">
                                            <h3 class="sisf-m-titl-inner">Group & Church Trips</h3>
                                        </div>
                                        <div class="sisf-m-text">
                                            <p class="sisf-page-text-line">Coordinated visas, group fares and accommodation for associations, churches and friends.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Item End -->
                            <!-- Item Start -->
                            <div class="sisf-sis-e-page-list" data-aos="fade-up" data-aos-delay="300">
                                <div class="sisf-e-inner">
                                    <div class="sisf-e-icon mb-3">
                                        <figure>
                                            <img src="{{ asset('website/images/what-we-offer-icon4.svg')}}" alt="Victory Journey Masters">
                                        </figure>
                                    </div>
                                    <div class="sisf-e-content">
                                        <div class="sisf-m-title mb-2">
                                            <h3 class="sisf-m-titl-inner">Business & Conferences</h3>
                                        </div>
                                        <div class="sisf-m-text">
                                            <p class="sisf-page-text-line">Business visas, conference travel and well-located hotels for productive trips.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Item End -->
                        </div>
                        <div class="col-12">
                            <div class="sisf-m-button" data-aos="fade-up" data-aos-delay="500">
                                <a href="{{ route('web.about') }}" class="sis-btn-default">Discover Our Story<i class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- What We Offer Section End -->
    <!-- Experiences Section Start -->
    <div class="sis-experiences-section sis-br-radius position-relative overflow-hidden">
        <div class="sis-experiences-background">
            <div class="container">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="intro-video-box">
                            <div class="sisf-sis-back-video">
                                <img src="{{ asset('website/images/tour-bg.jpg') }}" class="bg-video w-100 h-100" style="object-fit:cover" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Section Title Start -->
                        <div class="sisf-sis-section-title text-center mb-0 sis-section-title">
                            <h2 class="sisf-m-title text-white sis-text-anime-style-3"><span class="sisf-e-colored">Your Passport</span> Is Ready.<br> Let’s Get You <span class="sisf-e-colored">Where You’re Going</span></h2>
                            <div class="sisf-m-button pt-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
                                <a href="{{ route('web.contact') }}" class="sis-btn-default">Plan Your Journey<i class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                        <!-- Section Title End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Experiences Section End -->
    @include('web.partials.testimonials')
    <!-- FAQ Section Start -->
    <div class="sis-faq-section section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 position-relative">
                    <div class="sis-e-faqs-image">
                        <figure class="sis-image-anime sis-reveal">
                            <img src="{{ asset('website/images/faqs-img.jpg')}}" class="w-100 sis-radius" alt="Victory Journey Masters">
                        </figure>
                    </div>
                    <div class="sisf-faqs-contact-part sisf-contact-left-bottom" data-aos="zoom-in-left" data-aos-delay="500">
                        <div class="sisf-e-inner sisf-float-left-right bg-white sis-radius p-4">
                            <div class="sisf-e-content">
                                <div class="sisf-m-title">
                                    <h3>Need Personal Travel Assistance?</h3>
                                </div>
                                <div class="sisf-m-text">
                                    <p>Speak with our team about visas, admissions, bookings<br> or holiday plans — we are happy to help.</p>
                                </div>
                            </div>
                            <div class="sisf-sis-contact-information">
                                <div class="sisf-contact-box mb-2 d-flex align-items-center gap-3">
                                    <div class="sisf--icon">
                                        <a href="tel:{{ config('site.phone_link') }}" class="sis-comman-text"><i class="fa-solid fa-phone-volume"></i></a>
                                    </div>
                                    <div class="sisf-sis-e-content">
                                        <a href="tel:{{ config('site.phone_link') }}" class="sis-title sis-comman-text d-block">{{ config('site.phone') }}</a>
                                    </div>
                                </div>
                                <div class="sisf-contact-box mb-2 d-flex align-items-center gap-3">
                                    <div class="sisf--icon">
                                        <a href="mailto:{{ config('site.email') }}" class="sis-comman-text"><i class="fa-regular fa-envelope"></i></a>
                                    </div>
                                    <div class="sisf-sis-e-content">
                                        <a href="mailto:{{ config('site.email') }}" class="sis-title sis-comman-text d-block">{{ config('site.email') }}</a>
                                    </div>
                                </div>
                                <div class="sisf-contact-box d-flex align-items-center gap-3">
                                    <div class="sisf--icon">
                                        <a href="#" class="sis-comman-text"><i class="fa-solid fa-clock"></i></a>
                                    </div>
                                    <div class="sisf-sis-e-content">
                                        <a href="#" class="sis-title sis-comman-text d-block">{{ config('site.hours_short') }}</a>
                                    </div>
                                </div>
                                <div class="sisf-m-button pt-4">
                                    <a href="{{ route('web.contact') }}" class="sis-btn-default">Contact Our Team<i class="fa-solid fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <!-- Section Title Start -->
                    <div class="sisf-sis-section-title sis-section-title">
                        <span class="sisf-m-subtitle sis-text-anime-style-3">FAQs</span>
                        <h2 class="sisf-m-title sis-text-anime-style-3">Frequently <span class="sisf-e-colored">Asked Questions</span></h2>
                        <div class="sisf-m-text" data-aos="fade-up" data-aos-delay="100">
                            <p>Quick answers to the questions we hear most. Visit our <a href="{{ route('web.faq') }}" class="sisf-e-colored">FAQ page</a> for more.</p>
                        </div>
                    </div>
                    <!-- Section Title End -->
                    @include('web.partials.faq-accordion', ['faqs' => [config('site.faqs')['Visas & Travel Documents'][1], config('site.faqs')['Visas & Travel Documents'][2], config('site.faqs')['Study Abroad'][0], config('site.faqs')['Flights & Hotels'][1], config('site.faqs')['Tours & Payments'][1], config('site.faqs')['Tours & Payments'][2]], 'id' => 'homeFaq'])
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ Section End -->
    <!-- Contact Us Section Start -->
    <div class="sis-contact-us-section sis-br-radius section" id="contact-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="sisf-e-content mt-5 pe-lg-4">
                        <div class="sisf-sis-section-title sis-section-title" data-aos="fade-up">
                            <span class="sisf-m-subtitle sis-text-anime-style-3">Talk To Us</span>
                            <h2 class="sisf-m-title text-white sis-text-anime-style-3">Prefer to Speak <span class="sisf-e-colored">With a Person?</span></h2>
                            <div class="sisf-m-text">
                                <p class="text-white mt-3">Call, WhatsApp or visit our office. We will listen to your plans and tell you honestly what is needed.</p>
                            </div>
                        </div>
                        <div class="sisf-sis-contact-information" data-aos="fade-up" data-aos-delay="200">
                            <div class="sisf-contact-box mb-3 pb-3 d-flex align-items-center gap-3">
                                <div class="sisf-icon"><a href="tel:{{ config('site.phone_link') }}"><i class="fa-solid fa-phone-volume"></i></a></div>
                                <div class="sisf-sis-e-content">
                                    <span class="sis-title text-white d-block">Call us on</span>
                                    <a href="tel:{{ config('site.phone_link') }}" class="sis-title text-white sis-comman-text d-block">{{ config('site.phone') }}</a>
                                </div>
                            </div>
                            <div class="sisf-contact-box mb-3 pb-3 d-flex align-items-center gap-3">
                                <div class="sisf-icon"><a href="https://wa.me/{{ config('site.whatsapp') }}" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp"></i></a></div>
                                <div class="sisf-sis-e-content">
                                    <span class="sis-title text-white d-block">WhatsApp</span>
                                    <a href="https://wa.me/{{ config('site.whatsapp') }}" target="_blank" rel="noopener" class="sis-title text-white sis-comman-text d-block">Chat with our team</a>
                                </div>
                            </div>
                            <div class="sisf-contact-box d-flex align-items-center gap-3">
                                <div class="sisf-icon"><a href="{{ route('web.contact') }}#office-map"><i class="fa-solid fa-location-dot"></i></a></div>
                                <div class="sisf-sis-e-content">
                                    <span class="sis-title text-white d-block">Visit our office</span>
                                    <a href="{{ route('web.contact') }}#office-map" class="sis-title text-white sis-comman-text d-block">{{ config('site.address') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="sis-contect-right bg-white p-4 sis-radius" data-aos="fade-up" data-aos-delay="100">
                        <!-- Setion Title Start -->
                        <div class="sisf-sis-section-title sis-section-title">
                            <span class="sisf-m-subtitle sis-text-anime-style-3">Start Your Journey</span>
                            <h2 class="sisf-m-title sis-text-anime-style-3"><span class="sisf-e-colored">Tell Us</span> Where You Want to Go</h2>
                            <div class="sisf-m-text">
                                <p>Send a few details and we will reply with clear next steps — usually within one working day.</p>
                            </div>
                        </div>
                        <!-- Setion Title End -->
                        <div class="form-section">
                            @include('web.partials.enquiry-form', ['fieldClass' => 'sis-comman-bg'])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Us Section End -->
    <!-- Letest Blog Section Start -->
    <div class="sis-letest-blog-section section">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7">
                    <!-- Section Title Start -->
                    <div class="sisf-sis-section-title sis-section-title">
                        <span class="sisf-m-subtitle sis-text-anime-style-3">Travel Guides</span>
                        <h2 class="sisf-m-title sis-text-anime-style-3">Helpful Advice Before <span class="sisf-e-colored">You Travel</span></h2>
                        <div class="button-group pt-2 d-flex align-items-center flex-wrap gap-4">
                            <div class="sisf-m-button" data-aos="fade-up" data-aos-delay="100">
                                <a href="{{ route('web.blog') }}" class="sis-btn-default">View All Guides<i class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                            <div class="sisf-m-button" data-aos="fade-up" data-aos-delay="300">
                                <a href="{{ route('web.about') }}" class="sis-btn-default btn-light">Discover Our Story<i class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Section Title End -->
                </div>
                <div class="col-lg-5">
                    <!-- Section Title Start -->
                    <div class="sisf-sis-section-title sis-section-title">
                        <div class="sisf-m-text mb-3 pb-3" data-aos="fade-up" data-aos-delay="100">
                            <p class="mt-0">Practical guides on visa applications, studying abroad, booking flights and getting the most from popular destinations — written by our team.</p>
                        </div>
                        
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>
            <div class="row">
                @foreach (array_slice(config('site.posts'), 0, 3) as $post)
                <div class="col-lg-4 col-md-6">
                    <div class="sis-letest-blog-item sis-radius bg-white p-3" data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 200 }}">
                        <div class="sisf-e-inner position-relative">
                            <div class="sisf-e-media-holder mb-3">
                                <div class="sisf-e-media">
                                    <!-- Blog Image Start -->
                                    <div class="sisf-e-media-image">
                                        <a href="{{ route('web.post', $post['slug']) }}" class="d-block">
                                            <figure>
                                                <img src="{{ asset($post['image'])}}" class="w-100" alt="{{ $post['title'] }}">
                                            </figure>
                                        </a>
                                    </div>
                                    <!-- Blog Image End -->
                                    <div class="sisf-blog-category">
                                        <a href="{{ route('web.blog') }}">{{ $post['category'] }}</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Blog Content Start -->
                            <div class="sisf-e-content">
                                <div class="sisf-e-text">
                                    <div class="sisf-e-title-wraper">
                                        <h2 class="sisf-e-title sis-comman-text entry-title">
                                            <a class="sisf-e-title-link blog-title-link" href="{{ route('web.post', $post['slug']) }}">
                                                {{ $post['title'] }}
                                            </a>
                                        </h2>
                                    </div>
                                    <div class="sisf-m-text">
                                        <p class="sisf-e-discription sisf-page-text-line mb-0">{{ $post['excerpt'] }}</p>
                                    </div>
                                    <div class="sisf-m-btn pt-4">
                                        <a href="{{ route('web.post', $post['slug']) }}" class="sis-btn-default d-inline-block">Read More <i class="fa-solid fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Blog Content End -->
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Letest Blog Section End -->
    @include('web.partials.cta')
    @endsection
