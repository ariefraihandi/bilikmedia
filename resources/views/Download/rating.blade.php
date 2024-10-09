@extends('Index.app')
@push('header-script')
    <style>
   .star-rating__item {
        color: #ccc;
        cursor: pointer;
        font-size: 24px;
        transition: color 0.3s;
    }

    .star-rating__item.active {
        color: #FFD700;
    }

    </style>
@endpush

@section('content')
<!-- ======================= Rating Section Start ========================= -->
<section class="rating-section padding-y-10 overflow-hidden">
    <div class="container container-two">        
        <div class="rating__box position-relative z-index-1 overflow-hidden">
            <img src="{{ asset('assets') }}/images/shapes/pattern-curve-six.png" alt="" class="position-absolute end-0 top-0 z-index--1">
            <img src="{{ asset('assets') }}/images/shapes/pattern-curve-five.png" alt="" class="position-absolute start-0 top-0 z-index--1">
            
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-10 text-center">
                    <!-- Gambar produk ditampilkan di tengah -->
                    <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->title }}" class="img-fluid mb-4" style="max-width: 200px;">
                    
                    <!-- Title Produk -->
                    <h5 class="rating__title mb-2">{{ $product->title }}</h5>
                    
                    <!-- Author Produk -->
                    <p class="text-muted mb-4">Author: <a href="{{ $product->author_url }}" target="_blank">{{ $product->author }}</a></p>

                    <!-- Form untuk mengirimkan rating -->
                    <div class="rating-form">
                        <form action="{{ route('rating.submit') }}" method="POST">
                            @csrf
                            <!-- Mengirimkan product_id sebagai input tersembunyi -->
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            
                            <!-- Mengirimkan rating sebagai input tersembunyi -->
                            <input type="hidden" id="rating-input" name="rating" value="">
                        
                            <!-- Input Rating Bintang -->
                            <div class="d-flex justify-content-center align-items-center gap-1">
                                <ul class="star-rating d-flex justify-content-center list-unstyled mb-0">
                                    <!-- Bintang ke-1 -->
                                    <li class="star-rating__item" data-value="1">
                                        <i class="fas fa-star"></i>
                                    </li>
                                    <!-- Bintang ke-2 -->
                                    <li class="star-rating__item" data-value="2">
                                        <i class="fas fa-star"></i>
                                    </li>
                                    <!-- Bintang ke-3 -->
                                    <li class="star-rating__item" data-value="3">
                                        <i class="fas fa-star"></i>
                                    </li>
                                    <!-- Bintang ke-4 -->
                                    <li class="star-rating__item" data-value="4">
                                        <i class="fas fa-star"></i>
                                    </li>
                                    <!-- Bintang ke-5 -->
                                    <li class="star-rating__item" data-value="5">
                                        <i class="fas fa-star"></i>
                                    </li>
                                </ul>                                
                            </div>
                        
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-main btn-lg w-100 pill mt-3 mb-5">Submit Rating</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</section>

@endsection

@push('footer-script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stars = document.querySelectorAll('.star-rating__item');
        const ratingInput = document.getElementById('rating-input');

        // Tambahkan event listener ke setiap bintang
        stars.forEach(star => {
            star.addEventListener('click', function () {
                const ratingValue = this.getAttribute('data-value'); // Ambil nilai bintang yang dipilih
                ratingInput.value = ratingValue; // Set nilai ke input hidden

                // Tambahkan class 'active' ke bintang yang dipilih dan semua sebelumnya
                stars.forEach(s => {
                    s.classList.remove('active');
                    if (s.getAttribute('data-value') <= ratingValue) {
                        s.classList.add('active');
                    }
                });
            });
        });
    });
</script>

@endpush
