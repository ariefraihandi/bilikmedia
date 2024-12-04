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
                    <!-- Mengganti judul utama menjadi sesuai dengan Motion Array -->
                    <h1 class="banner-two__title mb-3">Free Scribd Downloader</h1>
                    <p class="banner-two__desc">
                        Get Scribd documents instantly with our free downloader. No hassle, just fast and easy downloads!
                    </p>
                    <!-- Iklan besar -->
                    <div class="ad-container large-ad">
                        {!! $bannerAd->code !!}
                    </div>
            
                    <!-- Iklan kecil -->
                    <div class="ad-container small-ad">
                        {!! $smallAd->code !!}
                    </div>           
           
                    <form action="{{ route('request.scribd.download') }}" method="POST" class="search-box" id="scribdForm">
                        @csrf
                        <input 
                            type="text" 
                            class="common-input common-input--lg pill shadow-sm" 
                            placeholder="Enter Scribd URL: exp. https://www.scribd.com/document/123456789/sample-doc" 
                            id="scribdInput"
                            name="scribd_url"
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
    document.getElementById('downloadButton').addEventListener('click', function () {
        const downloadButton = this;
        downloadButton.disabled = true;
        downloadButton.innerHTML = '...';

        const input = document.getElementById('scribdInput').value;

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
                    Swal.fire({
                        title: 'Processing',
                        text: 'Document found, redirecting to download...',
                        icon: 'info',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        didOpen: () => Swal.showLoading()
                    });

                    const baseUrl = "{{ route('generate.download.link', ['productId' => '__PRODUCT_ID__']) }}";
                    const url = baseUrl.replace('__PRODUCT_ID__', data.products[0].id);

                    setTimeout(() => {                                               
                        window.open(url, '_blank');
                        window.location.href = 'https://luglawhaulsano.net/4/8261677';
                    }, 2000);
                } else {
                    showEmailPrompt(input);
                }
            })
            .catch(error => handleError(error));
    });

    function showEmailPrompt(scribdUrl) {
        Swal.fire({
            title: 'Attention',
            text: 'The Scribd document you are looking for is not available in our database. Leave your email, and we will notify you when it becomes available.',
            input: 'email',
            inputPlaceholder: 'Enter your email',
            showCancelButton: true,
            confirmButtonText: 'Submit',
            cancelButtonText: 'Cancel'
        }).then(result => {
            if (result.isConfirmed && result.value) {
                submitEmailAndUrl(scribdUrl, result.value);
            } else {
                resetButton();
            }
        });
    }

    function submitEmailAndUrl(scribdUrl, email = null) {
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

        fetch('{{ route('request.scribd.download') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ scribd_url: scribdUrl, email: email })
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
                text: 'Your request has been submitted successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            });
            window.open('{{ route('scribd.downloader') }}', '_blank');
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
