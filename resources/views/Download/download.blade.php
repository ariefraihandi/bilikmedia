@extends('Index.app')

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
                </div>
            </div>
            
        </div>        
    </div>
</section>
<!-- ======================= Cart Payment Section End ========================= -->

<!-- ======================== Brand Section Start ========================= -->
<div class="brand ">
    <div class="container container mb-3">
        <div class="brand-slider">
            <div class="brand-item d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets') }}/images/thumbs/brand-img1.png" alt="" class="white-version">
                <img src="{{ asset('assets') }}/images/thumbs/brand-white-img1.png" alt="" class="dark-version">
            </div>
            <div class="brand-item d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets') }}/images/thumbs/brand-img2.png" alt="" class="white-version">
                <img src="{{ asset('assets') }}/images/thumbs/brand-white-img2.png" alt="" class="dark-version">
            </div>
            <div class="brand-item d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets') }}/images/thumbs/brand-img3.png" alt="" class="white-version">
                <img src="{{ asset('assets') }}/images/thumbs/brand-white-img3.png" alt="" class="dark-version">
            </div>
            <div class="brand-item d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets') }}/images/thumbs/brand-img4.png" alt="" class="white-version">
                <img src="{{ asset('assets') }}/images/thumbs/brand-white-img4.png" alt="" class="dark-version">
            </div>
            <div class="brand-item d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets') }}/images/thumbs/brand-img5.png" alt="" class="white-version">
                <img src="{{ asset('assets') }}/images/thumbs/brand-white-img5.png" alt="" class="dark-version">
            </div>
            <div class="brand-item d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets') }}/images/thumbs/brand-img3.png" alt="" class="white-version">
                <img src="{{ asset('assets') }}/images/thumbs/brand-white-img3.png" alt="" class="dark-version">
            </div>
        </div>
    </div>
</div>
<!-- ======================== Brand Section End ========================= -->

@endsection

@push('footer-script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var countdownElement = document.getElementById('countdown');
        var downloadButton = document.getElementById('downloadButton');
        var secondsLeft = 10;
        
        // Hitung mundur selama 10 detik
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
        
        // Event listener untuk membuka url_download ketika tombol di klik
        downloadButton.addEventListener('click', function (event) {
            event.preventDefault(); // Mencegah aksi default form
            
            // Buka file unduhan di tab baru
            window.open("{{ $product->url_download }}", '_blank');
            
            // Setelah unduhan selesai, arahkan ke halaman rating dengan token
            setTimeout(function() {
                window.location.href = "/rating/{{ $download->token ?? '' }}";
            }, 2000); // Tambahkan jeda waktu untuk memastikan unduhan dimulai
        });
    });
</script>
@endpush