@extends('Index.app')
@push('header-script')   
{!! $monetagAd->codew !!}     
{{-- <script src="https://alwingulla.com/88/tag.min.js" data-zone="86090" async data-cfasync="false"></script> --}}
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
                {!! $bannerAd->codew !!}
            </div>
            <div class="d-flex justify-content-center">
                <a href="#" id="verifydownload" class="btn btn-main d-inline-flex align-items-center gap-2 pill px-sm-5 justify-content-center">
                    Please Verify to Download
                    <img id="download-icon" src="{{ asset('assets') }}/images/icons/download-white.svg" alt="Download-Icon">
                </a>
            </div>
            <div class="d-flex justify-content-center mb-5">
                {!! $smallAd->codew !!}
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
                <h2 class="blog-details-top__title mb-4 text-capitalize">How to Become a Member of Bilik Media and the Benefits of Joining</h2>
                <p class="blog-details-top__desc">
                    Joining Bilik Media is a step towards unlocking exclusive access to premium digital content, valuable tools, and a supportive community. Whether you're a designer, developer, or a digital content creator, Bilik Media offers a variety of benefits that cater to your professional needs.
                </p>
            </div>
            {!! $bannerAd->codew !!}
            <div class="row gy-4">
                <div class="col-lg-8 pe-lg-5">
                    <!-- Benefits Section -->
                    <div class="blog-details-content mb-40">
                        <h5 class="blog-details-content__title mb-3">How to Become a Member</h5>
                        <p class="blog-details-content__desc mb-32">
                            Becoming a member of Bilik Media is quick and easy. Follow these simple steps:
                        </p>

                        <!-- Features List -->
                        <ul class="product-list mb-40">
                            <li class="product-list__item font-18 fw-500 text-heading">Visit the Bilik Media Website: Navigate to the official Bilik Media platform.</li>
                            <li class="product-list__item font-18 fw-500 text-heading">Sign Up: Click the 'Become a Member' button and complete the registration form with your details.</li>
                            <li class="product-list__item font-18 fw-500 text-heading">Verify Your Email: After signing up, you will receive an email verification link. Click on the link to confirm your account.</li>
                            <li class="product-list__item font-18 fw-500 text-heading">Start Exploring: Once verified, you can start browsing through the extensive selection of premium digital assets and tools.</li>                            
                        </ul>
                    </div>
                    {!! $bannerAd->codew !!}

                    <h5 class="blog-details-content__title mb-3">Benefits of Joining Bilik Media</h5>
                    <p class="blog-details-content__desc mb-40">
                        By joining Bilik Media, you gain access to a range of features designed to enhance your workflow and digital projects. Here are some of the top benefits:
                    </p>

                    <ol class="product-list mb-40">
                        <li class="product-list__item font-18 fw-500 text-heading">
                            Exclusive Access to Premium Content: As a member, you will enjoy access to a broad range of premium digital assets including themes, templates, and other creative resources that are available exclusively through Bilik Media.
                        </li>
                        <li class="product-list__item font-18 fw-500 text-heading">
                            Fast and Secure Downloads: Bilik Media ensures that your downloads are fast and secure. The platform uses cutting-edge technology to provide reliable downloads while keeping your data protected.
                        </li>
                        <li class="product-list__item font-18 fw-500 text-heading">
                            Special Offers and Discounts: As a member, you will receive exclusive discounts on various digital products. These special offers are updated regularly, allowing you to save on valuable resources.
                        </li>
                        <li class="product-list__item font-18 fw-500 text-heading">
                            User-Friendly Interface: The platform is designed to be intuitive and easy to use, making it simple for you to find and download the products you need without hassle.
                        </li>
                        <li class="product-list__item font-18 fw-500 text-heading">
                            Dedicated Customer Support: Members have access to a dedicated customer support team that is ready to assist with any issues or questions. Whether it’s about your downloads or using the platform, help is always available.
                        </li>
                    </ol>


                    <!-- Call to Action -->
                    <h5 class="blog-details-content__title mb-3">Why You Should Join Bilik Media Today</h5>
                    <p class="blog-details-content__desc mb-40">
                        With all these benefits and more, Bilik Media is the ideal platform for professionals looking to streamline their workflow and access high-quality digital products. Becoming a member opens up opportunities to take advantage of exclusive content, offers, and top-tier customer support. Don’t miss out—join today!
                    </p>
                    {!! $bannerAd->codew !!}
                    <div class="d-flex justify-content-center mb-4">
                        <a href="{{$urlDownload}}" id="continueDownload" style="display:none" class="btn btn-primary align-center" target="_blank" onclick="handleClick()"> 
                           Download Link Ready                          
                        </a>
                    </div>
                    {!! $nativeAd->codew !!}
                </div>

                <!-- Sidebar for Additional Content or Ads -->
                <div class="col-lg-4">
                    <div class="common-sidebar-wrapper">
                        <div class="common-sidebar">
                            <h6 class="common-sidebar__title"> Sponsor </h6>
                            {!! $petakAd->codew !!}
                        </div>

                        <div class="common-sidebar">
                            <h6 class="common-sidebar__title"> Sponsor </h6>        
                            {!! $besarAd->codew !!}            
                        </div>

                        <div class="common-sidebar">
                            <h6 class="common-sidebar__title"> Sponsor </h6>
                            {!! $petakAd->codew !!}
                        </div>
                    </div>
                </div>
            </div>         
        </div>
    </section>
    <div class="ad-banner left">
        {!! $sideAd->codew !!}    
    </div>
    
    <div class="ad-banner right">
        {!! $sideAd->codew !!}
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
            window.open('https://google.com', '_blank');
                            window.open('https://google.com', '_blank');
                            window.location.href = 'https://google.com';
        }, 500); // Tunggu setengah detik sebelum mengarahkan halaman dasar
    }
</script>

@endpush