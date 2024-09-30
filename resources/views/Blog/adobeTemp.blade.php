@extends('Index.app')
@push('header-script')   
{!! $monetagAd->code !!}     
    <style>
        .ad-banner {
            position: fixed;
            background-color: #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 14px;
            border: 1px solid #bbb;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            z-index: 1000;
        }

        /* Iklan di sebelah kiri */
        .ad-banner.left {
            width: 160px;
            height: 600px;
            top: 100px;
            left: 10px;
        }

        /* Iklan di sebelah kanan */
        .ad-banner.right {
            width: 160px;
            height: 600px;
            top: 100px;
            right: 10px;
        }

        .align-center {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }


        /* Sembunyikan iklan di layar kecil (mobile) */
        @media (max-width: 768px) {
            .ad-banner {
                display: none;
            }
        }

    </style>
@endpush
@section('content')
<!-- ======================= Blog Details Section Start ========================= -->
<section class="blog-details padding-y-120 position-relative overflow-hidden">
    <div class="container container-two">
        <!-- blog details top Start -->
        <div class="d-flex justify-content-center">
            <a href="#" id="verifydownload" class="btn btn-main d-inline-flex align-items-center gap-2 pill px-sm-5 justify-content-center"> 
                Please Verify to Continue Download
                <img src="{{ asset('assets') }}/images/icons/download-white.svg" alt="Download Icon">
            </a>            
        </div>
       
        <div class="blog-details-top mb-64">
            
            <div class="blog-details-top__info flx-align gap-3 mb-4">
                <div class="blog-details-top__thumb flx-align gap-2">
                    <img src="{{ asset('assets') }}/images/logo/favicon.png" alt="">
                    <span class="text-heading fw-500">Bilik Media</span>
                </div>
                <span class="blog-details-top__date flx-align gap-2">
                    <img src="{{ asset('assets') }}/images/icons/clock.svg" alt="">
                    25 Jan 2024
                </span>
            </div>
            <h2 class="blog-details-top__title mb-4 text-capitalize">Top 10 Best Website Templates at Bilik Media</h2> 
            <p class="blog-details-top__desc">
                Choosing the right website template is crucial for creating a professional and visually appealing website. At Bilik Media, we offer a wide range of high-quality website templates suitable for various business needs and projects. Below are the 10 best website templates that you can find on Bilik Media.
            </p>
        </div>
        <div class="row gy-4">
            <div class="col-lg-8 pe-lg-5">
                {!! $nativeAd->code !!}
                <!-- blog details content Start -->
                <div class="blog-details-content">
                    <div class="blog-details-content__thumb mb-32">
                        <img src="{{ asset('uploads/products/' . $featuredProduct->image) }}" alt="{{$featuredProduct->title}}">
                    </div>
                 
                    <p class="blog-details-content__desc mb-40">
                        Each template has been carefully designed to provide flexibility, creativity, and functionality. Whether you're creating a business website, a portfolio, or an e-commerce platform, you'll find a template that suits your needs perfectly.
                    </p>

                    <div class="row gy-4 mb-4">
                        @if($products->isNotEmpty())
                            @foreach($products as $product)
                                <div class="col-lg-4">
                                    <div class="product-item">
                                        <div class="product-item__thumb">
                                            <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->title }}">
                                        </div>
                                        <div class="product-item__info">
                                            <h4 class="product-item__title">{{ $product->title }}</h4>                                            
                                            <a href="{{ route('generate.download.link', $product->id) }}" class="btn btn-outline-light btn-sm pill mb-3">Download</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No products found under the "Website Template" category.</p>
                        @endif
                    </div>
                    {!! $bannerAd->code !!}
                    <h5 class="blog-details-content__title mb-3">Why Choose Bilik Media Templates?</h5>
                    <p class="blog-details-content__desc mb-32">
                        At Bilik Media, our templates are designed with both creativity and functionality in mind. We offer modern, responsive, and highly customizable templates that can be easily adapted to suit different types of projects.
                    </p>
                    <p class="blog-details-content__desc mb-24">
                        Whether you're building a corporate website, a personal portfolio, or an online store, you'll find templates that offer cutting-edge design, seamless performance, and user-friendly customization options.
                    </p>
        
                    <!-- Features List -->
                    <ul class="product-list mb-40">
                        <li class="product-list__item font-18 fw-500 text-heading">Responsive and mobile-friendly designs</li>
                        <li class="product-list__item font-18 fw-500 text-heading">Easy to customize without coding skills</li>
                        <li class="product-list__item font-18 fw-500 text-heading">Modern UI/UX elements</li>
                        <li class="product-list__item font-18 fw-500 text-heading">SEO-friendly and optimized for performance</li>
                    </ul>
        
                    <!-- Quote Text Start -->
                    <div class="quote-text mb-40">
                        <img src="{{ asset('assets/images/icons/quote-icon.svg') }}" alt="quote-icon" class="quote-text__icon">
                        <p class="quote-text__desc mb-3 font-20 fw-500 text-heading">“These templates are not only beautifully designed but also come with exceptional functionality that makes them a go-to choice for any website project.”</p>
                        <h6 class="quote-text__name">Bilik Media</h6>
                    </div>
                    <!-- Quote Text Ebd -->
                    
                    <h5 class="blog-details-content__title mb-3">Ready to Get Started?</h5>
                    <p class="blog-details-content__desc mb-40">
                        Explore our full collection of website templates at Bilik Media and find the perfect fit for your project. Get started today and bring your website vision to life with our beautifully crafted templates.
                    </p>
                    {!! $bannerAd->code !!}
                
                    <div class="flx-between gap-2 mb-40 mt-40">
                        <div class="post-tag flx-align gap-3">
                            <span class="post-tag__text text-heading fw-500">Post Tags: </span>
                            <ul class="post-tag__list flx-align gap-2">
                                <li class="post-tag__item">
                                    <a href="#" class="post-tag__link font-14 text-heading pill fw-500">Templates</a>
                                </li>
                                <li class="post-tag__item">
                                    <a href="#" class="post-tag__link font-14 text-heading pill fw-500">Design</a>
                                </li>
                                <li class="post-tag__item">
                                    <a href="#" class="post-tag__link font-14 text-heading pill fw-500">Web Development</a>
                                </li>
                            </ul>
                        </div>
                      
                    </div> 
                </div>
            </div>
            <div class="col-lg-4">
               
                <div class="common-sidebar-wrapper">
                    <div class="common-sidebar p-0">
                        <form action="#" autocomplete="off">
                            <div class="search-box w-100">
                                <input type="text" class="common-input border-0" placeholder="Type here...">
                                <button type="submit" class="icon line-height-1 rounded-icon white-version">
                                    <img src="{{ asset('assets') }}/images/icons/search-dark.svg" alt="search">
                                </button>
                                <button type="submit" class="icon line-height-1 rounded-icon dark-version">
                                    <img src="{{ asset('assets') }}/images/icons/search-dark-white.svg" alt="search">
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="common-sidebar">
                        <h6 class="common-sidebar__title"> Sponsor </h6>
                        {!! $petakAd->code !!}
                    </div>

                    <div class="common-sidebar">
                        <h6 class="common-sidebar__title"> Sponsor </h6>        
                        {!! $besarAd->code !!}            
                    </div>

                    <div class="common-sidebar">
                        <h6 class="common-sidebar__title"> Sponsor </h6>
                        {!! $petakAd->code !!}
                    </div>

                </div>
            </div>
        </div>
       
        <a href=" {{$product->url_download}}" id="continueDownload" style="display:none" class="btn btn-primary align-center"> 
            Continue Download
            <img src="{{ asset('assets') }}/images/icons/download-white.svg" alt="Download Icon">
        </a>      
       
    </div>
</section>
<div class="ad-banner left">
    {!! $sideAd->code !!}    
</div>

<div class="ad-banner right">
    {!! $sideAd->code !!}
</div>
@endsection

@push('footer-script')
<script>
   let countdown = 10; // Set countdown time (in seconds)
const verifyBtn = document.getElementById('verifydownload');
const continueDownloadBtn = document.getElementById('continueDownload');

// Function to handle countdown
function startCountdown() {
    verifyBtn.addEventListener('click', function(e) {
        e.preventDefault(); // Prevent default link behavior

        // Start countdown and disable the verify button
        verifyBtn.innerHTML = `Waiting ${countdown} seconds`;
        verifyBtn.style.pointerEvents = "none"; // Disable further clicks during countdown

        // Start the countdown
        const timer = setInterval(function() {
            if (countdown > 0) {
                verifyBtn.innerHTML = `Waiting ${countdown} seconds`; // Update countdown text
                countdown--;
            } else {
                clearInterval(timer); // Stop the timer
                verifyBtn.innerHTML = "Scroll down to continue download"; // Update the verify button text
                continueDownloadBtn.style.display = 'block'; // Show "Continue Download" button
            }
        }, 1000); // Countdown interval set to 1 second (1000 ms)
    });
}

// Event listener for the "Continue Download" button
continueDownloadBtn.addEventListener('click', function(e) {
    e.preventDefault(); // Prevent default behavior

    // Open the download link in a new tab
    window.open(this.href, '_blank');

    // Redirect the current page to the desired URL
    window.location.href = "https://noohapou.com/4/6533224";
});

// AdBlock detection (optional)
function adBlockDetected() {
    verifyBtn.innerHTML = "AdBlock detected. Please disable AdBlock to continue.";
    verifyBtn.classList.add("disabled");
    verifyBtn.style.pointerEvents = "none"; // Disable the button if AdBlock is detected
}

// Example function when no AdBlock is detected
function adBlockNotDetected() {
    startCountdown(); // Call the function to start the countdown
}

// Detect AdBlock
(function() {
    var bait = document.createElement('iframe');
    bait.style = 'width: 1px; height: 1px; position: absolute; left: -9999px; border: none;';
    bait.src = "https://ads.fakeurl.com"; // Fake ad URL for detection
    document.body.appendChild(bait);

    setTimeout(function() {
        if (!bait || bait.offsetParent === null || bait.offsetHeight === 0 || bait.offsetWidth === 0) {
            adBlockDetected(); // If iframe is blocked, AdBlock is detected
        } else {
            adBlockNotDetected(); // If iframe is not blocked, proceed with countdown
        }
        document.body.removeChild(bait); // Remove the iframe after detection
    }, 100);
})();

</script>
@endpush