{{-- Current programmes, shown as the client's own flyers (click to enlarge). --}}
@php $flyerServices = collect(config('site.services'))->filter(fn ($s) => !empty($s['flyer'])); @endphp
@if ($flyerServices->count())
<!-- Current Programmes Section Start -->
<div class="vjm-flyers-section section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sisf-sis-section-title text-center sis-section-title">
                    <span class="sisf-m-subtitle sis-text-anime-style-3">Now Enrolling</span>
                    <h2 class="sisf-m-title sis-text-anime-style-3">Current <span class="sisf-e-colored">Programmes & Opportunities</span></h2>
                    <div class="sisf-m-text" data-aos="fade-up" data-aos-delay="100">
                        <p>Work abroad, study medicine or grow your healthcare career internationally — tap a flyer to view it full size.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($flyerServices as $s)
                <div class="col-lg-4 col-md-6">
                    <div class="vjm-flyer-card" data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 200 }}">
                        <a href="{{ asset($s['flyer']) }}" class="vjm-flyer-link">
                            <img src="{{ asset($s['flyer']) }}" alt="{{ $s['title'] }} flyer">
                        </a>
                        <div class="vjm-flyer-body">
                            <h3 class="sis-comman-text">{{ $s['title'] }}</h3>
                            <p>{{ $s['short'] }}</p>
                            <div class="d-flex">
                                <a href="{{ route('web.service', $s['slug']) }}" class="sis-btn-default">Learn More<i class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Current Programmes Section End -->
@endif
