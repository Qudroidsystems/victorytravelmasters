<!-- Call To Action Section Start -->
<div class="sis-explore-more-section">
    <div class="container">
        <div class="sisf-partners-content-part sis-primary-background sis-radius position-relative">
            <div class="sisf-sis-top-right-image">
                <figure>
                    <img src="{{ asset('website/images/explore-bg.png') }}" alt="">
                </figure>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="sisf-sis-section-title mb-0 ps-5 sis-section-title">
                        <span class="sisf-m-subtitle text-white sis-text-anime-style-3">Plan Smarter. Travel Easier.</span>
                        <h2 class="sisf-m-title text-white sis-text-anime-style-3">{{ $heading ?? 'Ready to start your journey? Let’s talk about your plans today.' }}</h2>
                        <div class="sisf-m-button pt-3 d-flex flex-wrap gap-3" data-aos="fade-up" data-aos-delay="100">
                            <a href="{{ route('web.contact') }}" class="sis-btn-default btn-light">Book a Consultation<i class="fa-solid fa-arrow-right-long"></i></a>
                            <a href="https://wa.me/{{ config('site.whatsapp') }}" target="_blank" rel="noopener" class="sis-btn-default btn-light">WhatsApp Us<i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="sisf-explore-right-image" data-aos="zoom-in" data-aos-delay="400">
                        <figure>
                            <img src="{{ asset('website/images/explore-img-right.png') }}" alt="">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Call To Action Section End -->
