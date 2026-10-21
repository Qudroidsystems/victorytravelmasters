@extends('layouts.website.master')
@section('title', 'Testimonials')
@section('content')

@include('web.partials.page-banner', ['title' => 'Testimonials'])

@if (count($testimonials))
    @include('web.partials.testimonials')
@else
    <!-- Empty state until real reviews are added in config/site.php -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="sisf-sis-section-title sis-section-title">
                        <span class="sisf-m-subtitle sis-text-anime-style-3">Client Stories</span>
                        <h2 class="sisf-m-title sis-text-anime-style-3">Travelled With Us? <span class="sisf-e-colored">We’d Love to Hear From You</span></h2>
                        <div class="sisf-m-text" data-aos="fade-up" data-aos-delay="100">
                            <p>Client reviews will appear here soon. If we helped you with a visa, admission, booking or holiday, please share your experience — it helps other travellers choose with confidence.</p>
                        </div>
                    </div>
                    <div class="sisf-m-button d-flex justify-content-center flex-wrap gap-3" data-aos="fade-up" data-aos-delay="300">
                        <a href="{{ route('web.contact') }}" class="sis-btn-default">Share Your Experience<i class="fa-solid fa-arrow-right-long"></i></a>
                        <a href="https://wa.me/{{ config('site.whatsapp') }}" target="_blank" rel="noopener" class="sis-btn-default btn-light vjm-btn-outline">Send via WhatsApp<i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@include('web.partials.cta')

@endsection
