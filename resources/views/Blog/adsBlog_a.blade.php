@extends('Index.app')
@push('header-script')   
{!! $monetagAd->coda !!}     
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
    <section class="blog-details padding-y-120 position-relative overflow-hidden">
        <div class="container container-two">
            <div class="d-flex justify-content-center">
                {!! $bannerAd->coda !!}
            </div>
            <div class="d-flex justify-content-center">
                <a href="#" id="verifydownload" class="btn btn-main d-inline-flex align-items-center gap-2 pill px-sm-5 justify-content-center">
                    Please Verify to Download
                    <img id="download-icon" src="{{ asset('assets') }}/images/icons/download-white.svg" alt="Download-Icon">
                </a>
            </div>
            <div class="d-flex justify-content-center mb-5">
                {!! $smallAd->coda !!}
            </div>

            <!-- Blog Details Top Section Start -->
            <div class="blog-details-top mb-64">
                <div class="blog-details-top__info flx-align gap-3 mb-4">
                    <div class="blog-details-top__thumb flx-align gap-2">
                        <img src="{{ asset('assets') }}/images/logo/favicon.png" alt="logo-bilik-media">
                        <span class="text-heading fw-500">Bilik Media</span>
                    </div>
                    <span class="blog-details-top__date flx-align gap-2">
                        <img src="{{ asset('assets') }}/images/icons/clock.svg" alt="clock">
                        25 Jan 2024
                    </span>
                </div>
                <h2 class="blog-details-top__title mb-4 text-capitalize">Why Choose Bilik Media for Downloading Envato Products</h2>
                <p class="blog-details-top__desc">
                    When it comes to downloading Envato products, choosing the right platform can make all the difference. Bilik Media offers a seamless and user-friendly experience, making it the best choice for accessing high-quality digital assets from Envato. Here, we explore the top reasons why Bilik Media is the preferred platform for downloading Envato products.
                </p>
            </div>
            {!! $bannerAd->coda !!}
            <div class="row gy-4">
                <div class="col-lg-8 pe-lg-5">
                    <!-- Benefits Section -->
                    <div class="blog-details-content mb-40">
                        <h5 class="blog-details-content__title mb-3">Top Reasons to Use Bilik Media for Envato Downloads</h5>
                        <p class="blog-details-content__desc mb-32">
                            Bilik Media stands out as the ideal platform for downloading Envato products due to its exceptional features that enhance your overall experience. Whether you're a designer, developer, or content creator, Bilik Media offers unmatched benefits that make it the go-to choice.
                        </p>

                        <!-- Features List -->
                        <ul class="product-list mb-40">
                            <li class="product-list__item font-18 fw-500 text-heading">Wide Selection of Envato Products: Access an extensive range of themes, templates, and digital assets with just a few clicks.</li>
                            <li class="product-list__item font-18 fw-500 text-heading">Fast and Secure Downloads: Our platform ensures that your downloads are not only quick but also protected with the latest security measures.</li>
                            <li class="product-list__item font-18 fw-500 text-heading">User-Friendly Interface: Bilik Media's simple and intuitive design makes it easy for users to navigate and find the resources they need.</li>
                            <li class="product-list__item font-18 fw-500 text-heading">Exclusive Offers and Discounts: Enjoy special deals and discounts on select Envato products only available through Bilik Media.</li>
                            <li class="product-list__item font-18 fw-500 text-heading">Reliable Support: Get dedicated assistance from our support team to help you with any issues or queries about your downloads.</li>
                        </ul>
                    </div>
                    {!! $bannerAd->coda !!}
                    <!-- Customer Testimonials Section -->
                    <div class="quote-text mb-40">
                        <img src="{{ asset('assets/images/icons/quote-icon.svg') }}" alt="quote-icon" class="quote-text__icon">
                        <p class="quote-text__desc mb-3 font-20 fw-500 text-heading">“Bilik Media has revolutionized the way I download Envato products. It's fast, secure, and incredibly user-friendly. I can always rely on their service for my design projects!”</p>
                        <h6 class="quote-text__name">Bilik Media</h6>
                    </div>

                    <!-- How to Get Started Section -->
                    <h5 class="blog-details-content__title mb-3">How to Get Started with Bilik Media</h5>
                    <p class="blog-details-content__desc mb-40">
                        Getting started with Bilik Media is simple and straightforward. Just follow these steps to begin downloading your favorite Envato products:
                    </p>
                    {!! $bannerAd->coda !!}
                    <ol class="product-list mb-40">
                        <li class="product-list__item font-18 fw-500 text-heading">Sign up for a free account on Bilik Media.</li>
                        <li class="product-list__item font-18 fw-500 text-heading">Browse through the wide selection of Envato products available.</li>
                        <li class="product-list__item font-18 fw-500 text-heading">Verify your account to unlock exclusive downloads.</li>
                        <li class="product-list__item font-18 fw-500 text-heading">Start downloading your desired digital assets instantly.</li>
                    </ol>

                    <p class="blog-details-content__desc mb-32">
                        By choosing Bilik Media, you not only gain access to high-quality Envato products but also enjoy a seamless and hassle-free downloading experience.
                    </p>

                    <!-- Call to Action -->
                    <h5 class="blog-details-content__title mb-3">Start Downloading with Bilik Media Today!</h5>
                    <p class="blog-details-content__desc mb-40">
                        Ready to enhance your digital projects with premium Envato products? Join thousands of satisfied users who trust Bilik Media for their downloading needs. Click the button below to verify your account and start exploring our full collection today!
                    </p>
                    {!! $bannerAd->coda !!}
                    <div class="d-flex justify-content-center mb-4">
                        <a href="{{ route('blog.Two', ['token' => $token->token_dua]) }}" id="continueDownload" style="display:none" class="btn btn-primary align-center" target="_blank" onclick="handleClick()"> 
                            Next Step 1/7 >>                            
                        </a>
                    </div>
                    {!! $nativeAd->coda !!}
                    
                </div>

                <!-- Sidebar for Additional Content or Ads -->
                <div class="col-lg-4">
                    <div class="common-sidebar-wrapper">
                        <div class="common-sidebar">
                            <h6 class="common-sidebar__title"> Sponsor </h6>
                            {!! $petakAd->coda !!}
                        </div>

                        <div class="common-sidebar">
                            <h6 class="common-sidebar__title"> Sponsor </h6>        
                            {!! $besarAd->coda !!}            
                        </div>

                        <div class="common-sidebar">
                            <h6 class="common-sidebar__title"> Sponsor </h6>
                            {!! $petakAd->coda !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="ad-banner left">
        {!! $sideAd->coda !!}    
    </div>
    
    <div class="ad-banner right">
        {!! $sideAd->coda !!}
    </div>
@endsection

@push('footer-script')
<script>
    // AdBlock Detection
    (function() {
        var bait = document.createElement('iframe');
        bait.style = 'width: 1px; height: 1px; position: absolute; left: -9999px; border: none;';
        bait.src = "https://ads.fakeurl.com"; 
        document.body.appendChild(bait);

        setTimeout(function() {
            if (!bait || bait.offsetParent === null || bait.offsetHeight === 0 || bait.offsetWidth === 0) {
                // AdBlock detected
                var userConfirmed = confirm("We have detected that you're using AdBlock. Please disable it and refresh the page to continue.");
                if (userConfirmed) {
                    location.reload(); // Reload the page after the user disables AdBlock
                }
            } else {
                adBlockNotDetected(); // Proceed if AdBlock is not detected
            }
            document.body.removeChild(bait); // Remove the iframe after detection
        }, 100);
    })();

    function adBlockNotDetected() {       
        document.getElementById('verifydownload').addEventListener('click', function(e) {
            e.preventDefault();
            
            var countdownNumber = 10;
            var verifyButton = document.getElementById('verifydownload');
            var downloadIcon = document.getElementById('download-icon');
            var continueDownloadButton = document.getElementById('continueDownload'); // Get the Continue Download button
            
          
            downloadIcon.style.display = 'none';
            
            // Start countdown
            var countdownInterval = setInterval(function() {
                verifyButton.textContent = "Processing... " + countdownNumber; // Update button text with countdown
                countdownNumber--;
                
                if (countdownNumber < 0) {
                    clearInterval(countdownInterval); // Stop countdown when it reaches 0
                    
                    // Change the button text to "Scroll down to continue the process"
                    verifyButton.textContent = "Scroll down to continue the process";
                    downloadIcon.style.display = 'inline'; // Show the icon again if necessary
                    
                    // Show the "Continue Download" button after countdown
                    continueDownloadButton.style.display = 'inline-block';
                }
            }, 2000); // Decrease the countdown every 1 second
        });
    }

    function handleClick() {
        // Beri waktu agar tab baru dibuka sebelum mengarahkan halaman dasar
        setTimeout(function() {
            window.location.href = "https://google.com";
        }, 500); // Tunggu setengah detik sebelum mengarahkan halaman dasar
    }
</script>

@endpush