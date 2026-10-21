{{-- Usage: @include('web.partials.page-banner', ['title' => 'About Us', 'crumbs' => [['label' => 'Services', 'url' => route('web.services')]], 'image' => 'website/images/page-banner.jpg']) --}}
<!-- Banner Section Start -->
<div class="sisf-banner sis-br-radius mt-3 position-relative">
    <div class="banner-img">
        <figure>
            <img src="{{ asset($image ?? 'website/images/page-banner.jpg') }}" alt="{{ $title }}">
        </figure>
    </div>
    <div class="sisf-page-title sisf-m sisf-title--standard sisf-alignment--center">
        <div class="sisf-m-inner container">
            <div class="sisf-breadcrumbs mb-2">
                <a class="sisf-breadcrumbs-link text-white" href="{{ route('home') }}"><span>Home</span></a>
                @foreach ($crumbs ?? [] as $crumb)
                    <span class="sisf-breadcrumbs-separator text-white mx-2"><i class="fa-solid fa-chevron-right"></i></span>
                    <a class="sisf-breadcrumbs-link text-white" href="{{ $crumb['url'] }}"><span>{{ $crumb['label'] }}</span></a>
                @endforeach
                <span class="sisf-breadcrumbs-separator text-white mx-2"><i class="fa-solid fa-chevron-right"></i></span>
                <span class="sisf-breadcrumbs-current text-white">{{ $title }}</span>
            </div>
            <div class="sisf-m-content sisf-content-grid">
                <h1 class="sisf-m-title text-white sis-text-anime-style-3 entry-title">{{ $title }}</h1>
            </div>
        </div>
    </div>
</div>
<!-- Banner Section End -->
