@extends('layouts.website.master')
@section('title', 'Contact Us')
@section('meta_description', 'Contact ' . config('site.name') . ' for visa assistance, flight and hotel bookings, study abroad support and holiday packages.')
@section('content')
@php $site = config('site'); @endphp

@include('web.partials.page-banner', ['title' => 'Contact Us'])

<!-- Contact Us Section Start -->
<div class="sisf-contact-us-section section" id="contact-form">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sisf-sis-section-title text-center sis-section-title">
                    <span class="sisf-m-subtitle sis-text-anime-style-3">Get In Touch</span>
                    <h2 class="sisf-m-title sis-text-anime-style-3">Every Great Trip <span class="sisf-e-colored">Starts With</span><br> a Conversation</h2>
                    <div class="sisf-m-text" data-aos="fade-up" data-aos-delay="100">
                        <p>Call, WhatsApp, visit our office or send a message below. We usually reply within one working day.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="sisf-contact-left-part position-relative">
                    <div class="sisf-contact-left-image vjm-founder-photo vjm-contact-photo">
                        <figure class="sis-image-anime sis-reveal">
                            <img src="{{ asset($site['photos']['portrait']) }}" class="w-100" alt="{{ $site['owner']['name'] }}, {{ $site['owner']['title'] }}">
                        </figure>
                    </div>
                    <div class="sisf-contact-left-bottom" data-aos="zoom-in-left" data-aos-delay="500">
                        <div class="sisf-sis-contact-information">
                            <div class="sisf-contact-box mb-3 pb-3 d-flex align-items-center gap-3">
                                <div class="sisf-icon">
                                    <a href="tel:{{ $site['phone_link'] }}"><i class="fa-solid fa-phone-volume"></i></a>
                                </div>
                                <div class="sisf-sis-e-content">
                                    <span class="sis-title text-white d-block">Call us on</span>
                                    <a href="tel:{{ $site['phone_link'] }}" class="sis-title text-white sis-comman-text d-block">{{ $site['phone'] }}</a>
                                </div>
                            </div>
                            <div class="sisf-contact-box mb-3 pb-3 d-flex align-items-center gap-3">
                                <div class="sisf-icon">
                                    <a href="https://wa.me/{{ $site['whatsapp'] }}" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp"></i></a>
                                </div>
                                <div class="sisf-sis-e-content">
                                    <span class="sis-title text-white d-block">WhatsApp</span>
                                    <a href="https://wa.me/{{ $site['whatsapp'] }}" target="_blank" rel="noopener" class="sis-title text-white sis-comman-text d-block">Chat with us</a>
                                </div>
                            </div>
                            <div class="sisf-contact-box mb-3 pb-3 d-flex align-items-center gap-3">
                                <div class="sisf-icon">
                                    <a href="mailto:{{ $site['email'] }}"><i class="fa-regular fa-envelope"></i></a>
                                </div>
                                <div class="sisf-sis-e-content">
                                    <span class="sis-title text-white d-block">Email us</span>
                                    <a href="mailto:{{ $site['email'] }}" class="sis-title text-white sis-comman-text d-block">{{ $site['email'] }}</a>
                                </div>
                            </div>
                            <div class="sisf-contact-box d-flex align-items-center gap-3">
                                <div class="sisf-icon">
                                    <a href="#office-map"><i class="fa-solid fa-location-dot"></i></a>
                                </div>
                                <div class="sisf-sis-e-content">
                                    <span class="sis-title text-white d-block">Visit our office</span>
                                    <a href="#office-map" class="sis-title text-white sis-comman-text d-block">{{ $site['address'] }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="sis-contect-right bg-white p-4 sis-radius" data-aos="fade-up" data-aos-delay="100">
                    <div class="sisf-sis-section-title sis-section-title">
                        <h2 class="sisf-m-title sis-text-anime-style-3">Send Us a <span class="sisf-e-colored">Message</span></h2>
                        <div class="sisf-m-text">
                            <p class="mt-3">Share a few details about your plans and we will get back to you with clear next steps.</p>
                        </div>
                    </div>
                    <div class="form-section">
                        @include('web.partials.enquiry-form')
                    </div>
                    <div class="pt-4">
                        @foreach ($site['hours'] as $hour)
                            <p class="mb-1"><i class="fa-regular fa-clock sisf-e-colored pe-2"></i>{{ $hour }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Us Section End -->

<!-- Location Map Section Start -->
<div class="sis-contact-location-section pt-0 section" id="office-map">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="sis-contact-map" data-aos="fade-up" data-aos-delay="300">
                    <iframe src="https://www.google.com/maps?q={{ urlencode($site['address']) }}&output=embed" title="Office location" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Location Map Section End -->

@endsection
