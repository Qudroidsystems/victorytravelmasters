{{-- Usage: @include('web.partials.faq-accordion', ['faqs' => [...], 'id' => 'faqA']) --}}
@php $accId = $id ?? 'sisf-Accordion'; @endphp
<div class="sisf-page-accordian sisf-sis-page-accordian sisf-page-bottom sis-radius bg-white overflow-hidden" data-aos="fade-up" data-aos-delay="100">
    <div class="accordion" id="{{ $accId }}">
        @foreach ($faqs as $faq)
            @php $itemId = $accId . '-' . $loop->iteration; @endphp
            <div class="accordion-item mt-0 {{ $loop->last ? 'border-0' : '' }}">
                <h3 class="accordion-header sis-comman-title">
                    <button class="accordion-button mt-0 {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $itemId }}">
                        <span>{{ $loop->iteration }}. {{ $faq['q'] }}</span>
                    </button>
                </h3>
                <div id="{{ $itemId }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#{{ $accId }}">
                    <div class="accordion-body">
                        <div class="sisf-e-content-inner">
                            <p class="mb-0 text-white">{{ $faq['a'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
