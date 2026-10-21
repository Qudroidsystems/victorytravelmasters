{{-- Usage: @include('web.partials.sidebar-list', ['heading' => 'Our Services', 'items' => [['label' => '...', 'url' => '...', 'active' => false]]]) --}}
<div class="sisf-sis-page-list bg-white" data-aos="fade-up" data-aos-delay="100">
    <div class="sisf-sis-list-title">
        <h2 class="sis-comman-text text-white">{{ $heading }}</h2>
    </div>
    @foreach ($items as $item)
        <div class="sisf-sis-list-item mb-3 d-flex align-items-center justify-content-between {{ $loop->last ? 'pb-0 border-0' : '' }} {{ !empty($item['active']) ? 'vjm-active' : '' }}">
            <div class="sis-list-item-name">
                <h3><a href="{{ $item['url'] }}">{{ $item['label'] }}</a></h3>
            </div>
            <div class="sis-list-item-icon">
                <span><a href="{{ $item['url'] }}" aria-label="{{ $item['label'] }}"><i class="fa-solid fa-arrow-right-long"></i></a></span>
            </div>
        </div>
    @endforeach
</div>
