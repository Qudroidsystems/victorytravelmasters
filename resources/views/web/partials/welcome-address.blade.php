{{--
    Welcome address from the founder, using two of the client's photos.
    @include('web.partials.welcome-address', ['short' => true])  -> first two paragraphs + link to About page
--}}
@php
    $site    = config('site');
    $welcome = $site['welcome'];
    $short   = $short ?? false;
    $paras   = $short ? array_slice($welcome['paragraphs'], 0, 2) : $welcome['paragraphs'];
@endphp
<!-- Welcome Address Section Start -->
<div class="vjm-welcome-section section" id="welcome-address">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="vjm-welcome-photos position-relative">
                    <div class="vjm-welcome-photo-main">
                        <figure class="sis-image-anime sis-reveal">
                            <img src="{{ asset($site['photos']['welcome']) }}" class="w-100" alt="{{ $site['owner']['name'] }}, {{ $site['owner']['title'] }}">
                        </figure>
                    </div>
                    <div class="vjm-welcome-photo-small" data-aos="zoom-in" data-aos-delay="400">
                        <figure>
                            <img src="{{ asset($site['photos']['portrait']) }}" class="w-100" alt="{{ $site['owner']['name'] }}">
                        </figure>
                    </div>
                    <div class="vjm-welcome-badge" data-aos="fade-up" data-aos-delay="600">
                        <span class="vjm-welcome-badge-icon"><i class="fa-solid fa-plane-departure"></i></span>
                        <div>
                            {{-- <strong>{{ $site['owner']['name'] }}</strong>
                            <span>{{ $site['owner']['title'] }}</span> --}}

                             <strong>{{ $site['owner']['name'] }}</strong>
                            <span>{{ $site['owner']['title'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="vjm-welcome-content">
                    <div class="sisf-sis-section-title sis-section-title mb-4">
                        <span class="sisf-m-subtitle sis-text-anime-style-3">Welcome Address</span>
                        <h2 class="sisf-m-title sis-text-anime-style-3">A Personal Note From <span class="sisf-e-colored">Our Founder</span></h2>
                    </div>
                    <div class="vjm-welcome-letter" data-aos="fade-up" data-aos-delay="100">
                        <span class="vjm-welcome-quote"><i class="fa-solid fa-quote-left"></i></span>
                        <p class="vjm-welcome-greeting">Dear valued traveller,</p>
                        @foreach ($paras as $p)
                            <p>{{ $p }}</p>
                        @endforeach
                        @unless ($short)
                            <p class="mb-1">{{ $welcome['closing'] }}</p>
                            <div class="vjm-signature">{{ $site['owner']['signature'] }}</div>
                            <p class="vjm-signature-name mb-0"><strong>{{ $site['owner']['name'] }}</strong><br>{{ $site['owner']['title'] }}, {{ $site['name'] }}</p>
                        @endunless
                    </div>
                    <div class="sisf-m-button pt-4 d-flex flex-wrap gap-3" data-aos="fade-up" data-aos-delay="300">
                        @if ($short)
                            <a href="{{ route('web.about') }}#welcome-address" class="sis-btn-default">Read the Full Welcome<i class="fa-solid fa-arrow-right-long"></i></a>
                        @endif
                        <a href="{{ route('web.contact') }}" class="sis-btn-default {{ $short ? 'btn-light vjm-btn-outline' : '' }}">Speak With Our Team<i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Welcome Address Section End -->
