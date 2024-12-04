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

        .small-ad {
            display: none;
        }
        
        .large-ad {
            display: block;
        }
        /* Sembunyikan iklan di layar kecil (mobile) */
        @media (max-width: 768px) {
            .ad-banner {
                display: none;
            }
            .small-ad {
                display: block;
            }
            .large-ad {
                display: none;
            }
        }

    </style>
@endpush
@section('content')
<section class="banner-two position-relative z-index-1 overflow-hidden">
    <img src="{{ asset('assets') }}/images/gradients/banner-two-gradient.webp" alt="banner-two-gradient" class="bg--gradient white-version">
    <img src="{{ asset('assets') }}/images/gradients/banner-two-gradient-dark.png" alt="two-gradient-dark" class="bg--gradient dark-version">
    <img src="{{ asset('assets') }}/images/shapes/element-moon3.png" alt="moon3" class="element one">
    <img src="{{ asset('assets') }}/images/shapes/element-moon2.png" alt="moon2" class="element two">
    <img src="{{ asset('assets') }}/images/shapes/element-moon1.png" alt="moon1" class="element three">
    
    
    <div class="container container-full">
        <div class="row gy-sm-5 gy-4 align-items-center">
            <div class="col-xl-3 col-sm-6 order-xl-0 order-2">
                <div class="position-relative z-index-1">
                    <img src="{{ asset('assets') }}/images/shapes/dots-sm.png" alt="dots" class="dotted-img d-xl-block d-none white-version">
                    <img src="{{ asset('assets') }}/images/shapes/dots-sm-white.png" alt="dots-sm-white" class="dotted-img d-xl-block d-none dark-version">
                    <div class="statistics-wrapper">                    
                    </div>
                </div>
            </div>

            <div class="col-xl-6 d-flex justify-content-center align-items-center flex-column">
                <div class="banner-two__content text-center">             
                    <h1 class="banner-two__title mb-3">Free Academia Downloader</h1>
                    <p class="banner-two__desc">
                        Get Academia.edu documents instantly with our free downloader. Fast and easy downloads!
                    </p>
                    <!-- Iklan besar -->
                    <div class="ad-container large-ad">
                        {!! $bannerAd->code !!}
                    </div>
            
                    <!-- Iklan kecil -->
                    <div class="ad-container small-ad">
                        {!! $smallAd->code !!}
                    </div>                                 
                    
                    <form action="{{ route('request.academia.download') }}" method="POST" class="search-box" id="academiaForm">
                        @csrf
                        <input
                            type="text"
                            class="common-input common-input--lg pill shadow-sm"
                            placeholder="Enter Academia URL: exp. https://www.academia.edu/1234567/sample-document"
                            id="academiaInput"
                            name="academia_url"
                        >

                        <button type="button" class="btn btn-main btn-icon icon border-0" id="downloadButton">
                            <img src="{{ asset('assets') }}/images/icons/download-white.svg" alt="Download">
                        </button>
                    </form>
                </div>
            </div>
            

            <div class="col-xl-3 col-sm-6">
                <div class="position-relative z-index-1">
                    <img src="{{ asset('assets') }}/images/shapes/dots-sm.png" alt="dots-sm.png" class="dotted-img d-xl-block d-none white-version">
                    <img src="{{ asset('assets') }}/images/shapes/dots-sm-white.png" alt="dots-sm-white" class="dotted-img d-xl-block d-none dark-version">
                    <div class="statistics-wrapper style-right">                       
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
    const isUserLoggedIn = {{ Auth::check() ? 'true' : 'false' }};

    document.getElementById('downloadButton').addEventListener('click', function () {
        const downloadButton = this;
        downloadButton.disabled = true;
        downloadButton.innerHTML = '...';

        const input = document.getElementById('academiaInput').value;

        Swal.fire({
            title: 'Processing',
            text: 'Please wait while we process your request...',
            icon: 'info',
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        fetch(`/search-products?search=${encodeURIComponent(input)}`)
            .then(response => response.json())
            .then(data => {
                if (data.products.length > 0) {
                    const productId = data.products[0].id;
                    const baseUrl = "{{ route('generate.download.link', ['productId' => '__PRODUCT_ID__']) }}";
                    setTimeout(() => {
                        const url = baseUrl.replace('__PRODUCT_ID__', productId);
                        window.open(url, '_blank');
                        window.location.href = 'https://luglawhaulsano.net/4/8261677';
                    }, 2000);
                } else {
                    isUserLoggedIn ? submitEmailAndUrl(input) : showEmailPrompt(input);
                }
            })
            .catch(error => handleError(error));
    });

    function showEmailPrompt(academiaUrl) {
        Swal.fire({
            title: 'Attention',
            text: 'The document is not available. Leave your email, and we will notify you.',
            input: 'email',
            inputPlaceholder: 'Enter your email',
            showCancelButton: true,
            confirmButtonText: 'Submit',
            cancelButtonText: 'Cancel'
        }).then(result => {
            if (result.isConfirmed && result.value) {
                submitEmailAndUrl(academiaUrl, result.value);
            } else {
                resetButton();
            }
        });
    }

    function submitEmailAndUrl(academiaUrl, email = null) {
        Swal.fire({
            title: 'Processing',
            text: 'Submitting your request...',
            icon: 'info',
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        let requestData = { academia_url: academiaUrl };
        if (!isUserLoggedIn && email) {
            requestData.email = email;
        }

        fetch('{{ route('request.academia.download') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(requestData)
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(data => {
                    throw new Error(data.message || 'Failed to submit your request.');
                });
            }
            return response.json();
        })
        .then(data => {
            Swal.fire({
                title: 'Success',
                text: data.message || 'Your request has been submitted successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            });
            window.open('{{ route('academia.downloader') }}', '_blank');
            window.location.href = 'https://luglawhaulsano.net/4/8261677';
        })
        .catch(error => handleError(error));
    }

    function handleError(error) {
        console.error('Error:', error);
        Swal.fire({
            title: 'Error',
            text: error.message || 'An error occurred. Please try again later.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        resetButton();
    }

    function resetButton() {
        const downloadButton = document.getElementById('downloadButton');
        downloadButton.disabled = false;
        downloadButton.innerHTML = '<img src="{{ asset("assets") }}/images/icons/download-white.svg" alt="Download">';
    }
</script>
@endpush
