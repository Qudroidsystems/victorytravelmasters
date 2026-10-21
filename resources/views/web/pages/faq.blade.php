@extends('layouts.website.master')
@section('title', 'Frequently Asked Questions')
@section('meta_description', 'Answers to common questions about visas, study abroad, flights, hotels, tour packages and payments at ' . config('site.name') . '.')
@section('content')

@include('web.partials.page-banner', ['title' => 'FAQs'])

<!-- FAQ Section Start -->
<div class="sisf-sis-faq-section section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                @include('web.partials.sidebar-list', [
                    'heading' => 'Topics',
                    'items' => collect(array_keys($groups))->map(fn ($g, $i) => ['label' => $g, 'url' => '#faq-group-' . ($i + 1)])->all(),
                ])
                @include('web.partials.sidebar-contact')
            </div>
            <div class="col-lg-8">
                @foreach ($groups as $group => $faqs)
                    <div class="sis-e-content--inner" id="faq-group-{{ $loop->iteration }}">
                        <div class="sisf-sis-section-title sis-section-title">
                            <h2 class="sisf-m-title sis-text-anime-style-3">{{ $group }}</h2>
                        </div>
                        @include('web.partials.faq-accordion', ['faqs' => $faqs, 'id' => 'faqGroup' . $loop->iteration])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- FAQ Section End -->

@include('web.partials.cta', ['heading' => 'Still have a question? Our team is happy to help.'])

@endsection
