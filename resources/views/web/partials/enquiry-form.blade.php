{{-- Real enquiry form posting to WebsiteController@sendContact. Used on the contact page and home page. --}}
@php
    $services = config('site.services');
    $prefTour = collect(config('site.tours'))->firstWhere('slug', request('tour'));
    $prefService = collect($services)->firstWhere('slug', request('service'));
@endphp
@if (session('contact_success'))
    <div class="vjm-alert vjm-alert-success"><i class="fa-solid fa-circle-check pe-2"></i>{{ session('contact_success') }}</div>
@endif
@if ($errors->any())
    <div class="vjm-alert vjm-alert-error">
        <i class="fa-solid fa-circle-exclamation pe-2"></i>Please check the form:
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form id="contactForm" class="p-0 m-0" action="{{ route('web.contact.send') }}#contact-form" method="POST">
    @csrf
    <div class="vjm-hp" aria-hidden="true">
        <label>Leave this field empty <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-col">
                    <input type="text" class="form-control mb-4 {{ $fieldClass ?? '' }}" name="name" value="{{ old('name') }}" placeholder="Full name *" required maxlength="120">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-col">
                    <input type="tel" class="form-control mb-4 {{ $fieldClass ?? '' }}" name="phone" value="{{ old('phone') }}" placeholder="Phone / WhatsApp number *" required maxlength="40">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-col">
                    <input type="email" class="form-control mb-4 {{ $fieldClass ?? '' }}" name="email" value="{{ old('email') }}" placeholder="Email address *" required maxlength="150">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-col">
                    <select class="form-select form-control mb-4 {{ $fieldClass ?? '' }}" name="service">
                        <option value="">What do you need help with?</option>
                        @foreach ($services as $s)
                            <option value="{{ $s['title'] }}" @selected(old('service', $prefService['title'] ?? ($prefTour ? 'Tours & Holiday Packages' : '')) === $s['title'])>{{ $s['title'] }}</option>
                        @endforeach
                        <option value="Other" @selected(old('service') === 'Other')>Something else</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="form-col">
                    <input type="text" class="form-control mb-4 {{ $fieldClass ?? '' }}" name="destination" value="{{ old('destination', $prefTour['destination'] ?? '') }}" placeholder="Destination" maxlength="120">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="form-col">
                    <input type="date" class="form-control mb-4 {{ $fieldClass ?? '' }}" name="travel_date" value="{{ old('travel_date') }}" aria-label="Preferred travel date">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="form-col">
                    <input type="number" min="1" max="200" class="form-control mb-4 {{ $fieldClass ?? '' }}" name="travellers" value="{{ old('travellers') }}" placeholder="No. of travellers">
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <div class="form-col position-relative">
                    <textarea class="form-control mb-4 rounded-3 {{ $fieldClass ?? '' }}" name="message" placeholder="Tell us about your plans *" rows="5" required maxlength="5000">{{ old('message', $prefTour ? 'I am interested in the "' . $prefTour['title'] . '" package. Please send me a quote.' : '') }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="sisf-m-btn pt-2 d-flex">
        <button type="submit" class="sis-btn-default">Send Message<i class="fa-solid fa-arrow-right"></i></button>
    </div>
</form>
