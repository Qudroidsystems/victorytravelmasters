{{-- Shows only when real testimonials have been added in config/site.php --}}
@php $testimonials = config('site.testimonials', []); @endphp
@if (count($testimonials))
<!-- Testimonials Section Start -->
<div class="sis-testimonial-section section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sisf-sis-section-title text-center sis-section-title">
                    <span class="sisf-m-subtitle sis-text-anime-style-3">Client Stories</span>
                    <h2 class="sisf-m-title sis-text-anime-style-3">What Our <span class="sisf-e-colored">Travellers Say</span></h2>
                    <div class="sisf-m-text" data-aos="fade-up" data-aos-delay="100">
                        <p>Real experiences from clients we have helped with visas, studies, bookings and holidays.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="testimonial-right page" data-aos="fade-up" data-aos-delay="300">
                    <div class="sis-comman--swiper-slider sisf-testimonials-list sisf-testimonial-slider">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @foreach ($testimonials as $t)
                                    <div class="swiper-slide">
                                        <div class="sisf-e-inner sis-radius overflow-hidden position-relative mb-0">
                                            @if (!empty($t['image']))
                                                <div class="sisf-e-testimonial-image">
                                                    <figure><img src="{{ asset($t['image']) }}" class="w-100" alt="{{ $t['name'] }}"></figure>
                                                </div>
                                            @endif
                                            <div class="sisf-e-top sis-e-testimonial-content p-3">
                                                <div class="quote-left-icon mb-2">
                                                    <span><i class="fa-solid sisf-e-colored fa-quote-left"></i></span>
                                                </div>
                                                <div class="sisf-bottom-with-content">
                                                    <div class="sisf-bottom--content">
                                                        <div class="sisf-m-inner">
                                                            <div class="sisf-e-author">
                                                                <span class="sisf-e-author-name pe-1 sisf-primary-text">{{ $t['name'] }}</span>
                                                                <span class="sisf-m-divider"></span>
                                                                <span class="sisf-e-author-role ps-2 sisf-primary-text">{{ $t['location'] ?? '' }}{{ !empty($t['trip']) ? ' · ' . $t['trip'] : '' }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sisf-ratings py-2">
                                                    <div class="sisf-m-star sisf--initial">
                                                        @for ($i = 0; $i < ($t['rating'] ?? 5); $i++)<span class="star">★</span>@endfor
                                                    </div>
                                                </div>
                                                <div class="sisf-e-content-center sisf-e-discription border-0">
                                                    <p class="mb-0 sisf-primary-text">{{ $t['text'] }}</p>
                                                </div>
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
<!-- Testimonials Section End -->
@endif
