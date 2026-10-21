    @php $site = config('site'); @endphp
    <!-- Footer Start -->
    <footer class="main-footer">
        <div class="sisf-page-footer-inner-area sisf-page-background sis-br-radius mb-3">
            <div class="sisf-page-footer-middle-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="footer-logo mb-4 pb-4" data-aos="fade-right" data-aos-delay="100">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('website/images/logo-victory.svg') }}" alt="{{ $site['name'] }}">
                                </a>
                            </div>
                            <div class="sisf-e-text-bottom">
                                <div class="sisf-m-text" data-aos="fade-up" data-aos-delay="300">
                                    <p class="text-white">{{ $site['name'] }} helps individuals, families, students and businesses travel with confidence — from visa applications and flight bookings to study abroad and unforgettable holidays.</p>
                                </div>
                            </div>
                            <div class="vjm-footer-whatsapp" data-aos="fade-up" data-aos-delay="500">
                                <a href="https://wa.me/{{ $site['whatsapp'] }}" target="_blank" rel="noopener" class="sis-btn-default">Chat with us on WhatsApp<i class="fa-brands fa-whatsapp"></i></a>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-md-6">
                            <!-- Links Start -->
                            <div class="footer-links page" data-aos="fade-up" data-aos-delay="100">
                                <h3>Quick Links</h3>
                                <ul>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('web.about') }}">About Us</a></li>
                                    <li><a href="{{ route('web.services') }}">Our Services</a></li>
                                    <li><a href="{{ route('web.tours') }}">Tour Packages</a></li>
                                    <li><a href="{{ route('web.blog') }}">Travel Guides</a></li>
                                    <li><a href="{{ route('web.faq') }}">FAQs</a></li>
                                    <li class="mb-0"><a href="{{ route('web.contact') }}">Contact Us</a></li>
                                </ul>
                            </div>
                            <!-- Links End -->
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <!-- Links Start -->
                            <div class="footer-links page" data-aos="fade-up" data-aos-delay="300">
                                <h3>Our Services</h3>
                                <ul>
                                    @foreach ($site['services'] as $service)
                                        <li class="{{ $loop->last ? 'mb-0' : '' }}"><a href="{{ route('web.service', $service['slug']) }}">{{ $service['title'] }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Links End -->
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <!-- Links Start -->
                            <div class="footer-links page mb-0" data-aos="fade-up" data-aos-delay="300">
                                <h3>Office Hours</h3>
                                <ul>
                                    @foreach ($site['hours'] as $hour)
                                        <li><span class="text-white">{{ $hour }}</span></li>
                                    @endforeach
                                    <li class="mb-0"><span class="text-white"><i class="fa-solid fa-location-dot pe-2"></i>{{ $site['address'] }}</span></li>
                                </ul>
                            </div>
                            <!-- Links End -->
                        </div>
                        <div class="col-12">
                            <div class="sisf-page-footer-middle-area-bottom">
                                <div class="row align-items-center">
                                    <div class="col-xl-6 col-lg-4">
                                        <!-- Links Start -->
                                        <div class="footer--links page d-flex align-items-center flex-wrap gap-3" data-aos="fade-right" data-aos-delay="100">
                                            <div class="sisf-e-social-title">
                                                <h3 class="text-white">Follow Us:</h3>
                                            </div>
                                            <div class="footer-social-icons-link page">
                                                <ul class="list-unstyled d-flex align-items-center gap-3 p-0 m-0">
                                                    @foreach ($site['socials'] as $network => $url)
                                                        <li class="{{ $loop->last ? 'mb-0' : '' }}"><a href="{{ $url }}" target="_blank" rel="noopener" aria-label="{{ $network }}"><i class="fa-brands fa-{{ $network }}"></i></a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Links End -->
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="sisf-sis-contact-footer-information" data-aos="fade-left" data-aos-delay="100">
                                            <div class="sisf-sis-contact-information d-flex align-items-center justify-content-end gap-4">
                                                <div class="sisf-contact-box d-flex align-items-center gap-3">
                                                    <div class="sisf-icon">
                                                        <a href="tel:{{ $site['phone_link'] }}"><i class="fa-solid fa-phone-volume"></i></a>
                                                    </div>
                                                    <div class="sisf-sis-e-content">
                                                        <span class="sis-title text-white d-block">Call us on</span>
                                                        <a href="tel:{{ $site['phone_link'] }}" class="sis-title text-white d-block">{{ $site['phone'] }}</a>
                                                    </div>
                                                </div>
                                                <div class="sisf-contact-box d-flex align-items-center ps-4 gap-3">
                                                    <div class="sisf-icon">
                                                        <a href="mailto:{{ $site['email'] }}"><i class="fa-regular fa-envelope"></i></a>
                                                    </div>
                                                    <div class="sisf-sis-e-content">
                                                        <span class="sis-title text-white d-block">Email us</span>
                                                        <a href="mailto:{{ $site['email'] }}" class="sis-title text-white d-block">{{ $site['email'] }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sisf-page-footer-bottom-area">
                <div class="container">
                    <!-- Footer Copyright Section Start -->
                    <div class="footer-copyright">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="footer-copyright-text">
                                    <p class="mb-0 text-white">&copy; {{ date('Y') }} {{ $site['name'] }}. All Rights Reserved.</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="footer-privacy-policy">
                                    <ul class="list-unstyled d-flex align-items-center justify-content-end gap-4 p-0 m-0">
                                        <li><a href="{{ route('web.faq') }}" class="text-white">FAQs</a></li>
                                        <li><a href="{{ route('web.contact') }}" class="text-white">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Copyright Section End -->
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/{{ $site['whatsapp'] }}" class="vjm-whatsapp-float" target="_blank" rel="noopener" aria-label="Chat on WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>
    <!-- Cursor Start -->
    <div class="sisf-cursor sisf-js-cursor">
        <div class="sisf-cursor-wrapper">
            <div class="sisf-cursor--follower sisf-js-follower"></div>
            <div class="sisf-cursor--label sisf-js-label"></div>
            <div class="sisf-cursor--drap sisf-js-drap"></div>
            <div class="sisf-cursor--icon sisf-js-icon"></div>
        </div>
    </div>
    <!-- Cursor End -->
    <!-- Back to Top Button Start -->
    <div class="sis-back-to-top-button">
        <button class="sis-back-to-top" id="backToTop">
            <span class="mt-1"><i class="fa fa-chevron-up"></i></span>
        </button>
    </div>
    <!-- Back to Top Button End -->
    <!-- Jquery Library File -->
    <script src="{{ asset('website/js/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap js File -->
    <script src="{{ asset('website/js/bootstrap.min.js') }}"></script>
    <!-- Validator js file -->
    <script src="{{ asset('website/js/validator.min.js') }}"></script>
    <!-- SlickNav js File -->
    <script src="{{ asset('website/js/jquery.slicknav.js') }}"></script>
    <!-- Swiper js File -->
    <script src="{{ asset('website/js/swiper-bundle.min.js') }}"></script>
    <!-- Animation On Scroll Js File -->
    <script src="{{ asset('website/js/aos.js') }}"></script>
    <!-- Counter js File -->
    <script src="{{ asset('website/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery.counterup.min.js') }}"></script>
    <!-- Magnific js File -->
    <script src="{{ asset('website/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Gsap Js File -->
    <script src="{{ asset('website/js/gsap.min.js') }}"></script>
    <!-- Cursor Js File -->
    <script src="{{ asset('website/js/magiccursor.js') }}"></script>
    <script src="{{ asset('website/js/cursor/cursor.js') }}"></script>
    <!-- Text Effect js file -->
    <script src="{{ asset('website/js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('website/js/SplitText.js') }}"></script>
    <!-- Main Custom js file -->
    <script src="{{ asset('website/js/script.js') }}"></script>
</body>

</html>
