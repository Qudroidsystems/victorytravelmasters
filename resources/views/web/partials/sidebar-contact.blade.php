<div class="sisf-sis-page-contact-bottom position-relative p-0" data-aos="fade-up" data-aos-delay="300">
    <div class="sis-service-contact-image">
        <figure class="sis-image-anime">
            <img src="{{ asset('website/images/page-contact.png') }}" class="w-100" alt="Talk to our travel team">
        </figure>
    </div>
    <div class="sis-page-contact-content">
        <div class="sis-page-contact-title mb-1">
            <div class="sis-page-contact-sub-title">
                <p class="mb-1 text-white">{{ config('site.name') }}</p>
            </div>
            <h3 class="text-white mb-3">Need Help Planning?</h3>
            <div class="sisf-m-text">
                <p class="text-white mt-3 mb-0">Speak with our team for honest advice on visas, bookings and the best way to plan your trip.</p>
            </div>
        </div>
        <div class="sisf-page-contact-inner">
            <div class="sisf-sis-contact-information pb-4">
                <div class="sisf-contact-box d-flex align-items-center gap-4">
                    <div class="sisf-icon">
                        <a href="tel:{{ config('site.phone_link') }}" class="sis-title"><i class="fa-solid fa-phone-volume"></i></a>
                    </div>
                    <div class="sisf-sis-e-content">
                        <span class="sis-title sis-title-top d-block">Have Questions?</span>
                        <a href="tel:{{ config('site.phone_link') }}" class="sis-title d-block">{{ config('site.phone') }}</a>
                        @if (config('site.phone_alt'))
                            <a href="tel:{{ config('site.phone_alt_link') }}" class="sis-title d-block">{{ config('site.phone_alt') }}</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="sisf-m-button pt-4">
                <a href="{{ route('web.contact') }}" class="sis-btn-default">Contact Us<i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
        </div>
    </div>
</div>
