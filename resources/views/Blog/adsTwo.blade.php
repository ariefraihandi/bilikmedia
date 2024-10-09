@extends('Index.app')
@push('header-script')   
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
                {!! $bannerAd->code !!}
            </div>
            <div class="d-flex justify-content-center">
                <a href="#" id="verifydownload" class="btn btn-main d-inline-flex align-items-center gap-2 pill px-sm-5 justify-content-center">
                    Please Verify to Claim Free Credits
                    <img id="download-icon" src="{{ asset('assets') }}/images/icons/download-white.svg" alt="Download-Icon">
                </a>
            </div>
            <div class="d-flex justify-content-center mb-5">
                {!! $smallAd->code !!}
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
                <h2 class="blog-details-top__title mb-4 text-capitalize">What is Envato Downloader by Bilik Media?</h2>
                <p class="blog-details-top__desc">
                    Envato Downloader by Bilik Media is a platform designed to make accessing and downloading premium digital products from Envato easier and more efficient. With a user-friendly interface and fast, secure processes, Bilik Media ensures a seamless experience for downloading Envato products. Here, we explain why Bilik Media is the best solution for all your Envato downloading needs.
                </p>
            </div>
            {!! $bannerAd->code !!}
            <div class="row gy-4">
                <div class="col-lg-8 pe-lg-5">
                    <!-- Benefits Section -->
                    <div class="blog-details-content mb-40">
                        <h5 class="blog-details-content__title mb-3">Top Benefits of Using Envato Downloader by Bilik Media</h5>
                        <p class="blog-details-content__desc mb-32">
                            Envato Downloader by Bilik Media stands out as the perfect platform for downloading Envato products, offering unmatched features that enhance your overall experience. Whether you're a designer, developer, or content creator, Bilik Media provides the ultimate tools for fast and secure downloads.
                        </p>

                        <!-- Features List -->
                        <ul class="product-list mb-40">
                            <li class="product-list__item font-18 fw-500 text-heading">Access to a Wide Range of Envato Products: Easily explore and download a vast selection of themes, templates, and digital assets.</li>
                            <li class="product-list__item font-18 fw-500 text-heading">Fast and Secure Downloads: Bilik Media guarantees quick, reliable downloads with the highest level of security to protect your data.</li>
                            <li class="product-list__item font-18 fw-500 text-heading">User-Friendly Interface: The simple and intuitive platform makes it easy to find and download the resources you need in no time.</li>
                            <li class="product-list__item font-18 fw-500 text-heading">Exclusive Offers and Discounts: Enjoy special deals on selected Envato products that are only available through Bilik Media.</li>
                            <li class="product-list__item font-18 fw-500 text-heading">Reliable Customer Support: Get dedicated support for any issues or questions related to your downloads, ensuring a smooth experience every time.</li>
                        </ul>
                    </div>
                    {!! $bannerAd->code !!}
                     <!-- Customer Testimonials Section -->
                    <div class="quote-text mb-40">
                        <img src="{{ asset('assets/images/icons/quote-icon.svg') }}" alt="quote-icon" class="quote-text__icon">
                        <p class="quote-text__desc mb-3 font-20 fw-500 text-heading">“Envato Downloader by Bilik Media has transformed the way I access digital assets. It's fast, secure, and incredibly easy to use. I can always count on it for my design projects!”</p>
                        <h6 class="quote-text__name">Bilik Media</h6>
                    </div>

                    <h5 class="blog-details-content__title mb-3">How to Get Started with Envato Downloader by Bilik Media</h5>
                    <p class="blog-details-content__desc mb-40">
                        Getting started with Envato Downloader by Bilik Media is simple. Follow these steps to access premium Envato products in just a few clicks:
                    </p>

                    <ol class="product-list mb-40">
                        <li class="product-list__item font-18 fw-500 text-heading">Create a free account on Bilik Media.</li>
                        <li class="product-list__item font-18 fw-500 text-heading">Browse through the wide selection of Envato products available on the platform.</li>
                        <li class="product-list__item font-18 fw-500 text-heading">Verify your account to unlock exclusive download privileges.</li>
                        <li class="product-list__item font-18 fw-500 text-heading">Start downloading your desired digital assets instantly.</li>
                    </ol>

                    <p class="blog-details-content__desc mb-32">
                        By choosing Envato Downloader by Bilik Media, you gain access to top-tier Envato products while enjoying a seamless and efficient download experience.
                    </p>
                    {!! $bannerAd->code !!}
                    <!-- Call to Action -->
                    <h5 class="blog-details-content__title mb-3">Start Using Envato Downloader by Bilik Media Today!</h5>
                    <p class="blog-details-content__desc mb-40">
                        Ready to enhance your digital projects with premium Envato products? Join thousands of satisfied users who rely on Envato Downloader by Bilik Media for their downloading needs. Click the button below to verify your account and start exploring our extensive collection today!
                    </p>
                    {!! $bannerAd->code !!}
                    <div class="d-flex justify-content-center mb-4">
                        <a href="{{ route('blog.adsThree', ['token' => $adCredit->token_3]) }}" id="continueDownload" style="display:none" class="btn btn-primary align-center" target="_blank" onclick="handleClick()"> 
                            Next Step 2/5 >>                            
                        </a>
                    </div>
                    {!! $nativeAd->code !!}
                    
                </div>

                <!-- Sidebar for Additional Content or Ads -->
                <div class="col-lg-4">
                    <div class="common-sidebar-wrapper">
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
    // AdBlock Detection
    (function() {
        var bait = document.createElement('iframe');
        bait.style = 'width: 1px; height: 1px; position: absolute; left: -9999px; border: none;';
        bait.src = "https://ads.fakeurl.com"; // Fake ad URL for detection
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
            // window.location.href = "https://zireemilsoude.net/4/6533224";
            window.location.href = "https://google.com";
        }, 500); // Tunggu setengah detik sebelum mengarahkan halaman dasar
    }
</script>

@endpush