@extends('Index.app')
@push('header-script')
    <script src="https://alwingulla.com/88/tag.min.js" data-zone="104084" async data-cfasync="false"></script>
    {!! $socialAd->code !!}
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

<!-- ==================== Header End Here ==================== -->

<!-- ======================= Cart Payment Section Start ========================= -->
<section class="cart-payment padding-y-10 overflow-hidden">
    <div class="container container-two">        
        <div class="cart-payment__box position-relative z-index-1 overflow-hidden">
            <img src="{{ asset('assets') }}/images/shapes/pattern-curve-six.png" alt="" class="position-absolute end-0 top-0 z-index--1">
            <img src="{{ asset('assets') }}/images/shapes/pattern-curve-five.png" alt="" class="position-absolute start-0 top-0 z-index--1">
            
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-10 text-center">
                    <!-- Gambar produk ditampilkan di tengah -->
                    <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->title }}" class="img-fluid mb-4" style="max-width: 200px;">
                                        
                    <h5 class="rating__title mb-2">{{ $product->title }}</h5>
                    
                    <p class="text-muted mb-4">Author: <a href="{{ $product->author_url }}" target="_blank">{{ $product->author }}</a></p>
                    {!! $bannerAd->code !!}
                    <br>
                    <div class="cart-payment-card">
                        <form action="#">
                            <div class="row gy-4">
                                <div class="col-lg-12">                                  
                                    <!-- Tombol Download dengan hitung mundur -->
                                    <button id="downloadButton" class="btn btn-main btn-lg w-100 pill" disabled>Download in <span id="countdown">10</span> seconds</button>
                                </div>                                
                            </div>
                            
                        </form>
                    </div>
                    <br>
                    {!! $bannerAd->code !!}
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
    document.addEventListener('DOMContentLoaded', function () {
        var countdownElement = document.getElementById('countdown');
        var downloadButton = document.getElementById('downloadButton');
        var adLeft = document.querySelector('.ad-banner.left');
        var adRight = document.querySelector('.ad-banner.right');
        var targetSection = document.querySelector('.cart-payment__box');
        var secondsLeft = 10;
        var isAdBlockActive = false; // Flag to track AdBlock status

        // Fungsi untuk memulai hitung mundur download
        function startCountdown() {
            var countdownTimer = setInterval(function () {
                secondsLeft--;
                countdownElement.textContent = secondsLeft;

                // Ketika hitungan mencapai 0, aktifkan tombol
                if (secondsLeft <= 0) {
                    clearInterval(countdownTimer);
                    downloadButton.textContent = 'Download';
                    downloadButton.disabled = false;
                }
            }, 1000);
        }

        // Fungsi untuk deteksi AdBlock
        (function() {
            function adBlockDetected() {
                isAdBlockActive = true; // Set flag AdBlock aktif
                downloadButton.disabled = false; // Aktifkan tombol untuk refresh
                downloadButton.textContent = 'Please disable your AdBlock. Click To Refresh'; // Ubah teks tombol
            }

            function adBlockNotDetected() {
                isAdBlockActive = false; // Set flag AdBlock non-aktif
                downloadButton.disabled = true; // Nonaktifkan tombol hingga countdown selesai
                startCountdown(); // Mulai hitung mundur jika tidak ada AdBlock
            }

            var bait = document.createElement('iframe');
            bait.style = 'width: 1px; height: 1px; position: absolute; left: -9999px; border: none;';
            bait.src = "https://ads.fakeurl.com";
            document.body.appendChild(bait);

            setTimeout(function() {
                if (!bait || bait.offsetParent === null || bait.offsetHeight === 0 || bait.offsetWidth === 0) {
                    adBlockDetected();
                } else {
                    adBlockNotDetected();
                }
                document.body.removeChild(bait);
            }, 100);
        })();

        // Fungsi untuk menyesuaikan posisi banner agar berhenti pada akhir section
        window.addEventListener('scroll', function () {
            var scrollTop = window.scrollY || document.documentElement.scrollTop;
            var windowHeight = window.innerHeight;
            var sectionBottom = targetSection.offsetTop + targetSection.offsetHeight;

            // Jika scroll mencapai bagian bawah section
            if (scrollTop + windowHeight >= sectionBottom) {
                var bottomPosition = sectionBottom - windowHeight;
                adLeft.style.position = 'absolute';
                adRight.style.position = 'absolute';
                adLeft.style.top = bottomPosition + 'px';
                adRight.style.top = bottomPosition + 'px';
            } else {
                adLeft.style.position = 'fixed';
                adRight.style.position = 'fixed';
                adLeft.style.top = '100px';
                adRight.style.top = '100px';
            }
        });
    });

</script>
@endpush
