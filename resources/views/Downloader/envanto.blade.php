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

        /* Sembunyikan iklan di layar kecil (mobile) */
        @media (max-width: 768px) {
            .ad-banner {
                display: none;
            }
        }

    </style>
@endpush
@section('content')
<section class="banner-two position-relative z-index-1 overflow-hidden">
    <img src="{{ asset('assets') }}/images/gradients/banner-two-gradient.png" alt="" class="bg--gradient white-version">
    <img src="{{ asset('assets') }}/images/gradients/banner-two-gradient-dark.png" alt="" class="bg--gradient dark-version">
    <img src="{{ asset('assets') }}/images/shapes/element-moon3.png" alt="" class="element one">
    <img src="{{ asset('assets') }}/images/shapes/element-moon2.png" alt="" class="element two">
    <img src="{{ asset('assets') }}/images/shapes/element-moon1.png" alt="" class="element three">
    
    
    <div class="container container-full">
        <div class="row gy-sm-5 gy-4 align-items-center">
            <div class="col-xl-3 col-sm-6 order-xl-0 order-2">
                <div class="position-relative z-index-1">
                    <img src="{{ asset('assets') }}/images/shapes/dots-sm.png" alt="" class="dotted-img d-xl-block d-none white-version">
                    <img src="{{ asset('assets') }}/images/shapes/dots-sm-white.png" alt="" class="dotted-img d-xl-block d-none dark-version">
                    <div class="statistics-wrapper">                    
                    </div>
                </div>
            </div>

            <div class="col-xl-6 d-flex justify-content-center align-items-center flex-column">
                <div class="banner-two__content text-center">
                    <h2 class="banner-two__title mb-3">Envato Downloader</h2>
                    <p class="banner-two__desc">
                        Get Envato files instantly with our free downloader. No hassle, just fast and easy downloads!
                    </p>
                    <!-- Banner Ad -->
                    {!! $bannerAd->code !!}                 
                    @if (session('success'))
                        <div class="alert alert-success" id="alertSuccess">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (request('success'))
                        <div class="alert alert-success">
                            {{ request('success') }}
                        </div>
                    @endif                  
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif                    
                
                    <form action="{{ route('request.download') }}" method="POST" class="search-box" id="envantoForm">
                        @csrf
                        <input 
                            type="text" 
                            class="common-input common-input--lg pill shadow-sm" 
                            placeholder="Enter Envanto URL: exp. https://elements.envato.com/iphone-mockup-2UC6ZLK" 
                            id="envantoInput"
                            name="envanto_url"
                        >
                    
                        <!-- Button download yang akan disembunyikan jika URL tidak ditemukan -->
                        <button type="button" class="btn btn-main btn-icon icon border-0" id="downloadButton">
                            <img src="{{ asset('assets') }}/images/icons/download-white.svg" alt="Download">
                        </button>
                    </form>                                                                                                                                                
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="position-relative z-index-1">
                    <img src="{{ asset('assets') }}/images/shapes/dots-sm.png" alt="" class="dotted-img d-xl-block d-none white-version">
                    <img src="{{ asset('assets') }}/images/shapes/dots-sm-white.png" alt="" class="dotted-img d-xl-block d-none dark-version">
                    <div class="statistics-wrapper style-right">                       
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="popular-item-card-section padding-y-120 overflow-hidden">

  <img src="{{ asset('assets') }}/images/shapes/brush.png" alt="" class="element-brush">
  
    <div class="container container-two">
        <div class="section-heading">
            <h3 class="section-heading__title">Most Downloaded Items</h3>
        </div>

       
        <div class="tab-content" id="pills-tab-popularContent">
            <div class="tab-pane fade show active" id="pills-all-two" role="tabpanel" aria-labelledby="pills-all-two-tab" tabindex="0">
                <div class="row gy-4">
                    @foreach($products as $product)
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-6">
                            <div class="popular-item-card">
                                <div class="popular-item-card__thumb">
                                    <a href="{{ route('product.details', $product->slug) }}" class="link w-100"> 
                                        <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->title }}">
                                    </a>
                                    <div class="product-item__bottom flx-between gap-2">
                                        <div>
                                            <span class="product-item__sales font-14 mb-0 text-white">{{ $product->downloads_count }} Downloads</span>
                                            
                                            <!-- Menampilkan rating bintang -->
                                            <div class="d-flex align-items-center gap-1">
                                                <ul class="star-rating">
                                                    @php
                                                        $avgRating = $product->ratings_avg_rating ?? 0; // Rata-rata rating
                                                        $filledStars = floor($avgRating); // Bintang penuh
                                                        $emptyStars = 5 - $filledStars; // Bintang kosong
                                                    @endphp
        
                                                    <!-- Bintang terisi penuh -->
                                                    @for ($i = 0; $i < $filledStars; $i++)
                                                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                                    @endfor
        
                                                    <!-- Bintang kosong -->
                                                    @for ($i = 0; $i < $emptyStars; $i++)
                                                        <li class="star-rating__item font-11"><i class="far fa-star"></i></li>
                                                    @endfor
                                                </ul>                                                                                              
                                            </div>
                                        </div>
                                        <span class="product-item__author">
                                            by
                                            <a href="#" class="link text-decoration-underline"> {{ $product->author }}</a>
                                        </span>
                                    </div>
                                </div>
                                <div class="popular-item-card__content d-flex align-items-center justify-content-between gap-2 text-start">
                                    <h6 class="popular-item-card__title mb-0">
                                        <a href="{{ route('product.details', $product->slug) }}" class="link"> {{ $product->title }}</a>
                                    </h6>
                                    <a href="{{ route('product.details', $product->slug) }}" class="btn-link line-height-1 flex-shrink-0">
                                        <img src="{{ asset('assets/images/icons/link.svg') }}" alt="" class="white-version">
                                        <img src="{{ asset('assets/images/icons/link-light.svg') }}" alt="" class="dark-version">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach            
                </div>
            </div>
        </div>
        
    </div>
</section>

<section class="newsletter position-relative z-index-1 overflow-hidden">
    <img src="{{ asset('assets') }}/images/gradients/newsletter-gradient-bg.png" alt="" class="bg--gradient">

    <img src="{{ asset('assets') }}/images/shapes/element1.png" alt="" class="element two">
    <img src="{{ asset('assets') }}/images/shapes/element2.png" alt="" class="element one">

    <img src="{{ asset('assets') }}/images/shapes/line-vector-one.png" alt="" class="line-vector one">
    <img src="{{ asset('assets') }}/images/shapes/line-vector-two.png" alt="" class="line-vector two">

    <img src="{{ asset('assets') }}/images/thumbs/newsletter-man.png" alt="" class="newsletter-man">
    
    <div class="container container-two">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="newsletter-content">
                    <h3 class="newsletter-content__title text-white mb-2 text-center">Get update Newsletter</h3>
                    <p class="newsletter-content__desc pb-2 text-white text-center font-18 fw-300">Subscribe our newsletter to get the latest news</p>

                    <form action="#" class="mt-4 newsletter-box position-relative">
                        <input type="text" class="form-control common-input common-input--lg pill text-white" placeholder="Enter Mail">
                        <button type="submit" class="btn btn-main btn-lg pill flx-align gap-1">Subscribe <span class="text d-sm-flex d-none">Now</span> </button>
                    </form>

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
{{-- <script>
    const requestDownloadUrl = "{{ route('request.download') }}";

    document.getElementById('downloadButton').addEventListener('click', function() {
        let input = document.getElementById('envantoInput').value;

        fetch(`/search-products?search=${input}`)
            .then(response => response.json())
            .then(data => {
                if (data.products.length > 0) {
                    document.getElementById('envantoForm').submit();
                } else {
                    document.getElementById('downloadButton').style.display = 'none';
                    document.getElementById('emailContainer').style.display = 'block';

                    let alertSuccess = document.getElementById('alertSuccess');
                    if (!alertSuccess) {
                        let alertDiv = document.createElement('div');
                        alertDiv.classList.add('alert', 'alert-success');
                        alertDiv.id = 'alertSuccess';
                        alertDiv.innerHTML = 'The element is not yet available in our database. Please enter your email address and wait 5-15 minutes for notification.';
                                                
                        document.getElementById('envantoForm').insertAdjacentElement('beforebegin', alertDiv);
                    }
                }
            })
            .catch(error => {
                console.error('Error during fetch:', error);
            });
    });

    // Handle form submit when "Request Download" button is clicked
    document.getElementById('requestDownloadButton').addEventListener('click', function() {
        let email = document.getElementById('emailInput').value;
        let url = document.getElementById('envantoInput').value;

        if (email && url) {
            // Simulate form submission or send request via AJAX (if needed)
            alert('Your download request has been submitted with email: ' + email);
        } else {
            alert('Please enter a valid email and URL.');
        }
    });

    document.getElementById('requestDownloadButton').addEventListener('click', function(event) {
        let requestDownloadButton = document.getElementById('requestDownloadButton');
        let form = document.getElementById('envantoForm');

        // Prevent default form submission to ensure button change happens first
        event.preventDefault();

        // Change text to "On Process..." and disable the button
        requestDownloadButton.disabled = true;
        requestDownloadButton.textContent = 'On Process...';

        // Trigger form submission after the button is disabled and text is changed
        form.submit();
    });

</script> --}}

<script>
    const userCredit = {{ $userDetail ? $userDetail->kredit : 0 }};
    const isUserLoggedIn = {{ Auth::check() ? 'true' : 'false' }}; // Check if the user is logged in

    document.getElementById('downloadButton').addEventListener('click', function () {
        // Disable the download button to prevent double submission
        const downloadButton = this;
        downloadButton.disabled = true;
        downloadButton.innerHTML = '...'; // Optional: Change button text to show processing

        // Check if the user has enough credit
        if (userCredit >= 2) {
            // If the user has enough credits, proceed to check the product availability
            let input = document.getElementById('envantoInput').value;

            fetch(`/search-products?search=${input}`)
                .then(response => response.json())
                .then(data => {
                    if (data.products.length > 0) {
                        // Show the SweetAlert for processing
                        Swal.fire({
                            title: 'Processing',
                            text: 'Please wait while we process your request...',
                            icon: 'info',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            didOpen: () => {
                                Swal.showLoading(); // Show a loading spinner
                            }
                        });

                        // Submit the form after showing the alert
                        document.getElementById('envantoForm').submit();
                    } else {
                        // Show the SweetAlert for processing
                        Swal.fire({
                            title: 'Processing',
                            text: 'Please wait while we process your request...',
                            icon: 'info',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            didOpen: () => {
                                Swal.showLoading(); // Show a loading spinner
                            }
                        });

                        // Submit the form after showing the alert
                        document.getElementById('envantoForm').submit();
                    }
                })
                .catch(error => {
                    console.error('Error during fetch:', error);
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred while checking the product. Please try again later.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });

                    // Re-enable the button in case of an error
                    downloadButton.disabled = false;
                    downloadButton.innerHTML = '<img src="{{ asset("assets") }}/images/icons/download-white.svg" alt="Download">'; // Reset button text/icon
                });
        } else {
            // If the user does not have enough credits, show a SweetAlert with different messages based on login status
            if (isUserLoggedIn === 'false') {
                // User is not logged in
                Swal.fire({
                    title: 'You Don\'t Have Enough Credits',
                    text: 'Claim your FREE credit by registering to BILIK MEDIA.',
                    icon: 'warning',
                    confirmButtonText: 'Register Now'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/auth/register';
                    }
                });
            } else {
                Swal.fire({
                    title: 'No Credits Available',
                    text: 'Claim your FREE credit.',
                    icon: 'info',
                    confirmButtonText: 'Claim'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/credit';
                    }
                });
            }

            // Re-enable the button since no credit deduction occurs
            downloadButton.disabled = false;
            downloadButton.innerHTML = '<img src="{{ asset("assets") }}/images/icons/download-white.svg" alt="Download">'; // Reset button text/icon
        }
    });
</script>


@endpush