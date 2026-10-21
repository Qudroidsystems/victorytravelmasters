{{-- Who we are + counters. On the home page pass ['home' => true] to show a "Read more" button. --}}
@php $site = config('site'); @endphp
<!-- About Us Section Start -->
<div class="sis-about-us-section sis-page-background section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="sisf-sis-section-title sis-section-title">
                    <span class="sisf-m-subtitle sis-text-anime-style-3">Who We Are</span>
                    <h2 class="sisf-m-title sis-text-anime-style-3"><span class="sisf-e-colored">Your Trusted Partner</span> for Every Journey Abroad</h2>
                    <div class="sisf-m-text" data-aos="fade-up" data-aos-delay="100">
                        <p class="mt-3">{{ $site['name'] }} is a full-service travel agency for people who want their trip handled properly. We help individuals, families, students, churches and businesses with visa applications, flight tickets, hotel reservations, study abroad admissions and complete holiday packages.</p>
                        <p>We are not a booking website. We are a team you can call, visit and hold accountable — people who explain the rules plainly, check every document, and stay with you until you are back home.</p>
                    </div>
                </div>
                <div class="sisf-sis-listing-items">
                    <p class="mb-2" data-aos="fade-up" data-aos-delay="300">
                        <span class="sisf-e-colored"><i class="fa-solid pe-3 fa-check"></i></span>
                        <span class="sisf-e-colored">Honest, realistic advice before you spend money</span>
                    </p>
                    <p class="mb-2" data-aos="fade-up" data-aos-delay="400">
                        <span class="sisf-e-colored"><i class="fa-solid pe-3 fa-check"></i></span>
                        <span class="sisf-e-colored">Visas, flights, hotels, studies and tours under one roof</span>
                    </p>
                    <p class="mb-2" data-aos="fade-up" data-aos-delay="500">
                        <span class="sisf-e-colored"><i class="fa-solid pe-3 fa-check"></i></span>
                        <span class="sisf-e-colored">Payments only into our official company account, with receipts</span>
                    </p>
                </div>
                <div class="sisf-m-button pt-4" data-aos="fade-up" data-aos-delay="700">
                    <a href="{{ ($home ?? false) ? route('web.about') : route('web.services') }}" class="sis-btn-default">{{ ($home ?? false) ? 'More About Us' : 'Explore Our Services' }}<i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="sisf-about-images d-flex align-items-end">
                    <div class="sisf-about-image-small" data-aos="zoom-in" data-aos-delay="500">
                        <figure>
                            <img src="{{ asset('website/images/about-img2.png') }}" alt="Travellers on holiday">
                        </figure>
                    </div>
                    <div class="sisf-about-image-right">
                        <figure class="sis-reveal sis-image-anime">
                            <img src="{{ asset('website/images/about-img1.png') }}" class="w-100" alt="Travel destination">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="sisf-sis-page-counters">
            <div class="row">
                @foreach ($site['stats'] as $stat)
                    <div class="col-lg-3 col-md-6">
                        <div class="sis-counter-item d-flex align-items-center gap-4" data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 200 }}">
                            <div class="sis-e-counter-image">
                                <figure>
                                    <img src="{{ asset('website/images/counter-icon' . $loop->iteration . '.svg') }}" alt="">
                                </figure>
                            </div>
                            <div class="sis-e-content">
                                <div class="sis-counter-title">
                                    <h2 class="d-flex align-items-center mb-1">
                                        <span class="sis-counter sisf-e-colored">{{ $stat['value'] }}</span>
                                        <span class="sisf-digit-label sisf-e-colored">{{ $stat['suffix'] }}</span>
                                    </h2>
                                </div>
                                <div class="sis-counter-text">
                                    <span>{{ $stat['label'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- About Us Section End -->
