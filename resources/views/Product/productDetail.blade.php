@extends('Index.app')
{{-- @push('header-script')    


@endpush --}}
@section('content')
<!-- ======================== Breadcrumb Two Section Start ===================== -->
<section class="breadcrumb border-bottom p-0 d-block section-bg position-relative z-index-1">
    <div class="breadcrumb-two">
        <img src="{{ asset('assets') }}/images/gradients/breadcrumb-gradient-bg.png" alt="" class="bg--gradient">
        <div class="container container-two">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="breadcrumb-two-content">
    
                        <ul class="breadcrumb-list flx-align gap-2 mb-2">
                            <li class="breadcrumb-list__item font-14 text-body">
                                <a href="/" class="breadcrumb-list__link text-body hover-text-main">Home</a>
                            </li>
                            <li class="breadcrumb-list__item font-14 text-body">
                                <span class="breadcrumb-list__icon font-10"><i class="fas fa-chevron-right"></i></span>
                            </li>
                            <li class="breadcrumb-list__item font-14 text-body">
                                <a href="{{ route('showAllProduct') }}" class="breadcrumb-list__link text-body hover-text-main">Products</a>
                            </li>
                            <li class="breadcrumb-list__item font-14 text-body">
                                <span class="breadcrumb-list__icon font-10"><i class="fas fa-chevron-right"></i></span>
                            </li>
                            @if($category)
                                <li class="breadcrumb-list__item font-14 text-body">
                                    <a href="{{ route('showProductByCategory', ['slug' => $category->slug]) }}" class="breadcrumb-list__link text-body hover-text-main">{{ $category->name }}</a>
                                </li>
                            @endif
                        </ul>
                        
                        
                        <h3 class="breadcrumb-two-content__title mb-3 text-capitalize">{{ $title }}</h3>
    
                        <div class="breadcrumb-content flx-align gap-3">
                            <div class="breadcrumb-content__item text-heading fw-500 flx-align gap-2">
                                <span class="text">By 
                                    <a href="{{ $product->author_url }}" class="link text-main fw-600">{{ $product->author }}</a> 
                                </span>
                            </div>                            
                            <div class="breadcrumb-content__item text-heading fw-500 flx-align gap-2">
                                <span class="icon">
                                    <img src="{{ asset('assets') }}/images/icons/download.svg" alt="" class="white-version">
                                    <img src="{{ asset('assets') }}/images/icons/download-white.svg" alt="" class="dark-version w-20">
                                </span>
                                <span class="text">{{ $downloadCount }} Downloads</span>
                            </div>                            
                            @foreach($additions as $addition)
                                <div class="breadcrumb-content__item text-heading fw-500 flx-align gap-2">
                                    <span class="icon">
                                        <img src="{{ asset('assets') }}/images/icons/check-icon.svg" alt="" class="white-version">
                                        <img src="{{ asset('assets') }}/images/icons/check-icon-white.svg" alt="" class="dark-version">
                                    </span>
                                    <span class="text">{{ trim($addition) }}</span> <!-- trim() digunakan untuk menghapus spasi yang tidak perlu -->
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container container-two">
        <div class="breadcrumb-tab flx-wrap align-items-start gap-lg-4 gap-2">
            <ul class="nav tab-bordered nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-product-details-tab" data-bs-toggle="pill" data-bs-target="#pills-product-details" type="button" role="tab" aria-controls="pills-product-details" aria-selected="true">Product Details</button>
                </li>
                {{-- <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-rating-tab" data-bs-toggle="pill" data-bs-target="#pills-rating" type="button" role="tab" aria-controls="pills-rating" aria-selected="false">
                    <span class="d-flex align-items-center gap-1">
                        <span class="star-rating">
                            <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                            <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                            <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                            <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                            <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                        </span>
                        <span class="star-rating__text text-body"> 5.0</span>
                        <span class="star-rating__text text-body"> (180)</span>
                    </span>
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-comments-tab" data-bs-toggle="pill" data-bs-target="#pills-comments" type="button" role="tab" aria-controls="pills-comments" aria-selected="false">Comments (50)</button>
                </li> --}}
            </ul>
            <div class="social-share">
                <button type="button" class="social-share__button">
                    <img src="{{ asset('assets') }}/images/icons/share-icon.svg" alt="">
                </button>
                <div class="social-share__icons">
                    <ul class="social-icon-list colorful-style">
                        <li class="social-icon-list__item">
                            <a href="https://www.facebook.com" class="social-icon-list__link text-body flex-center"><i class="fab fa-facebook-f"></i></a> 
                        </li>
                        <li class="social-icon-list__item">
                            <a href="https://www.twitter.com" class="social-icon-list__link text-body flex-center"> <i class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li class="social-icon-list__item">
                            <a href="https://www.google.com" class="social-icon-list__link text-body flex-center"> <i class="fab fa-twitter"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
</section>
<!-- ======================== Breadcrumb Two Section End ===================== -->

<!-- ======================= Product Details Section Start ==================== -->
<div class="product-details mt-32 padding-b-120">
    <div class="container container-two">
        <div class="row gy-4">
            <div class="col-lg-8">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-product-details" role="tabpanel" aria-labelledby="pills-product-details-tab" tabindex="0">
                        <!-- Product Details Content Start -->
                        <div class="product-details">
                            <div class="product-details__thumb">
                                <img src="{{ asset('uploads/products/' . $product->image) }}" alt="">
                            </div>
                            <div class="product-details__buttons flx-align justify-content-center gap-3">
                                {!! $bannerAd->code !!}
                                @if($product->live_preview_url !== $product->url_source)
                                    <a href="{{ $product->live_preview_url }}" target="_blank" class="btn btn-main d-inline-flex align-items-center gap-2 pill px-sm-5 justify-content-center">
                                        Live Preview
                                        <img src="{{ asset('assets') }}/images/icons/eye-outline.svg" alt=""> 
                                    </a>
                                @endif                                
                                <a href="{{ route('generate.download.link', $product->id) }}" class="btn btn-main d-inline-flex align-items-center gap-2 pill px-sm-5 justify-content-center">
                                    Download
                                    <img src="{{ asset('assets') }}/images/icons/download-white.svg" alt="">
                                </a>
                                {!! $bannerAd->code !!}
                            </div>
                            <p class="product-details__desc">{{ $product->description }}</p>

                            <div class="product-details__item">
                                <h5 class="product-details__title mb-3">Features</h5>
                                <ul class="product-list">
                                    @foreach($features as $feature)
                                        <li class="product-list__item">{{ trim($feature) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="product-details__item">
                                <h5 class="product-details__title mb-3">Tags</h5>
                                <ul class="product-list product-list--tags">
                                    @foreach($tags as $tag)
                                        <li class="product-list__item">{{ trim($tag) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            
                            <div class="more-item">
                                <div class="flx-between mb-4">
                                    <h5 class="more-item__title">More Items</h5>                                    
                                </div>
                                <div class="more-item__content flx-align">
                                    @foreach($relatedProducts as $relatedProduct)
                                        <div class="more-item__item">
                                            <a href="{{ url('product-details/'.$relatedProduct->slug) }}" class="link w-100 h-100 d-block">
                                                <img src="{{ asset('uploads/products/' . $relatedProduct->image) }}" alt="{{ $relatedProduct->title }}">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="col-lg-4">
                <!-- ======================= Product Sidebar Start ========================= -->
                <div class="product-sidebar section-bg">
                    <div class="product-sidebar__top position-relative flx-between gap-1">
                        <button type="button" class="btn-has-dropdown font-heading font-18">Regular Download</button>                        
                        <h6 class="product-sidebar__title">Free</h6>
                    </div>

                    <ul class="sidebar-list">
                        <li class="sidebar-list__item flx-align gap-2 font-14 fw-300 mb-2">
                            <span class="icon"><img src="{{ asset('assets') }}/images/icons/check-cirlce.svg" alt=""></span>
                            <span class="text">Quality verified</span>
                        </li>                      
                    </ul>
                    {!! $smallAd->code !!}
                    <button type="button" class="btn btn-main d-flex w-100 justify-content-center align-items-center gap-2 pill px-sm-5 mt-3 mb-3"
                        onclick="window.location.href='{{ route('generate.download.link', $product->id) }}'">
                        <img src="{{ asset('assets') }}/images/icons/download-white.svg" alt="">
                        Download
                    </button>                
                    {!! $petakAd->code !!}

                    <!-- Meta Attribute List Start -->
                    <ul class="meta-attribute">
                        <li class="meta-attribute__item">
                            <span class="name">File Type</span>
                            <span class="details">{{ $product->types }}</span>
                        </li>
                        <li class="meta-attribute__item">
                            <span class="name">Published</span>
                            <!-- Menampilkan tanggal created_at, diformat menjadi lebih mudah dibaca -->
                            <span class="details">{{ $product->created_at->format('M d, Y') }}</span>
                        </li>
                        <li class="meta-attribute__item">
                            <span class="name">Category</span>
                            <!-- Menampilkan nama kategori dari relasi product dan category -->
                            <span class="details">{{ $category ? $category->name : 'Uncategorized' }}</span>
                        </li>
                    </ul>
                    
                    <!-- Meta Attribute List End -->
                </div>
                {!! $besarAd->code !!}
            </div>
        </div>
    </div>
</div>
<!-- ======================= Product Details Section End ==================== -->

<!-- ======================== Brand Section Start ========================= -->
<div class="brand ">
    <div class="container container">
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