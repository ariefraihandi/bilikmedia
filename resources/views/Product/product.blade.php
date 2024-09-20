@extends('Index.app')

@section('content')
<!-- ==================== Header End Here ==================== -->

<!-- ======================== Breadcrumb one Section Start ===================== -->
<section class="breadcrumb breadcrumb-one padding-y-60 section-bg position-relative z-index-1 overflow-hidden">

    <img src="{{ asset('assets') }}/images/gradients/breadcrumb-gradient-bg.png" alt="" class="bg--gradient">

    <img src="{{ asset('assets') }}/images/shapes/element-moon3.png" alt="" class="element one">
    <img src="{{ asset('assets') }}/images/shapes/element-moon1.png" alt="" class="element three">
    
    <div class="container container-two">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="breadcrumb-one-content">
                    <h3 class="breadcrumb-one-content__title text-center mb-3 text-capitalize">58,000+ products available for download</h3>
                    <p class="breadcrumb-one-content__desc text-center text-black-three">Explore the best premium themes and plugins available for sale. Our unique collection is hand-curated by experts. Find and buy the perfect premium theme.</p>
    
                    <form action="#" class="search-box">
                        <input type="text" id="searchInput" class="common-input common-input--lg pill shadow-sm" placeholder="Search title, freepik url, envanto url &amp; more..." oninput="handleInputChange(this.value)">
                        <button type="submit" class="btn btn-main btn-icon icon border-0">
                            <img src="{{ asset('assets') }}/images/icons/search.svg" alt="">
                        </button>
                    </form>
    
                    <!-- Container untuk menampilkan saran pencarian -->
                    <ul id="suggestionList" class="list-group" style="display: none;"></ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="all-product padding-y-120">
    <div class="container container-two">
        <div class="row">
            <div class="col-lg-12">
                <div class="filter-tab gap-3 flx-between">
                    <button type="button" class="filter-tab__button btn btn-outline-light pill d-flex align-items-center">
                        <span class="icon icon-left"><img src="{{ asset('assets') }}/images/icons/filter.svg" alt=""></span>
                        <span class="font-18 fw-500">Filters</span>
                    </button>
                    <ul class="nav common-tab nav-pills mb-0 gap-lg-2 gap-1 ms-lg-auto" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-product-tab" data-bs-toggle="pill" data-bs-target="#pills-product" type="button" role="tab" aria-controls="pills-product" aria-selected="true">All Item</button>
                        </li>
                        {{-- <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-bestMatch-tab" data-bs-toggle="pill" data-bs-target="#pills-bestMatch" type="button" role="tab" aria-controls="pills-bestMatch" aria-selected="false">Best Match</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-bestRating-tab" data-bs-toggle="pill" data-bs-target="#pills-bestRating" type="button" role="tab" aria-controls="pills-bestRating" aria-selected="false">Best Rating</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending" aria-selected="false">Site Template</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-bestOffers-tab" data-bs-toggle="pill" data-bs-target="#pills-bestOffers" type="button" role="tab" aria-controls="pills-bestOffers" aria-selected="false">Best Offers</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-bestSelling-tab" data-bs-toggle="pill" data-bs-target="#pills-bestSelling" type="button" role="tab" aria-controls="pills-bestSelling" aria-selected="false">Best Selling</button>
                        </li> --}}
                    </ul>
                    <div class="list-grid d-flex align-items-center gap-2">
                        <button class="list-grid__button list-button d-sm-flex d-none text-body"><i class="las la-list"></i></button>
                        <button class="list-grid__button grid-button d-sm-flex d-none active text-body"><i class="las la-border-all"></i></button>
                        <button class="list-grid__button sidebar-btn text-body d-lg-none d-flex"><i class="las la-bars"></i></button>
                    </div>
                </div>
                <form action="#" class="filter-form pb-4 ">
                    <div class="row gy-3">
                        <div class="col-sm-4 col-xs-6">
                            <div class="flx-between gap-1">
                                <label for="tag" class="form-label font-16">Tag</label>
                                <button type="reset" class="text-body font-14">Clear</button>
                            </div>
                            <div class="position-relative">
                                <input type="text" class="common-input border-gray-five common-input--withLeftIcon" id="tag" placeholder="Search By Tag...">
                                <span class="input-icon input-icon--left"><img src="{{ asset('assets') }}/images/icons/search-two.svg" alt=""></span>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="flx-between gap-1">
                                <label for="Price" class="form-label font-16">Price</label>
                                <button type="reset" class="text-body font-14">Clear</button>
                            </div>
                            <div class="position-relative">
                                <input type="text" class="common-input border-gray-five" id="Price" placeholder="$7 - $29">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="flx-between gap-1">
                                <label for="time" class="form-label font-16">Time Frame</label>
                                <button type="reset" class="text-body font-14">Clear</button>
                            </div>
                            <div class="position-relative select-has-icon">
                                <select id="time" class="common-input border-gray-five">
                                    <option value="1">Now</option>
                                    <option value="2">Yesterday</option>
                                    <option value="2">1 Month Ago</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-3 col-lg-4">
                <!-- ===================== Filter Sidebar Start ============================= -->
                <div class="filter-sidebar">
                    <button type="button" class="filter-sidebar__close p-2 position-absolute end-0 top-0 z-index-1 text-body hover-text-main font-20 d-lg-none d-block"><i class="las la-times"></i></button>
                    <div class="filter-sidebar__item">
                        <button type="button" class="filter-sidebar__button font-16 text-capitalize fw-500">Category</button>
                        <div class="filter-sidebar__content">
                            <ul class="filter-sidebar-list">
                                @foreach($categories as $category)
                                    <li class="filter-sidebar-list__item">
                                        <a href="{{ route('showProductByCategory', $category->slug) }}" class="filter-sidebar-list__text">
                                            {{ $category->name }} <span class="qty">{{ $category->products_count }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    
                    <div class="filter-sidebar__item">
                        <button type="button" class="filter-sidebar__button font-16 text-capitalize fw-500">Rating</button>
                        <div class="filter-sidebar__content">
                            <ul class="filter-sidebar-list">
                                <li class="filter-sidebar-list__item">
                                    <div class="filter-sidebar-list__text">
                                        <div class="common-check common-radio">
                                            <input class="form-check-input" type="radio" name="radio" id="veiwAll">
                                            <label class="form-check-label" for="veiwAll"> View All</label>
                                        </div>
                                        <span class="qty">(1859)</span>
                                    </div>
                                </li>
                                <li class="filter-sidebar-list__item">
                                    <div class="filter-sidebar-list__text">
                                        <div class="common-check common-radio">
                                            <input class="form-check-input" type="radio" name="radio" id="oneStar">
                                            <label class="form-check-label" for="oneStar"> 1 Star and above</label>
                                        </div>
                                        <span class="qty">(785)</span>
                                    </div>
                                </li>
                                <li class="filter-sidebar-list__item">
                                    <div class="filter-sidebar-list__text">
                                        <div class="common-check common-radio">
                                            <input class="form-check-input" type="radio" name="radio" id="twoStar">
                                            <label class="form-check-label" for="twoStar"> 2 Star and above</label>
                                        </div>
                                        <span class="qty">(1250)</span>
                                    </div>
                                </li>
                                <li class="filter-sidebar-list__item">
                                    <div class="filter-sidebar-list__text">
                                        <div class="common-check common-radio">
                                            <input class="form-check-input" type="radio" name="radio" id="threeStar">
                                            <label class="form-check-label" for="threeStar"> 3 Star and above</label>
                                        </div>
                                        <span class="qty">(7580)</span>
                                    </div>
                                </li>
                                <li class="filter-sidebar-list__item">
                                    <div class="filter-sidebar-list__text">
                                        <div class="common-check common-radio">
                                            <input class="form-check-input" type="radio" name="radio" id="fourStar">
                                            <label class="form-check-label" for="fourStar"> 4 Star and above</label>
                                        </div>
                                        <span class="qty">(1450)</span>
                                    </div>
                                </li>
                                <li class="filter-sidebar-list__item">
                                    <div class="filter-sidebar-list__text">
                                        <div class="common-check common-radio">
                                            <input class="form-check-input" type="radio" name="radio" id="fiveStar">
                                            <label class="form-check-label" for="fiveStar"> 5 Star Rating</label>
                                        </div>
                                        <span class="qty">(2530)</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="filter-sidebar__item">
                        <button type="button" class="filter-sidebar__button font-16 text-capitalize fw-500">Date Updated</button>
                        <div class="filter-sidebar__content">
                            <ul class="filter-sidebar-list">
                                <li class="filter-sidebar-list__item">
                                    <div class="filter-sidebar-list__text">
                                        <div class="common-check common-radio">
                                            <input class="form-check-input" type="radio" name="radio" id="anyDate">
                                            <label class="form-check-label" for="anyDate"> Any Date</label>
                                        </div>
                                        <span class="qty"> 5,203</span>
                                    </div>
                                </li>
                                <li class="filter-sidebar-list__item">
                                    <div class="filter-sidebar-list__text">
                                        <div class="common-check common-radio">
                                            <input class="form-check-input" type="radio" name="radio" id="lastYear">
                                            <label class="form-check-label" for="lastYear"> In the last year</label>
                                        </div>
                                        <span class="qty">1,258</span>
                                    </div>
                                </li>
                                <li class="filter-sidebar-list__item">
                                    <div class="filter-sidebar-list__text">
                                        <div class="common-check common-radio">
                                            <input class="form-check-input" type="radio" name="radio" id="lastMonth">
                                            <label class="form-check-label" for="lastMonth"> In the last month</label>
                                        </div>
                                        <span class="qty">2450</span>
                                    </div>
                                </li>
                                <li class="filter-sidebar-list__item">
                                    <div class="filter-sidebar-list__text">
                                        <div class="common-check common-radio">
                                            <input class="form-check-input" type="radio" name="radio" id="LastWeek">
                                            <label class="form-check-label" for="LastWeek"> In the last week</label>
                                        </div>
                                        <span class="qty">325</span>
                                    </div>
                                </li>
                                <li class="filter-sidebar-list__item">
                                    <div class="filter-sidebar-list__text">
                                        <div class="common-check common-radio">
                                            <input class="form-check-input" type="radio" name="radio" id="lastDay">
                                            <label class="form-check-label" for="lastDay"> In the last day</label>
                                        </div>
                                        <span class="qty">745</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>           
            <div class="col-xl-9 col-lg-8">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-product" role="tabpanel" aria-labelledby="pills-product-tab" tabindex="0">
                        <div class="row gy-4 list-grid-wrapper">
                            @forelse($products as $product)
                                <div class="col-xl-4 col-sm-6">
                                    <div class="product-item section-bg">
                                        <div class="product-item__thumb d-flex">
                                            <a href="{{ url('product-details/'.$product->slug) }}" class="link w-100">
                                                <img src="{{ asset('uploads/products/' . $product->image) }}" alt="" class="cover-img"> 
                                            </a>
                                        </div>
                                        <div class="product-item__content">
                                            <h6 class="product-item__title">
                                                <a href="{{ url('product-details/'.$product->slug) }}" class="link">{{ $product->title }}</a>
                                            </h6>
                                            <div class="product-item__info flx-between gap-2">
                                                <span class="product-item__author">
                                                    by
                                                    <a href="{{ $product->author_url }}" class="link hover-text-decoration-underline">{{ $product->author }}</a>
                                                </span>
                                                <span class="product-item__sales font-14 mb-2">{{ $product->downloads_count }} Downloads</span>
                            
                                                <!-- Menampilkan Rating -->
                                                <div class="d-flex align-items-center gap-1">
                                                    <ul class="star-rating">
                                                        @php
                                                            // Cek apakah ada rating yang tersedia
                                                            $avgRating = $product->ratings_avg_rating ?? 0; // Rata-rata rating atau 0
                                                            $ratingCount = $product->ratings_count ?? 0; // Jumlah rating
                            
                                                            // Tentukan berapa bintang yang diisi penuh
                                                            $filledStars = floor($avgRating);
                                                            $emptyStars = 5 - $filledStars; // Sisa bintang kosong
                                                        @endphp
                            
                                                        <!-- Loop untuk menampilkan bintang yang terisi penuh -->
                                                        @for ($i = 0; $i < $filledStars; $i++)
                                                            <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                                        @endfor
                            
                                                        <!-- Loop untuk menampilkan bintang kosong -->
                                                        @for ($i = 0; $i < $emptyStars; $i++)
                                                            <li class="star-rating__item font-11"><i class="far fa-star"></i></li> <!-- Far adalah versi kosong dari icon bintang -->
                                                        @endfor
                                                    </ul>
                            
                                                    <!-- Menampilkan jumlah rating -->
                                                    <span class="star-rating__text text-heading fw-500 font-14">
                                                        ({{ $product->ratings_count > 0 ? $product->ratings_count : 0 }}) <!-- Tampilkan jumlah rating -->
                                                    </span>
                                                </div>
                            
                                                <div class="flx-align gap-2">
                                                    <h6 class="product-item__price mb-0">Free</h6>
                                                    <span class="product-item__prevPrice text-decoration-line-through">$300</span>
                                                </div>
                                            </div>
                                            <div class="product-item__bottom flx-between gap-2">
                                                <a href="{{ route('generate.download.link', $product->id) }}" class="btn btn-outline-light btn-sm pill">Download</a>
                                                @if($product->live_preview_url !== $product->url_source)
                                                    <a href="{{ $product->live_preview_url }}" class="btn btn-outline-light btn-sm pill">Live Demo</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center">
                                    <p>No items available</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
            
                    <!-- Pagination Links -->
                    <div class="pagination-wrapper mt-4">
                        {{ $products->links() }} <!-- Memunculkan tautan pagination -->
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<section class="resource style-two padding-y-120 section-bg position-relative z-index-1 overflow-hidden">

    <img src="{{ asset('assets') }}/images/shapes/element-moon1.png" alt="" class="element one">
    <img src="{{ asset('assets') }}/images/shapes/curve-pattern3.png" alt="" class="d-none position-absolute end-0 top-0 z-index--1">
    
    <div class="container container-two">
        <div class="section-heading style-left style-flex flx-between align-items-end gap-3">
            <div class="section-heading__inner w-lg">
                <h3 class="section-heading__title">Free Resources</h3>
                <p class="section-heading__desc">Every month we pick some best products for you. This month's best web themes &amp; templates have arrived, chosen by our content specialists.</p>
            </div>
            <a href="#" class="btn btn-main btn-lg pill">View All Items</a>
        </div>
        <div class="resource-slider gy-4">
            <div class="product-item shadow-sm">
    <div class="product-item__thumb d-flex">
        <a href="product-details.html" class="link w-100">
            <img src="{{ asset('assets') }}/images/thumbs/product-img1.png" alt="" class="cover-img"> 
        </a>
        <button type="button" class="product-item__wishlist"><i class="fas fa-heart"></i></button>
    </div>
    <div class="product-item__content">
        <h6 class="product-item__title">
            <a href="product-details.html" class="link">SaaS dashboard digital products Title here</a>
        </h6>
        <div class="product-item__info flx-between gap-2">
            <span class="product-item__author">
                by
                <a href="profile.html" class="link hover-text-decoration-underline"> themepix</a>
            </span>
            <div class="flx-align gap-2">
                <h6 class="product-item__price mb-0">$120</h6>
                <span class="product-item__prevPrice text-decoration-line-through">$259</span>
            </div>
        </div>
        <div class="product-item__bottom flx-between gap-2">
            <div>
                <span class="product-item__sales font-14 mb-2">1200 Sales</span>
                <div class="d-flex align-items-center gap-1">
                    <ul class="star-rating">
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                    </ul>
                    <span class="star-rating__text text-heading fw-500 font-14"> (16)</span>
                </div>
            </div>
            <a href="product-details.html" class="btn btn-outline-light btn-sm pill">Live Demo</a>
        </div>
    </div>
    </div>
            <div class="product-item shadow-sm">
                <div class="product-item__thumb d-flex">
                    <a href="product-details.html" class="link w-100">
                        <img src="{{ asset('assets') }}/images/thumbs/product-img2.png" alt="" class="cover-img"> 
                    </a>
                    <button type="button" class="product-item__wishlist"><i class="fas fa-heart"></i></button>
                </div>
                <div class="product-item__content">
                    <h6 class="product-item__title">
                        <a href="product-details.html" class="link">SaaS dashboard digital products Title here</a>
                    </h6>
                    <div class="product-item__info flx-between gap-2">
                        <span class="product-item__author">
                            by
                            <a href="profile.html" class="link hover-text-decoration-underline"> themepix</a>
                        </span>
                        <div class="flx-align gap-2">
                            <h6 class="product-item__price mb-0">$100</h6>
                            <span class="product-item__prevPrice text-decoration-line-through">$130</span>
                        </div>
                    </div>
                    <div class="product-item__bottom flx-between gap-2">
                        <div>
                            <span class="product-item__sales font-14 mb-2">952 Sales</span>
                            <div class="d-flex align-items-center gap-1">
                                <ul class="star-rating">
                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                </ul>
                                <span class="star-rating__text text-heading fw-500 font-14"> (16)</span>
                            </div>
                        </div>
                        <a href="product-details.html" class="btn btn-outline-light btn-sm pill">Live Demo</a>
                    </div>
                </div>
            </div>
            <div class="product-item shadow-sm">
    <div class="product-item__thumb d-flex">
        <a href="product-details.html" class="link w-100">
            <img src="{{ asset('assets') }}/images/thumbs/product-img3.png" alt="" class="cover-img"> 
        </a>
        <button type="button" class="product-item__wishlist"><i class="fas fa-heart"></i></button>
    </div>
    <div class="product-item__content">
        <h6 class="product-item__title">
            <a href="product-details.html" class="link">SaaS dashboard digital products Title here</a>
        </h6>
        <div class="product-item__info flx-between gap-2">
            <span class="product-item__author">
                by
                <a href="profile.html" class="link hover-text-decoration-underline"> themepix</a>
            </span>
            <div class="flx-align gap-2">
                <h6 class="product-item__price mb-0">$160</h6>
                <span class="product-item__prevPrice text-decoration-line-through">$000</span>
            </div>
        </div>
        <div class="product-item__bottom flx-between gap-2">
            <div>
                <span class="product-item__sales font-14 mb-2">1000 Sales</span>
                <div class="d-flex align-items-center gap-1">
                    <ul class="star-rating">
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                    </ul>
                    <span class="star-rating__text text-heading fw-500 font-14"> (16)</span>
                </div>
            </div>
            <a href="product-details.html" class="btn btn-outline-light btn-sm pill">Live Demo</a>
        </div>
    </div>
    </div>
            <div class="product-item shadow-sm">
                <div class="product-item__thumb d-flex">
                    <a href="product-details.html" class="link w-100">
                        <img src="{{ asset('assets') }}/images/thumbs/product-img4.png" alt="" class="cover-img"> 
                    </a>
                    <button type="button" class="product-item__wishlist"><i class="fas fa-heart"></i></button>
                </div>
                <div class="product-item__content">
                    <h6 class="product-item__title">
                        <a href="product-details.html" class="link">SaaS dashboard digital products Title here</a>
                    </h6>
                    <div class="product-item__info flx-between gap-2">
                        <span class="product-item__author">
                            by
                            <a href="profile.html" class="link hover-text-decoration-underline"> themepix</a>
                        </span>
                        <div class="flx-align gap-2">
                            <h6 class="product-item__price mb-0">$250</h6>
                            <span class="product-item__prevPrice text-decoration-line-through">$300</span>
                        </div>
                    </div>
                    <div class="product-item__bottom flx-between gap-2">
                        <div>
                            <span class="product-item__sales font-14 mb-2">320 Sales</span>
                            <div class="d-flex align-items-center gap-1">
                                <ul class="star-rating">
                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                </ul>
                                <span class="star-rating__text text-heading fw-500 font-14"> (16)</span>
                            </div>
                        </div>
                        <a href="product-details.html" class="btn btn-outline-light btn-sm pill">Live Demo</a>
                    </div>
                </div>
            </div>
            <div class="product-item shadow-sm">
    <div class="product-item__thumb d-flex">
        <a href="product-details.html" class="link w-100">
            <img src="{{ asset('assets') }}/images/thumbs/product-img5.png" alt="" class="cover-img"> 
        </a>
        <button type="button" class="product-item__wishlist"><i class="fas fa-heart"></i></button>
    </div>
    <div class="product-item__content">
        <h6 class="product-item__title">
            <a href="product-details.html" class="link">SaaS dashboard digital products Title here</a>
        </h6>
        <div class="product-item__info flx-between gap-2">
            <span class="product-item__author">
                by
                <a href="profile.html" class="link hover-text-decoration-underline"> themepix</a>
            </span>
            <div class="flx-align gap-2">
                <h6 class="product-item__price mb-0">$65</h6>
                <span class="product-item__prevPrice text-decoration-line-through">$85</span>
            </div>
        </div>
        <div class="product-item__bottom flx-between gap-2">
            <div>
                <span class="product-item__sales font-14 mb-2">1001 Sales</span>
                <div class="d-flex align-items-center gap-1">
                    <ul class="star-rating">
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                    </ul>
                    <span class="star-rating__text text-heading fw-500 font-14"> (16)</span>
                </div>
            </div>
            <a href="product-details.html" class="btn btn-outline-light btn-sm pill">Live Demo</a>
        </div>
    </div>
    </div>
        </div>
    </div>
</section>

<div class="brand margin-t-120">
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

@push('footer-script')
    <script>
        const requestDownloadUrl = "{{ route('request.download') }}";
        
        function handleInputChange(value) {      

            if (value.length > 0) {
                fetch(`/search-products?search=${value}`)
                    .then(response => response.json())
                    .then(data => {
                        let suggestionList = document.getElementById('suggestionList');
                        suggestionList.innerHTML = '';

                        if (data.products.length > 0) {
                            // Tampilkan hasil produk jika ada
                            data.products.forEach(product => {
                                let li = document.createElement('li');
                                li.classList.add('list-group-item');
                                li.innerHTML = `<strong>${product.title}</strong> - Category: ${product.categories[0]?.name ?? 'No Category'}`;
                                li.addEventListener('click', function() {
                                    window.location.href = `/product-details/${product.slug}`;
                                });
                                suggestionList.appendChild(li);
                            });
                        } else if (data.categories.length > 0) {
                            // Jika tidak ada produk, tampilkan hasil kategori
                            data.categories.forEach(category => {
                                let li = document.createElement('li');
                                li.classList.add('list-group-item');
                                li.innerHTML = `<strong>Category: ${category.name}</strong>`;
                                li.addEventListener('click', function() {
                                    window.location.href = `/product/category/${category.slug}`;
                                });
                                suggestionList.appendChild(li);
                            });
                        } else {
                            // Jika tidak ada hasil produk maupun kategori, tampilkan opsi "Request File"
                            let li = document.createElement('li');
                            li.classList.add('list-group-item', 'text-center');
                            li.innerHTML = `<strong>No results found.</strong><br> <a href="${requestDownloadUrl}">Request File</a>`;
                            suggestionList.appendChild(li);
                        }

                        suggestionList.style.display = 'block';
                    })
                    .catch(error => {
                        console.error('Error during fetch:', error);
                    });
            } else {
                document.getElementById('suggestionList').style.display = 'none';
            }
        }
    </script>
@endpush