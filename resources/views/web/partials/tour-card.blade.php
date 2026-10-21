<div class="sisf-tour-list-item sis-radius bg-white" data-aos="fade-up" data-aos-delay="{{ $delay ?? 100 }}">
    <div class="sisf-e-inner">
        <div class="sisf-tour-image position-relative">
            <a href="{{ route('web.tour', $tour['slug']) }}">
                <figure class="sis-image-anime">
                    <img src="{{ asset($tour['image']) }}" class="w-100" alt="{{ $tour['title'] }}">
                </figure>
            </a>
            <div class="sis-tours-category">
                <span>{{ $tour['destination'] }}</span>
            </div>
        </div>
        <div class="sisf-tour-content p-3">
            <div class="sisf-tour-title mb-1">
                <h2 class="sis-tour-item__link sis-comman-text sis-page-text-line">
                    <a href="{{ route('web.tour', $tour['slug']) }}">{{ $tour['title'] }}</a>
                </h2>
            </div>
            <div class="sisf-m-text">
                <p class="mb-3">{{ $tour['summary'] }}</p>
            </div>
            <div class="sis-tour-item__price_wrap">
                <div class="sis-tour-item__start mb-1">
                    <span><i class="fa-regular fa-clock pe-1"></i> {{ $tour['duration'] }}</span>
                </div>
                <div class="sis-tour-item__price">
                    @if ($tour['price'])
                        <h3 class="mb-0 sisf-e-colored">{{ $tour['price'] }}</h3>
                    @else
                        <h3 class="mb-0 sisf-e-colored vjm-price-request">Price on request</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
