<footer class="footer-three  bg-black position-relative">

    <img src="{{ asset('assets') }}/images/gradients/footer-gradient.webp" alt="footer-gradient" class="bg--gradient">
    <img src="{{ asset('assets') }}/images/shapes/element2.png" alt="element2" class="element one">
    <img src="{{ asset('assets') }}/images/shapes/element3.png" alt="element3" class="element two"> 

    <img src="{{ asset('assets') }}/images/shapes/footer-shape4.webp" alt="footer-shape4" class="position-absolute end-0 top-0">

    <!-- text slider -->
    <div class="text-slider-section overflow-hidden">
        <div class="text-slider d-flex align-items-center gap-4">
            <div class="text-slider__item flex-nowrap flex-shrink-0 flx-align gap-3">
                <span class="icon flex-shrink-0"><i class="las la-star-of-life"></i></span>
                <span class="text flex-grow-1">Web Template</span>
            </div>
            <div class="text-slider__item flex-nowrap flex-shrink-0 flx-align gap-3">
                <span class="icon flex-shrink-0"><i class="las la-star-of-life"></i></span>
                <span class="text flex-grow-1"> mobile application</span>
            </div>
            <div class="text-slider__item flex-nowrap flex-shrink-0 flx-align gap-3">
                <span class="icon flex-shrink-0"><i class="las la-star-of-life"></i></span>
                <span class="text flex-grow-1"> domain & hosting</span>
            </div>
            <div class="text-slider__item flex-nowrap flex-shrink-0 flx-align gap-3">
                <span class="icon flex-shrink-0"><i class="las la-star-of-life"></i></span>
                <span class="text flex-grow-1"> tech consultancy</span>
            </div>
            <div class="text-slider__item flex-nowrap flex-shrink-0 flx-align gap-3">
                <span class="icon flex-shrink-0"><i class="las la-star-of-life"></i></span>
                <span class="text flex-grow-1"> Our Services</span>
            </div>
            <div class="text-slider__item flex-nowrap flex-shrink-0 flx-align gap-3">
                <span class="icon flex-shrink-0"><i class="las la-star-of-life"></i></span>
                <span class="text flex-grow-1"> Our Services</span>
            </div>
        </div>
    </div>
    <!-- text slider End -->
    
    <div class="footer-inner">
        <div class="container container-two">
            <div class="row gy-5">
                <div class="col-xl-3 col-sm-6">
                    <div class="footer-widget">
                        <div class="footer-widget__logo">
                            <a href="{{ route('index') }}"> <img src="{{ asset('assets') }}/images/logo/white-logo.png" alt="logo"></a>
                        </div>
                        <p>Your gateway to digital creativity and media solutions.</p>
                        <div class="footer-widget__social">
                            <ul class="social-icon-list">
                                <li class="social-icon-list__item">
                                    <a href="https://www.facebook.com" class="social-icon-list__link flx-center" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="social-icon-list__item">
                                    <a href="https://x.com/bilikmedia_?t=QvjxaAhBMIF9IO1NdNqdRQ&s=08" class="social-icon-list__link flx-center" aria-label="Facebook"> <i class="fab fa-x"></i></a>
                                </li>
                                <li class="social-icon-list__item">
                                    <a href="https://www.linkedin.com" class="social-icon-list__link flx-center" aria-label="Linkedin"> <i class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li class="social-icon-list__item">
                                    <a href="https://www.pinterest.com" class="social-icon-list__link flx-center" aria-label="Pinterest"> <i class="fab fa-pinterest-p"></i></a>
                                </li>
                                <li class="social-icon-list__item">
                                    <a href="https://www.youtube.com/@bilik_media/" class="social-icon-list__link flx-center" aria-label="Youtube"> <i class="fab fa-youtube"></i></a>
                                </li>                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6 col-xs-6">
                    <div class="footer-widget">
                        <h5 class="footer-widget__title text-white">Useful Link</h5>
                        <ul class="footer-lists">
                            <li class="footer-lists__item"><a href="{{ route('showAllProduct') }}" class="footer-lists__link">Product </a></li>
                            <li class="footer-lists__item"><a href="{{ route('envanto.downloader') }}" class="footer-lists__link">Envato Downloader</a></li>                            
                            <li class="footer-lists__item"><a href="{{ route('freepik.downloader') }}" class="footer-lists__link">Freepik Downloader</a></li>                            
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-xs-6 ps-xl-5">
                    <div class="footer-widget">
                        <h5 class="footer-widget__title text-white">Product</h5>
                        <ul class="footer-lists">
                            <li class="footer-lists__item"><a href="{{ route('showProductByCategory', ['slug' => 'presentation-templates']) }}" class="footer-lists__link">Presentation Templates </a></li>
                            <li class="footer-lists__item"><a href="{{ route('showProductByCategory', ['slug' => 'stock-footage']) }}" class="footer-lists__link">Stock Footage</a></li>
                            <li class="footer-lists__item"><a href="{{ route('showProductByCategory', ['slug' => 'adobe-photoshop']) }}" class="footer-lists__link">Adobe Photoshop</a></li>
                            <li class="footer-lists__item"><a href="{{ route('showProductByCategory', ['slug' => 'admin-template']) }}" class="footer-lists__link">Admin Template </a></li>
                            <li class="footer-lists__item"><a href="{{ route('showProductByCategory', ['slug' => 'website-template']) }}" class="footer-lists__link">Website Template</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6">
                    <div class="footer-widget">
                        <h5 class="footer-widget__title text-white">Subscribe</h5>
                        <p class="footer-widget__desc">Subscribe our newsletter to get updated the latest news</p>
                        <form action="#" class="mt-4 subscribe-box d-flex align-items-center flex-column gap-2">
                            <input type="text" class="form-control common-input pill text-white" placeholder="Enter Mail">
                            <button type="submit" class="btn btn-main btn-lg w-100 pill">Subscribe Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

{{-- <div id="popup-ad" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); z-index: 9999; width: 80%; max-width: 600px;">
    
    <!-- Ikon X untuk menutup popup -->
    <span id="close-popup" style="position: absolute; top: 10px; right: 10px; font-size: 30px; color: #333; cursor: pointer;">&times;</span>

    <!-- Gambar Iklan yang akan membuka Google di tab baru -->
    <a href="https://bilikshopping.gumroad.com/l/pjssu" target="_blank">
        <img src="{{ asset('assets/images/ads.png') }}" alt="Advertisement" style="max-width: 100%; height: auto;">
    </a>
</div> --}}

<!-- bottom Footer -->
<div class="bottom-footer">
    <div class="container container-two">
        <div class="bottom-footer__inner flx-between gap-3">
            <p class="bottom-footer__text font-14"> Copyright &copy; 2024 Bilik Media, All rights reserved.</p>
            <div class="footer-links">
                <a href="#" class="footer-link font-14">Terms of service</a>
                <a href="#" class="footer-link font-14">Privacy Policy</a>
                <a href="#" class="footer-link font-14">cookies</a>
            </div>
        </div>
    </div>
</div>