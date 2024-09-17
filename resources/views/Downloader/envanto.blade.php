@extends('Index.app')

@section('content')
<!-- ==================== Header End Here ==================== -->

<!-- ============================== Banner Two Start =========================== -->
<section class="banner-two position-relative z-index-1 overflow-hidden">
    <img src="assets/images/gradients/banner-two-gradient.png" alt="" class="bg--gradient white-version">
    <img src="assets/images/gradients/banner-two-gradient-dark.png" alt="" class="bg--gradient dark-version">
    <img src="assets/images/shapes/element-moon3.png" alt="" class="element one">
    <img src="assets/images/shapes/element-moon2.png" alt="" class="element two">
    <img src="assets/images/shapes/element-moon1.png" alt="" class="element three">
    
    
    <div class="container container-full">
        <div class="row gy-sm-5 gy-4 align-items-center">

            <div class="col-xl-3 col-sm-6 order-xl-0 order-2">
                <div class="position-relative z-index-1">
                    <img src="assets/images/shapes/dots-sm.png" alt="" class="dotted-img d-xl-block d-none white-version">
                    <img src="assets/images/shapes/dots-sm-white.png" alt="" class="dotted-img d-xl-block d-none dark-version">
                    <div class="statistics-wrapper">                    
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="banner-two__content">
                    <h2 class="banner-two__title text-center mb-3">Envanto Downloader</h2>
                    <p class="banner-two__desc text-center">
                        Download files from Envanto quickly and for free right here! Enjoy the convenience and speed without any additional cost. Simply enter the Envanto file URL and get the files you need instantly. Start downloading your favorite files with just a few clicks.
                    </p>
                    
                    <form action="#" class="search-box style-two">
                        <div class="search-box__select select-has-icon">
                            <select class="form-control form-control py-0 border-0 bg-transparent">
                                <option value="1" selected disabled>All Categories</option>
                                <option value="2">WordPress</option>
                                <option value="3">Laravel</option>
                                <option value="4">PHP</option>
                                <option value="5">React</option>
                                <option value="6">HTML</option>
                                <option value="7">Figma</option>
                            </select>
                        </div>
                        <input type="text" class="common-input common-input--lg pill shadow-sm" placeholder="Search theme, plugins &amp; more...">
                        <button type="submit" class="btn btn-main btn-icon icon border-0">
                            <img src="assets/images/icons/search.svg" alt="">
                        </button>
                    </form>
        
                    <div class="popular-search d-flex align-items-start gap-3 justify-content-center">
                        <h6 class="popular-search__title font-18 fw-700 mb-0 mt-1 flex-shrink-0 flx-align gap-1"> <span class="d-md-flex d-none">Popular</span> Search: </h6>
                        <ul class="search-list">
                            <li class="search-list__item">
                                <a href="all-product.html" class="search-list__link font-14 text-heading">theme</a>
                            </li>
                            <li class="search-list__item">
                                <a href="all-product.html" class="search-list__link font-14 text-heading">plugins</a>
                            </li>
                            <li class="search-list__item">
                                <a href="all-product.html" class="search-list__link font-14 text-heading">ui template</a>
                            </li>
                            <li class="search-list__item">
                                <a href="all-product.html" class="search-list__link font-14 text-heading">mobile app</a>
                            </li>
                            <li class="search-list__item">
                                <a href="all-product.html" class="search-list__link font-14 text-heading">html template</a>
                            </li>
                            <li class="search-list__item">
                                <a href="all-product.html" class="search-list__link font-14 text-heading">dashboard</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="position-relative z-index-1">
                    <img src="assets/images/shapes/dots-sm.png" alt="" class="dotted-img d-xl-block d-none white-version">
                    <img src="assets/images/shapes/dots-sm-white.png" alt="" class="dotted-img d-xl-block d-none dark-version">
                    <div class="statistics-wrapper style-right">                       
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ============================== Banner Two End =========================== -->
<!-- ============================ Popular Item Section Start =========================== -->
<section class="popular-item-card-section padding-y-120 overflow-hidden">

  <img src="assets/images/shapes/brush.png" alt="" class="element-brush">
  
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
                                    <a href="{{ route('product.details', $product->id) }}" class="link w-100"> 
                                        <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->title }}">
                                    </a>
                                    <div class="product-item__bottom flx-between gap-2">
                                        <div>
                                            <span class="product-item__sales font-14 mb-0 text-white">{{ $product->downloads_count }} Downloads</span>
                                            <div class="d-flex align-items-center gap-1">
                                                <ul class="star-rating">
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                                </ul>
                                                <span class="star-rating__text text-white fw-500 font-14"> (16)</span>
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
                                        <a href="{{ route('product.details', $product->id) }}" class="link"> {{ $product->title }}</a>
                                    </h6>
                                    <a href="{{ route('product.details', $product->id) }}" class="btn-link line-height-1 flex-shrink-0">
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
<!-- ============================ Popular Item Section End =========================== -->

<!-- ====================== Newsletter Section Start ===================== -->
<section class="newsletter position-relative z-index-1 overflow-hidden">
    <img src="assets/images/gradients/newsletter-gradient-bg.png" alt="" class="bg--gradient">

    <img src="assets/images/shapes/element1.png" alt="" class="element two">
    <img src="assets/images/shapes/element2.png" alt="" class="element one">

    <img src="assets/images/shapes/line-vector-one.png" alt="" class="line-vector one">
    <img src="assets/images/shapes/line-vector-two.png" alt="" class="line-vector two">

    <img src="assets/images/thumbs/newsletter-man.png" alt="" class="newsletter-man">
    
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
<!-- ====================== Newsletter Section End ===================== -->
@endsection
