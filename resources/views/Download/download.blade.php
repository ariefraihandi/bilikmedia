@extends('Index.app')
@push('header-script')  
    {{-- <script src="https://alwingulla.com/88/tag.min.js" data-zone="104084" async data-cfasync="false"></script>             --}}
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

<!-- ======================= Cart Payment Section Start ========================= -->
<section class="cart-payment padding-y-10 overflow-hidden">
    <div class="container container-two">        
        <div class="cart-payment__box position-relative z-index-1 overflow-hidden">
            <img src="{{ asset('assets') }}/images/shapes/pattern-curve-six.png" alt="" class="position-absolute end-0 top-0 z-index--1">
            <img src="{{ asset('assets') }}/images/shapes/pattern-curve-five.png" alt="" class="position-absolute start-0 top-0 z-index--1">
            
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-10 text-center">
                    <img src="{{ asset('uploads/products/' . $product->image) }}" 
                         alt="{{ $product->title }}" class="img-fluid mb-4" style="max-width: 200px;">
                    
                    <h5 class="rating__title mb-2">{{ $product->title }}</h5>
            
                    <p class="text-muted mb-4">
                        Author: <a href="{{ $product->author_url }}" target="_blank">{{ $product->author }}</a>
                    </p>
                    <div class="ad-container large-ad">
                        {!! $bannerAd->code !!}
                    </div>
            
                    <div class="ad-container small-ad">
                        {!! $smallAd->code !!}
                    </div>           
            
                    <div class="cart-payment-card">
                        <div class="row gy-4">
                            <div class="col-lg-12">
                                <button id="downloadButton" class="btn btn-main btn-lg w-100 pill" disabled>
                                    Please Verify
                                </button>
                            </div>
                            <div class="col-lg-12" id="downloadOptions" style="display: none;">
                                <button id="freeDownload" data-product-id="{{ $product->id }}" class="btn btn-main btn-lg w-100 pill mb-3">
                                    Free Download<br>(Watch 7 Step Ads)
                                </button>         
                                <div class="ad-container large-ad">
                                    {!! $bannerAd->code !!}
                                </div>                  
                                <button id="premiumDownload" data-product-id="{{ $product->id }}" class="btn btn-main btn-lg w-100 pill mt-3">
                                    Premium Download<br>(Use 2 Credits)
                                </button>                                                                 
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="ad-container large-ad">
                        {!! $bannerAd->code !!}
                    </div>
            
                    <!-- Iklan kecil untuk mobile -->
                    <div class="ad-container small-ad">
                        {!! $smallAd->code !!}
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

<div class="modal fade" id="loginModal" data-bs-backdrop="false" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="color: black;" id="loginModalLabel">Login Required</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="loginForm">
            <div class="mb-3">
                <label for="login-username" class="form-label" style="color: black;">Username / Email</label>
              <input type="text" class="form-control" id="login-username" placeholder="Enter your Username / Email" required>
            </div>
            <div class="mb-3">
              <label for="login-password" style="color: black;" class="form-label">Password</label>
              <input type="password" class="form-control" id="login-password" placeholder="Enter your Password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
          </form>
          <div class="text-center">
            <a href="{{ route('showRegisterForm') }}" target="_blank" class="text-decoration-none" style="color: blue;">
              Don't have an account? Register here
            </a>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@push('footer-script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const downloadButton = document.getElementById('downloadButton');
        const downloadOptions = document.getElementById('downloadOptions');     
        let secondsLeft = 10;
        let isAdBlockActive = false;

        // Fungsi untuk memulai countdown
        function startCountdown() {
            downloadButton.disabled = true;
            downloadButton.textContent = `Download in `;
            const countdownElement = document.createElement('span');
            countdownElement.id = 'countdown';
            countdownElement.textContent = `${secondsLeft} seconds`;
            downloadButton.appendChild(countdownElement);

            const countdownTimer = setInterval(function () {
                secondsLeft--;
                countdownElement.textContent = `${secondsLeft} seconds`;

                if (secondsLeft <= 0) {
                    clearInterval(countdownTimer);
                    downloadButton.style.display = 'none';
                    downloadOptions.style.display = 'block';
                }
            }, 1000);
        }

        // Fungsi deteksi AdBlock
        (function detectAdBlock() {
            const bait = document.createElement('iframe');
            bait.style = 'width: 1px; height: 1px; position: absolute; left: -9999px; border: none;';
            bait.src = "https://ads.fakeurl.com";
            document.body.appendChild(bait);

            setTimeout(function () {
                if (!bait || bait.offsetParent === null || bait.offsetHeight === 0 || bait.offsetWidth === 0) {
                    adBlockDetected();
                } else {
                    adBlockNotDetected();
                }
                document.body.removeChild(bait);
            }, 100);
        })();

        // Fungsi jika AdBlock terdeteksi
        function adBlockDetected() {
            isAdBlockActive = true;
            downloadButton.disabled = false;
            downloadButton.textContent = 'Please disable your AdBlock. Click To Refresh';
            downloadButton.addEventListener('click', function () {
                location.reload();
            });
        }

        // Fungsi jika AdBlock tidak terdeteksi
        function adBlockNotDetected() {
            isAdBlockActive = false;
            downloadButton.disabled = false;
            downloadButton.textContent = 'Please Verify';

            downloadButton.addEventListener('click', function () {
                if (!isAdBlockActive) {
                    startCountdown();
                }
            }, { once: true });
        }
       
    });
</script>

<script>
    // Simulasi status login dan jumlah kredit pengguna
    const isUserLoggedIn = {{ Auth::check() ? 'true' : 'false' }};
    const userCredit = {{ $userDetail ? $userDetail->kredit : 0 }};
    
    document.getElementById('premiumDownload').addEventListener('click', function() {
        const productId = this.getAttribute('data-product-id');
      // Mengecek apakah pengguna sudah login
      if (isUserLoggedIn) {
        if (userCredit >= 2) {
          Swal.fire({
            title: 'Premium Download',
            text: 'You will use 2 credits to download. Do you want to continue?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, continue!',
            cancelButtonText: 'Cancel'
          }).then((result) => {
            if (result.isConfirmed) {
              // Tampilkan SweetAlert "Processing..."
              Swal.fire({
                title: 'Processing...',
                text: 'Please wait while we process your request.',
                icon: 'info',
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                  Swal.showLoading();
                }
              });

              // Kirim data ke server untuk pemotongan kredit dan unduhan
              fetch("{{ route('download.premium') }}", {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                  productId: productId
                })
              })
                .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            // Buka URL unduhan dalam tab baru
                            window.open(data.download_url, '_blank');

                            window.location.href = 'https://luglawhaulsano.net/4/6533224';
                        } else if (data.status === 'error') {
                            Swal.fire(
                            'Error!',
                            data.message,
                            'error'
                            );
                        }
                    })

                .catch(error => {
                  console.error('Error:', error);
                  Swal.fire({
                    title: 'Error',
                    text: 'An error occurred while processing your request.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                  });
                });
            }
          });
        } else {
          // Jika kredit kurang dari 2, munculkan pesan bahwa kredit tidak mencukupi
          Swal.fire({
            title: 'Not Enough Credits',
            text: 'You need at least 2 credits to download.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Claim Now',
            cancelButtonText: 'Use Free Download'
          }).then((result) => {
            if (result.isConfirmed) {
              // Jika pengguna memilih untuk mendaftar, arahkan mereka ke halaman pendaftaran kredit
              window.location.href = '{{ route("credit.dashboard") }}';
            }
          });
        }
      } else {
        // Jika belum login, munculkan modal login
        var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
        loginModal.show();
      }
    });

    // Event listener untuk form login modal
    document.getElementById('loginForm').addEventListener('submit', function(event) {
      event.preventDefault();
  
      // Ambil data form dari input dengan ID yang sesuai
      const identifier = document.getElementById('login-username').value;
      const password = document.getElementById('login-password').value;
  
      // Tampilkan SweetAlert saat proses login
      Swal.fire({
        title: 'Processing...',
        text: 'Please wait while we log you in.',
        icon: 'info',
        allowOutsideClick: false,
        showConfirmButton: false,
        willOpen: () => {
          Swal.showLoading();
        }
      });
  
      // Kirim data ke server menggunakan AJAX
      fetch("{{ route('login.modal') }}", {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
          identifier: identifier, // menggunakan username atau email dari input form
          password: password
        })
      })
      .then(response => response.json())
      .then(data => {
        // Jika login sukses
        if (data.status === 'success') {
          // Tutup modal
          var loginModal = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
          loginModal.hide();
  
          // Tampilkan pesan sukses dan reload halaman setelah login berhasil
          Swal.fire({
            title: 'Logged In!',
            text: data.message,
            icon: 'success',
            confirmButtonText: 'OK'
          }).then(() => {
            location.reload(); // Reload halaman setelah login berhasil
          });

        } else if (data.status === 'error') {
          // Jika login gagal karena akun belum diverifikasi atau kredensial salah
          Swal.fire({
            title: 'Login Failed',
            text: data.message,
            icon: 'error',
            confirmButtonText: 'Try Again'
          });
        }
      })
      .catch(error => {
        console.error('Error:', error);
        Swal.fire({
          title: 'Error',
          text: 'An error occurred while processing your request.',
          icon: 'error',
          confirmButtonText: 'OK'
        });
      });
    });
</script>
<script>
    const blogRoute = "{{ route('blog.One', ['token' => ':token']) }}";
    document.getElementById('freeDownload').addEventListener('click', function () {
        Swal.fire({
            title: 'Free Download',
            text: 'You will watch 7 step ads. If interrupted, you will have to start over from the beginning. Do you want to continue?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, I understand',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                const productId = this.getAttribute('data-product-id');
                const newTab = window.open('about:blank', '_blank'); // Buka tab kosong

                Swal.fire({
                    title: 'Processing...',
                    text: 'Generating your token, please wait.',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                fetch('/generate-tokens', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ product_id: productId })
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Generated Token:', data.token_satu);

                        Swal.close(); // Tutup spinner

                        // Gantikan placeholder ':token' dengan token_satu
                        const blogUrl = blogRoute.replace(':token', data.token_satu);
                        newTab.location.href = blogUrl; // Arahkan tab baru
                        window.location.href = 'https://www.google.com'; // Arahkan halaman dasar
                    })
                    .catch(error => {
                        console.error('Error:', error);

                        Swal.fire({
                            title: 'Error',
                            text: 'Something went wrong. Please try again later.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });

                        newTab.close(); // Tutup tab kosong jika error
                    });
            }
        });
    });
</script>
  
@endpush
