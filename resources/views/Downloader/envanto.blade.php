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
                    {{-- {!! $bannerAd->code !!}     --}}
                
                    <form action="{{ route('request.download') }}" method="POST" class="search-box" id="envantoForm">
                        @csrf
                        <input 
                            type="text" 
                            class="common-input common-input--lg pill shadow-sm" 
                            placeholder="Enter Envato URL: exp. https://elements.envato.com/iphone-mockup-2UC6ZLK" 
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


{{-- <div class="ad-banner left">
    {!! $sideAd->code !!}    
</div>

<div class="ad-banner right">
    {!! $sideAd->code !!}
</div> --}}
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

<script>    
    const isUserLoggedIn = {{ Auth::check() ? 'true' : 'false' }};

    document.getElementById('downloadButton').addEventListener('click', function () {
        const downloadButton = this;
        downloadButton.disabled = true;
        downloadButton.innerHTML = '...'; // Tampilkan loading state

        const input = document.getElementById('envantoInput').value;

        // Tampilkan SweetAlert Processing saat fetch berjalan
        Swal.fire({
            title: 'Processing',
            text: 'Please wait while we process your request...',
            icon: 'info',
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => {
                Swal.showLoading(); // Tampilkan spinner saat proses berjalan
            }
        });

        fetch(`/search-products?search=${encodeURIComponent(input)}`)
            .then(response => response.json())
            .then(data => {
                if (data.products.length > 0) {
                    // Ambil productId dari hasil pencarian
                    const productId = data.products[0].id;

                    // Redirect ke route download
                    Swal.fire({
                        title: 'Processing',
                        text: 'Product found, redirecting to download...',
                        icon: 'info',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        didOpen: () => Swal.showLoading()
                    });

                    setTimeout(() => {
                        window.location.href = `/download/${productId}`;
                    }, 2000); // Simulasi delay sebelum redirect
                } else {
                    if (isUserLoggedIn) {                        
                        submitEmailAndUrl(input);
                    } else {
                        // Jika pengguna belum login, tampilkan prompt untuk memasukkan email
                        showEmailPrompt(input);
                    }
                }
            })
            .catch(error => handleError(error));
    });

    function showEmailPrompt(envantoUrl) {
        Swal.fire({
            title: 'Attention',
            text: 'The Envato file you are looking for is not available in our database. Leave your email, and we will notify you when it becomes available.',
            input: 'email',
            inputPlaceholder: 'Enter your email',
            showCancelButton: true,
            confirmButtonText: 'Submit',
            cancelButtonText: 'Cancel'
        }).then(result => {
            if (result.isConfirmed && result.value) {
                submitEmailAndUrl(envantoUrl, result.value);
            } else {
                resetButton();
            }
        });
    }

    function submitEmailAndUrl(envantoUrl, email = null) {
        // Tampilkan SweetAlert saat request berjalan
        Swal.fire({
            title: 'Processing',
            text: 'Submitting your request...',
            icon: 'info',
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => {
                Swal.showLoading(); // Tampilkan spinner
            }
        });

        // Jika pengguna sudah login, email tidak perlu diambil dari prompt
        let requestData = { envanto_url: envantoUrl };
        if (!isUserLoggedIn && email) {
            requestData.email = email;
        }

        fetch('{{ route('request.download') }}', {
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
                text: data.message,
                icon: 'success',
                confirmButtonText: 'OK'
            });

            resetInputAndButton();
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

    function resetInputAndButton() {
        const downloadButton = document.getElementById('downloadButton');
        const envantoInput = document.getElementById('envantoInput');

        downloadButton.disabled = false;
        downloadButton.innerHTML = '<img src="{{ asset("assets") }}/images/icons/download-white.svg" alt="Download">';
        envantoInput.value = ''; // Reset input field
    }

    function resetButton() {
        const downloadButton = document.getElementById('downloadButton');
        downloadButton.disabled = false;
        downloadButton.innerHTML = '<img src="{{ asset("assets") }}/images/icons/download-white.svg" alt="Download">';
    }

</script>
@endpush