@extends('Index.app')

@section('content')
<section class="banner-three">
    <div class="container container-full">
        <div class="banner-three__wrapper section-bg position-relative z-index-1">

            <img src="{{ asset('assets') }}/images/gradients/banner-gradient-two.png" alt="" class="bg--gradient">
            <img src="{{ asset('assets') }}/images/shapes/line-curve1.png" alt="" class="line-curve one">
            <img src="{{ asset('assets') }}/images/shapes/line-curve2.png" alt="" class="line-curve two">
            <img src="{{ asset('assets') }}/images/shapes/element2.png" alt="" class="element two">
            
            <div class="banner-three__inner">
                <div class="banner-three-content">
                    <span class="banner-three-content__subtitle text-main fw-700 font-heading font-20">Welcome to Bilikmedia</span>
                    <h1 class="banner-three-content__title my-3 text-capitalize">A Full Range of Digital Solutions for Your Needs</h1>
                    <p class="banner-three-content__desc font-18">We're here to help bring your creative ideas to life with the best digital solutions. Let's create something amazing together!</p>

                    <div class="buttons flx-align gap-sm-3 gap-2 mt-40">
                        <a href="{{ route('index') }}" class="btn btn-black btn-lg-icon">
                            <span class="d-sm-flex d-none me-1">Our best </span> Services
                            <span class="icon-right icon"> 
                                <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                            </span>
                        </a>
                        <a href="{{ route('index') }}" class="btn btn-outline-black btn-lg fw-500">
                            About Us
                        </a>
                    </div>

                    <div class="statistics-three-wrapper flx-align mt-64 position-relative d-inline-flex">
                        <div class="statistics-three">
                            <h4 class="statistics-three__amount text-heading mb-0">2900+</h4>
                            <span class="statistics-three__text font-18 text-heading fw-500">Project Completed</span>
                        </div>
                        <div class="statistics-three">
                            <h4 class="statistics-three__amount text-heading mb-0">1680+</h4>
                            <span class="statistics-three__text font-18 text-heading fw-500">Customer Reviewed</span>
                        </div>
                        <img src="{{ asset('assets') }}/images/icons/curve-arrow.png" alt="" class="curve-arrow">
                    </div>
                    
                </div>

                <!-- Banner-three Right Start -->
                <div class="banner-three__right">
                    <div class="banner-three-thumb position-relative">
                        <img src="{{ asset('assets') }}/images/thumbs/banner-thumb.png" alt="">

                        <div class="statistics-three-box bg-white text-center">
                            <h5 class="statistics-three-box__amount text-heading">19k</h5>
                            <span class="statistics-three-box__text text-heading font-14">Themes &amp; Plugins</span>
                        </div>

                        <!-- Happy Client Start -->
                        <div class="happy-client-three flx-align">
                            <div class="happy-client-three__thumbs">
                                <img src="{{ asset('assets') }}/images/thumbs/happy-client1.png" alt="Client" class="happy-client-three__img">
                                <img src="{{ asset('assets') }}/images/thumbs/happy-client2.png" alt="Client" class="happy-client-three__img">
                                <img src="{{ asset('assets') }}/images/thumbs/happy-client3.png" alt="Client" class="happy-client-three__img">
                                <img src="{{ asset('assets') }}/images/thumbs/happy-client4.png" alt="Client" class="happy-client-three__img">
                            </div>
                            <span class="happy-client-three__text text-heading fw-500 text-center">2k Happy Clients</span>
                        </div>
                        <!-- Happy Client End -->
                        
                    </div>
                </div>
                <!-- Banner-three Right End -->
            </div>
        </div>
    </div>
</section>
<!--========================== Banner-three Section End ==========================-->


    <!-- ======================== Brand Section Start ========================= -->
<div class="brand-three ">
    <div class="container container-two">
        <div class="brand-three-slider">
            <div class="brand-three-item d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets') }}/images/thumbs/brand-img1.png" alt="">
            </div>
            <div class="brand-three-item d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets') }}/images/thumbs/brand-img2.png" alt="">
            </div>
            <div class="brand-three-item d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets') }}/images/thumbs/brand-img3.png" alt="">
            </div>
            <div class="brand-three-item d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets') }}/images/thumbs/brand-img4.png" alt="">
            </div>
            <div class="brand-three-item d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets') }}/images/thumbs/brand-img5.png" alt="">
            </div>
            <div class="brand-three-item d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets') }}/images/thumbs/brand-img6.png" alt="">
            </div>
            <div class="brand-three-item d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets') }}/images/thumbs/brand-img7.png" alt="">
            </div>
            <div class="brand-three-item d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets') }}/images/thumbs/brand-img3.png" alt="">
            </div>
        </div>
    </div>
</div>
<!-- ======================== Brand Section End ========================= -->

    <!-- ======================== About Section Start ========================== -->
<section class="about-three padding-y-120 position-relative z-index-1 overflow-hidden">
    <img src="{{ asset('assets') }}/images/shapes/element1.png" alt="" class="element one">
    
    <div class="container container-two">
        <div class="row gy-sm-5 gy-4 flex-wrap-reverse">
            <div class="col-lg-6">
                <div class="about-three-thumb position-relative">
                    <img src="{{ asset('assets') }}/images/shapes/dots.png" alt="" class="dotted-img style-three d-sm-block d-none">
                    <div class="about-three-thumb__img one">
                        <img src="{{ asset('assets') }}/images/thumbs/about-img1.png" alt="">
                    </div>
                    <div class="about-three-thumb__img two text-end">
                        <img src="{{ asset('assets') }}/images/thumbs/about-img2.png" alt="">
                    </div>
                    <div class="experience-content">
                        <span class="experience-content__text fw-700 text-white">25+ Years Experiences</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-three-content">
                    <div class="section-heading style-three style-left">
                        <span class="section-heading__subtitle section-bg">About us</span>
                        <h3 class="section-heading__title">The Best Services We Offer</h3>
                        <p class="section-heading__desc">Every month, we curate a selection of top-tier products just for you. This month's best web themes & templates have been handpicked by our expert content team to meet your needs.</p>
                    </div>

                    <div class="about-three-content__item-wrapper">
                        <div class="about-three-content__item d-flex align-items-start gap-sm-3 gap-2">
                            <span class="about-three-content__icon flx-center flex-shrink-0"><i class="las la-check"></i></span>
                            <div class="flex-grow-1">
                                <h5 class="about-three-content__title mb-3">Hight Quality Services</h5>
                                <p class="about-three-content__desc">At Bilikmedia, we focus on delivering premium solutions tailored to help your business thrive. From creative designs to seamless digital strategies, we ensure your success.</p>
                            </div>
                        </div>
                        <div class="about-three-content__item d-flex align-items-start gap-sm-3 gap-2">
                            <span class="about-three-content__icon flx-center flex-shrink-0"><i class="las la-check"></i></span>
                            <div class="flex-grow-1">
                                <h5 class="about-three-content__title mb-3">Top Tier Business Acquisition</h5>
                                <p class="about-three-content__desc">Our specialized team is dedicated to providing you with cutting-edge digital services, helping you grow your business with innovative and strategic approaches.</p>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('index') }}" class="mt-48 btn btn-black btn-lg"> More About Us  </a>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======================== About Section End ========================== -->


    <!-- ======================= Featured Products Start =============================== -->
<section class="featured-product padding-y-120 position-relative z-index-1">

        <img src="{{ asset('assets') }}/images/shapes/line-bg.png" alt="" class="line-bg position-absolute top-0 start-0 w-100 h-100 z-index--1">
        
        <div class="container container-two">
            <div class="row gy-4 align-items-center">
                <div class="col-xl-5">
                    <div class="section-content">
                        <div class="section-heading style-left">
                            <h3 class="section-heading__title">Featured Tools</h3>
                            <p class="section-heading__desc font-18 w-sm"><strong>Simplify your design process with our best tools!</strong> Quickly access and download assets, saving you time to focus on creating amazing content.</p>
                        </div>                       
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="card-wrapper">
                        <div class="row gy-4">
                            <div class="col-sm-6">
                                <div class="product-item box-shadow">
                                    <div class="product-item__thumb d-flex">
                                        <a href="{{ route('index') }}" class="link w-100">
                                            <img src="{{ asset('uploads') }}/products/envato.png" alt="envato" class="cover-img"> 
                                        </a>
                                    </div>
                                    <div class="product-item__content">
                                        <h6 class="product-item__title">
                                            <a href="{{ route('envanto.downloader') }}" class="link">Envato Downloader</a>
                                        </h6>
                                        <span class="product-item__author">
                                            Simplify your design process with Envato Downloader! Quickly access and download assets from the Envato Market, saving you time to focus on creating amazing content.                                          
                                        </span>
                                        <div class="product-item__bottom flx-between gap-2">
                                            <div class="d-flex align-items-center gap-1">
                                                <ul class="star-rating">
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                                </ul>                                                
                                            </div>
                                            <a href="{{ route('envanto.downloader') }}" class="btn btn-outline-light btn-sm pill">Start Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="product-item box-shadow">
                                    <div class="product-item__thumb d-flex">
                                        <a href="{{ route('index') }}" class="link w-100">
                                            <img src="{{ asset('uploads') }}/products/freepik.png" alt="freepik" class="cover-img"> 
                                        </a>                                        
                                    </div>
                                    <div class="product-item__content">
                                        <h6 class="product-item__title">
                                            <a href="{{ route('freepik.downloader') }}" class="link">Freepik Downloader</a>
                                        </h6>
                                        <div class="product-item__info flx-between gap-2">
                                            <span class="product-item__author">
                                                Discover a treasure trove of free resources at Freepik, including vectors, illustrations, and photos. Perfect for designers and content creators looking to elevate their projects!
                                            </span>                                            
                                        </div>
                                        <div class="product-item__bottom flx-between gap-2">
                                            <div>                                                
                                                <div class="d-flex align-items-center gap-1">
                                                    <ul class="star-rating">
                                                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                                    </ul>                                                   
                                                </div>
                                            </div>
                                            <a href="{{ route('freepik.downloader') }}" class="btn btn-outline-light btn-sm pill">Start Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>                         
                            <div class="col-sm-6">
                                <div class="product-item box-shadow">
                                    <div class="product-item__thumb d-flex">
                                        <a href="{{ route('index') }}" class="link w-100">
                                            <img src="{{ asset('uploads') }}/products/motionaray.png" alt="motion array" class="cover-img"> 
                                        </a>                                        
                                    </div>
                                    <div class="product-item__content">
                                        <h6 class="product-item__title">
                                            <a href="{{ route('freepik.downloader') }}" class="link">Motion Array Downloader</a>
                                        </h6>
                                        <div class="product-item__info flx-between gap-2">
                                            <span class="product-item__author">
                                                Motion Array Downloader is a tool for downloading assets from Motion Array, including templates, stock footage, music, and sound effects, allowing creators to access resources offline easily.
                                            </span>                                            
                                        </div>
                                        <div class="product-item__bottom flx-between gap-2">
                                            <div>                                                
                                                <div class="d-flex align-items-center gap-1">
                                                    <ul class="star-rating">
                                                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                                    </ul>                                                   
                                                </div>
                                            </div>
                                            <a href="{{ route('motionarray.downloader') }}" class="btn btn-outline-light btn-sm pill">Start Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- ======================= Featured Products End =============================== -->

    <!-- ===================== Why Choose Us Start ========================== -->
<section class="choose-us padding-y-120 position-relative z-index-1">
    <img src="{{ asset('assets') }}/images/shapes/footer-shape2.png" alt="" class="position-absolute start-0 bottom-0 z-index--1">
    <div class="container container-two">

        <div class="section-heading style-three">
            <span class="section-heading__subtitle section-bg">Choose Us</span>
            <h3 class="section-heading__title">Why Choose Us</h3>
            <p class="section-heading__desc">Every month we pick some best products for you. This month's best web themes & templates have arrived, chosen by our content specialists.</p>
        </div>

        <div class="row gy-4">
            <div class="col-lg-4 col-sm-6">
                <div class="choose-us-item">
                    <div class="choose-us-item__thumb">
                        <img src="{{ asset('assets') }}/images/thumbs/choose-us-img1.png" alt="">
                    </div>
                    <div class="choose-us-item__content text-center">
                        <span class="choose-us-item__icon"><img src="{{ asset('assets') }}/images/icons/choose-us-icon1.svg" alt=""></span>
                        <h5 class="choose-us-item__title my-3">Dedicated & Professional High Quality Team</h5>
                        <p class="choose-us-item__desc">We have highly skilled and dedicated agile for your Php Laravel Script, Laravel Ecommerce, Fundraising Script.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="choose-us-item">
                    <div class="choose-us-item__thumb">
                        <img src="{{ asset('assets') }}/images/thumbs/choose-us-img2.png" alt="">
                    </div>
                    <div class="choose-us-item__content text-center">
                        <span class="choose-us-item__icon"><img src="{{ asset('assets') }}/images/icons/choose-us-icon2.svg" alt=""></span>
                        <h5 class="choose-us-item__title my-3">Dedicated & Professional High Quality Team</h5>
                        <p class="choose-us-item__desc">We have highly skilled and dedicated agile for your Php Laravel Script, Laravel Ecommerce, Fundraising Script.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="choose-us-item">
                    <div class="choose-us-item__thumb">
                        <img src="{{ asset('assets') }}/images/thumbs/choose-us-img3.png" alt="">
                    </div>
                    <div class="choose-us-item__content text-center">
                        <span class="choose-us-item__icon"><img src="{{ asset('assets') }}/images/icons/choose-us-icon3.svg" alt=""></span>
                        <h5 class="choose-us-item__title my-3">Dedicated & Professional High Quality Team</h5>
                        <p class="choose-us-item__desc">We have highly skilled and dedicated agile for your Php Laravel Script, Laravel Ecommerce, Fundraising Script.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ===================== Why Choose Us End ========================== -->

    <!-- ============================= Working Process Start ============================ -->
<section class="working-process">
    <div class="container container-full">

        <div class="working-process-wrapper padding-y-120 position-relative z-index-1 overflow-hidden">
            <img src="{{ asset('assets') }}/images/gradients/working-process-gradient.png" alt="" class="bg--gradient">
            <img src="{{ asset('assets') }}/images/shapes/element3.png" alt="" class="element one">
            <img src="{{ asset('assets') }}/images/shapes/element2.png" alt="" class="element two top-0">
            
            <div class="section-heading">
                <h3 class="section-heading__title text-white">Our working process</h3>
                <p class="section-heading__desc text-white fw-200">Every month we pick some best products for you.</p>
            </div>
            
            <div class="container container-two">
                <div class="row gy-4 working-process-item-wrapper">
                    <div class="col-xl-3 col-sm-6 col-xs-6">
    <div class="working-process-item text-center">
        <img src="{{ asset('assets') }}/images/shapes/arrow-curve-right.png" alt="" class="working-process-item__arrow">
        <span class="working-process-item__number font-heading fw-700 mb-32">1</span>
        <h5 class="working-process-item__title mb-3 text-white">Understanding</h5>
        <p class="working-process-item__desc text-white fw-200">Create a new account to work hat strategy </p>
    </div>
    </div>
                    <div class="col-xl-3 col-sm-6 col-xs-6">
    <div class="working-process-item text-center">
        <img src="{{ asset('assets') }}/images/shapes/arrow-curve-right.png" alt="" class="working-process-item__arrow">
        <span class="working-process-item__number font-heading fw-700 mb-32">2</span>
        <h5 class="working-process-item__title mb-3 text-white">Ideation</h5>
        <p class="working-process-item__desc text-white fw-200">Create a new account to work hat strategy </p>
    </div>
    </div>
                    <div class="col-xl-3 col-sm-6 col-xs-6">
    <div class="working-process-item text-center">
        <img src="{{ asset('assets') }}/images/shapes/arrow-curve-right.png" alt="" class="working-process-item__arrow">
        <span class="working-process-item__number font-heading fw-700 mb-32">3</span>
        <h5 class="working-process-item__title mb-3 text-white">Develop Idea</h5>
        <p class="working-process-item__desc text-white fw-200">Create a new account to work hat strategy </p>
    </div>
    </div>
                    <div class="col-xl-3 col-sm-6 col-xs-6">
    <div class="working-process-item text-center">
        <img src="{{ asset('assets') }}/images/shapes/arrow-curve-right.png" alt="" class="working-process-item__arrow">
        <span class="working-process-item__number font-heading fw-700 mb-32">4</span>
        <h5 class="working-process-item__title mb-3 text-white">User Testing</h5>
        <p class="working-process-item__desc text-white fw-200">Create a new account to work hat strategy </p>
    </div>
    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ============================= Working Process End ============================ -->

<!-- ========================= Latest Project Section Start ======================= -->
    {{-- <section class="latest-project padding-t-120">
        <div class="latest-project__inner overflow-hidden">
            <div class="container container-two">
                <div class="section-heading">
                    <h3 class="section-heading__title">our latest projects</h3>
                    <p class="section-heading__desc">Every month we pick some best products for you. This month's best web themes &amp; templates have arrived, chosen by our content specialists.</p>
                </div>
                
                <div class="latest-project__tab">
                    <ul class="nav common-tab justify-content-center nav-pills mb-48" id="pills-tab-two" role="tablist">
                        <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-itManagement-tab" data-bs-toggle="pill" data-bs-target="#pills-itManagement" type="button" role="tab" aria-controls="pills-itManagement" aria-selected="true">itManagement Item</button>
                        </li>
                        <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-dataSecurity-tab" data-bs-toggle="pill" data-bs-target="#pills-dataSecurity" type="button" role="tab" aria-controls="pills-dataSecurity" aria-selected="false">dataSecurity</button>
                        </li>
                        <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-siteTemplate-tab" data-bs-toggle="pill" data-bs-target="#pills-siteTemplate" type="button" role="tab" aria-controls="pills-siteTemplate" aria-selected="false">site Template</button>
                        </li>
                        <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-blogging-tab" data-bs-toggle="pill" data-bs-target="#pills-blogging" type="button" role="tab" aria-controls="pills-blogging" aria-selected="false">blogging</button>
                        </li>
                        <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-marketing-tab" data-bs-toggle="pill" data-bs-target="#pills-marketing" type="button" role="tab" aria-controls="pills-marketing" aria-selected="false">marketing</button>
                        </li>
                        <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-plugins-tab" data-bs-toggle="pill" data-bs-target="#pills-plugins" type="button" role="tab" aria-controls="pills-plugins" aria-selected="false">plugins</button>
                        </li>
                    </ul>
                </div>
                
                <div class="latest-project-wrapper">
                    <div class="tab-content" id="pills-tabContentTwo">
                        <div class="tab-pane fade show active" id="pills-itManagement" role="tabpanel" aria-labelledby="pills-itManagement-tab" tabindex="0">
                            <div class="latest-project-slider">
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project1.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project3.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project3.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project2.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        </div>
                        </div>
                        <div class="tab-pane fade" id="pills-dataSecurity" role="tabpanel" aria-labelledby="pills-dataSecurity-tab" tabindex="0">
                            <div class="latest-project-slider">
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project1.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project3.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project3.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project2.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        </div>
                        </div>
                        <div class="tab-pane fade" id="pills-siteTemplate" role="tabpanel" aria-labelledby="pills-siteTemplate-tab" tabindex="0">
                            <div class="latest-project-slider">
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project1.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project3.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project3.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project2.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        </div>
                        </div>
                        <div class="tab-pane fade" id="pills-blogging" role="tabpanel" aria-labelledby="pills-blogging-tab" tabindex="0">
                            <div class="latest-project-slider">
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project1.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project3.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project3.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project2.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        </div>
                        </div>
                        <div class="tab-pane fade" id="pills-marketing" role="tabpanel" aria-labelledby="pills-marketing-tab" tabindex="0">
                            <div class="latest-project-slider">
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project1.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project3.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project3.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project2.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        </div>
                        </div>
                        <div class="tab-pane fade" id="pills-plugins" role="tabpanel" aria-labelledby="pills-plugins-tab" tabindex="0">
                            <div class="latest-project-slider">
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project1.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project3.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project3.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        <div class="latest-project-item">
            <div class="latest-project-item__content">
                <h5 class="latest-project-item__title mb-3">
                    <a href="#" class="link w-100 d-block"> Hyip MoneyPro - Advance hyip investment financial html template </a>
                </h5>
                <ul class="tag-list flx-align gap-2">
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">SaaS</a>
                    </li>
                    <li class="tag-list__item">
                        <a href="#" class="tag-list__link">Digital Product</a>
                    </li>
                </ul>
            </div>
            <div class="latest-project-item__thumb">
                <a href="#" class="link w-100 d-block">
                    <img src="{{ asset('assets') }}/images/thumbs/latest-project2.png" alt="">
                </a>
            </div>
            <div class="latest-project-item__bottom flx-between gap-2">
                <a href="{{ route('showRegisterForm') }}" class="btn btn-main btn-lg-icon">
                    Get Started
                    <span class="icon-right icon"> 
                        <img src="{{ asset('assets') }}/images/icons/arrow-right-white.svg" alt="">
                    </span>  
                </a>
                <button type="button" class="bookmark-btn">
                    <img src="{{ asset('assets') }}/images/icons/bookmark.svg" alt="">
                </button>
            </div>
        </div>
        </div>
                        </div>
                    </div> 
                </div> 
            </div>
        </div>

        <a href="{{ route('index') }}" class="btn-rounded text-white d-flex flex-column gap-2 justify-content-center text-center font-24 fw-600 font-heading mx-auto mt-64">
            <span class="icon"><img src="{{ asset('assets') }}/images/icons/arrow-top-right.svg" alt=""></span>
            <span class="text">View All</span>
        </a>
        
    </section> --}}
<!-- ========================= Latest Project Section End ======================= -->

<!-- ========================= Team Section Start ======================= -->
    {{-- <section class="team padding-y-120 position-relative z-index-1 overflow-hidden">

        <img src="{{ asset('assets') }}/images/shapes/full-line.png" alt="" class="full-line position-absolute start-0 top-0 w-100 h-100 z-index--1">
        <img src="{{ asset('assets') }}/images/shapes/element1.png" alt="" class="element two top-50">

        <div class="container container-two">

            <div class="section-heading style-left flx-between max-w-unset gap-4">
                <div>
                    <h3 class="section-heading__title">Meet Our Team</h3>
                    <p class="section-heading__desc font-18">Every month we pick some best products for you. This month's best web themes & templates have arrived, chosen by our content specialists.</p>
                </div>
                <a href="{{ route('index') }}" class="btn btn-main btn-lg fw-300">
                    View All Members
                </a>
            </div>

            <div class="team-item-slider">
                <div class="team-item shadow-sm mb-2">
        <div class="team-item__thumb">
            <img src="{{ asset('assets') }}/images/thumbs/team1.png" alt="" class="cover-img">
        </div>
        <div class="team-item__content">
            <a href="#" class="btn btn-black btn-icon btn-icon--sm ms-auto"> <i class="las la-plus"></i> </a>
            <h6 class="team-item__name mb-2"><a href="#" class="link hover-text-main">Maria Jany</a></h6>
            <span class="team-item__designation text-heading fw-500">Product Manager</span>
        </div>
        </div>
                <div class="team-item shadow-sm mb-2">
        <div class="team-item__thumb">
            <img src="{{ asset('assets') }}/images/thumbs/team2.png" alt="" class="cover-img">
        </div>
        <div class="team-item__content">
            <a href="#" class="btn btn-black btn-icon btn-icon--sm ms-auto"> <i class="las la-plus"></i> </a>
            <h6 class="team-item__name mb-2"><a href="#" class="link hover-text-main">Ralph Edwards</a></h6>
            <span class="team-item__designation text-heading fw-500">Product Manager</span>
        </div>
        </div>
                <div class="team-item shadow-sm mb-2">
        <div class="team-item__thumb">
            <img src="{{ asset('assets') }}/images/thumbs/team3.png" alt="" class="cover-img">
        </div>
        <div class="team-item__content">
            <a href="#" class="btn btn-black btn-icon btn-icon--sm ms-auto"> <i class="las la-plus"></i> </a>
            <h6 class="team-item__name mb-2"><a href="#" class="link hover-text-main">John Doe</a></h6>
            <span class="team-item__designation text-heading fw-500">Product Manager</span>
        </div>
        </div>
                <div class="team-item shadow-sm mb-2">
        <div class="team-item__thumb">
            <img src="{{ asset('assets') }}/images/thumbs/team4.png" alt="" class="cover-img">
        </div>
        <div class="team-item__content">
            <a href="#" class="btn btn-black btn-icon btn-icon--sm ms-auto"> <i class="las la-plus"></i> </a>
            <h6 class="team-item__name mb-2"><a href="#" class="link hover-text-main">John Edwards</a></h6>
            <span class="team-item__designation text-heading fw-500">Product Manager</span>
        </div>
        </div>
                <div class="team-item shadow-sm mb-2">
        <div class="team-item__thumb">
            <img src="{{ asset('assets') }}/images/thumbs/team2.png" alt="" class="cover-img">
        </div>
        <div class="team-item__content">
            <a href="#" class="btn btn-black btn-icon btn-icon--sm ms-auto"> <i class="las la-plus"></i> </a>
            <h6 class="team-item__name mb-2"><a href="#" class="link hover-text-main">Martin Luthar</a></h6>
            <span class="team-item__designation text-heading fw-500">Product Manager</span>
        </div>
        </div>
            </div>
        </div>
    </section> --}}
<!-- ========================= Team Section End ======================= -->


<!-- ======================== Payment Method Section Start ============================== -->
    {{-- <section class="payment padding-t-120 position-relative z-index-1 overflow-hidden">

        <img src="{{ asset('assets') }}/images/shapes/element3.png" alt="" class="element one top-0">
        
        <div class="container container-three">
            <div class="payment-inner position-relative padding-t-120">
                <div class="payment-wrapper">
                    <div class="payment-thumb d-xl-block d-none">
                        <img src="{{ asset('assets') }}/images/thumbs/pyament-thumb.png" alt="">
                    </div>
                    <div class="section-heading style-left">
                        <h3 class="section-heading__title">Our Acceptable <br> Payment Methods</h3>
                        <p class="section-heading__desc mb-0 font-18">Many desktop publishing packages and web page <br> editors now use orem many web sites still in their infancy.</p>
                        <a href="{{ route('index') }}" class="btn btn-black btn-lg fw-500 mt-48"> Start Invest </a>
                    </div>
                    <div class="payment-method">
                        <div class="row g-md-3 g-2 justify-content-center">
                            <div class="col-4">
                                <div class="payment-method__item">
                                    <img src="{{ asset('assets') }}/images/thumbs/payment1.png" alt="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="payment-method__item">
                                    <img src="{{ asset('assets') }}/images/thumbs/payment2.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row g-md-3 g-2 justify-content-center">
                            <div class="col-4">
                                <div class="payment-method__item">
                                    <img src="{{ asset('assets') }}/images/thumbs/payment3.png" alt="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="payment-method__item">
                                    <img src="{{ asset('assets') }}/images/thumbs/payment4.png" alt="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="payment-method__item">
                                    <img src="{{ asset('assets') }}/images/thumbs/payment5.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row g-md-3 g-2 justify-content-center">
                            <div class="col-4">
                                <div class="payment-method__item">
                                    <img src="{{ asset('assets') }}/images/thumbs/payment6.png" alt="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="payment-method__item">
                                    <img src="{{ asset('assets') }}/images/thumbs/payment7.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
<!-- ======================== Payment Method Section End ============================== -->

    <!-- ============================ Testimonial Section Start ======================= -->
<section class="testimonial-three position-relative padding-y-120 overflow-hidden section-bg z-index-1">

    <img src="{{ asset('assets') }}/images/shapes/footer-shape3.png" alt="" class="position-absolute start-0 top-0">
    <img src="{{ asset('assets') }}/images/gradients/testimonail-gradient.png" alt="" class="bg--gradient">
    <img src="{{ asset('assets') }}/images/shapes/element2.png" alt="" class="element two top-50">
    
    <div class="container container-two">
        <div class="section-heading">
            <h3 class="section-heading__title">Our Happy Client</h3>
            <p class="section-heading__desc">Every month we pick some best products for you. This month's best web themes &amp; templates have arrived, chosen by our content specialists.</p>
        </div>
        
        <div class="row gy-4">
            <div class="col-xl-5 col-lg-6">
                <div class="testimonial-three-thumb-slider">
                    <div class="testimonial-three-thumb">
                        <img src="{{ asset('assets') }}/images/thumbs/testimonial-img1.png" alt="">
                    </div>
                    <div class="testimonial-three-thumb">
                        <img src="{{ asset('assets') }}/images/thumbs/testimonial-img1.png" alt="">
                    </div>
                </div>
            </div>  
            <div class="col-xl-1 d-xl-block d-none"></div>
            <div class="col-lg-6">
                <div class="testimonial-three-item-slider">
                    <div class="testimonial-three-item">
                        <img src="{{ asset('assets') }}/images/icons/testi-quote.svg" alt="" class="testimonial-three-item__quote">
                        <p class="testimonial-three-item__desc fw-500 mb-24 text-heading mt-3">Trust Saason provides reviews and ratings from verified users, with a specific focus on the software and services offered by the platform. It offers detailed feedback and insights.</p>
                        <h6 class="testimonial-three-item__name mb-2">Cristan Vail, Analytics</h6>
                        <span class="testimonial-three-item__text mb-2 font-18">From Australia</span>
                        <ul class="star-rating">
                            <li class="star-rating__item font-20"><i class="las la-star"></i></li>
                            <li class="star-rating__item font-20"><i class="las la-star"></i></li>
                            <li class="star-rating__item font-20"><i class="las la-star"></i></li>
                            <li class="star-rating__item font-20"><i class="las la-star"></i></li>
                            <li class="star-rating__item font-20"><i class="las la-star"></i></li>
                        </ul>
                    </div>
                    <div class="testimonial-three-item">
                        <img src="{{ asset('assets') }}/images/icons/testi-quote.svg" alt="" class="testimonial-three-item__quote">
                        <p class="testimonial-three-item__desc fw-500 mb-24 text-heading mt-3">Trust Saason provides reviews and ratings from verified users, with a specific focus on the software and services offered by the platform. It offers detailed feedback and insights.</p>
                        <h6 class="testimonial-three-item__name mb-2">Cristan Vail, Analytics</h6>
                        <span class="testimonial-three-item__text mb-2 font-18">From Australia</span>
                        <ul class="star-rating">
                            <li class="star-rating__item font-20"><i class="las la-star"></i></li>
                            <li class="star-rating__item font-20"><i class="las la-star"></i></li>
                            <li class="star-rating__item font-20"><i class="las la-star"></i></li>
                            <li class="star-rating__item font-20"><i class="las la-star"></i></li>
                            <li class="star-rating__item font-20"><i class="las la-star"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================ Testimonial Section End ======================= -->

<!-- ========================= Pricing Plan Section Start ============================ -->
    {{-- <section class="pricing-plan-three padding-y-120 position-relative z-index-1">
        
        <div class="container container-two">
            <div class="section-heading">
                <h3 class="section-heading__title">Flexible Plans For your Business growth</h3>
                <p class="section-heading__desc">Many desktop publishing packages and web page editors now use orem many web sites still in their infancy.</p>
            </div>
            <div class="row gy-4">
                <div class="col-xl-3 col-sm-6 mx-auto">
                    <div class="welcome-card h-100">
                        <div class="text-center">
                            <img src="{{ asset('assets') }}/images/thumbs/price-vector.png" alt="" class="price-vector">
                        </div>
                        <div class="pricing-plan-three-item active hover-bg-main">
                            <img src="{{ asset('assets') }}/images/gradients/price-hover-bg.png" alt="" class="hover-bg">
                            <div class="plan-tab">
                                <div class="mb-32">
                                    <h4 class="text-white mb-2 fw-600"> Welcome Back</h4>
                                    <p class="text-white mb-32 fw-300">Choose your best plan</p>
                                </div>

                                <ul class="nav tab-gradient nav-pills mb-3" id="pills-tab-three" role="tablist">
                                    <li class="nav-item" role="presentation">
                                    <button class="nav-link font-18 font-heading pill text-white fw-600 active" id="pills-monthly-tab" data-bs-toggle="pill" data-bs-target="#pills-monthly" type="button" role="tab" aria-controls="pills-monthly" aria-selected="true">monthly</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                    <button class="nav-link font-18 font-heading pill text-white fw-600" id="pills-yearly-tab" data-bs-toggle="pill" data-bs-target="#pills-yearly" type="button" role="tab" aria-controls="pills-yearly" aria-selected="false">yearly</button>
                                    </li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-monthly" role="tabpanel" aria-labelledby="pills-monthly-tab" tabindex="0">
                            <div class="row gy-4">
                                <div class="col-lg-4 col-sm-6">
        <div class="pricing-plan-three-item hover-bg-main">
            <img src="{{ asset('assets') }}/images/gradients/price-hover-bg.png" alt="" class="hover-bg">
            <span class="popular-badge d-none"></span>
            <div class="pricing-plan-three-item__top flx-align gap-3">
                <span class="pricing-plan-three-item__icon">
                    <img src="{{ asset('assets') }}/images/icons/price-icon1.svg" alt="">
                </span>
                <h6 class="pricing-plan-three-item__title mb-0 mt-2 fw-500">Startup</h6>
            </div>
            <div class="pricing-plan-three-item__content">
                <h5 class="pricing-plan-three-item__price mb-0"> $1589.00 <span class="text font-14 text-body font-body fw-300">/Per Month</span> </h5>
                <p class="pricing-plan-three-item__desc mt-32 fw-300">Essential services for startups and small businesses seeking.</p>
            </div>
            <div class="pricing-plan-three-item__lists">
                <ul class="text-list">
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Up to 30 members
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Collaboration
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Project management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Case management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Process management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Workflow management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Team management
                    </li>
                </ul>
            </div>
            <a href="#" class="btn btn-outline-light mt-32 w-100 fw-400">Get Started</a>
        </div>
        </div>
                                <div class="col-lg-4 col-sm-6">
        <div class="pricing-plan-three-item hover-bg-main">
            <img src="{{ asset('assets') }}/images/gradients/price-hover-bg.png" alt="" class="hover-bg">
            <span class="popular-badge ">Popular</span>
            <div class="pricing-plan-three-item__top flx-align gap-3">
                <span class="pricing-plan-three-item__icon">
                    <img src="{{ asset('assets') }}/images/icons/price-icon2.svg" alt="">
                </span>
                <h6 class="pricing-plan-three-item__title mb-0 mt-2 fw-500">Professional</h6>
            </div>
            <div class="pricing-plan-three-item__content">
                <h5 class="pricing-plan-three-item__price mb-0"> $1689.00 <span class="text font-14 text-body font-body fw-300">/Per Month</span> </h5>
                <p class="pricing-plan-three-item__desc mt-32 fw-300">Essential services for startups and small businesses seeking.</p>
            </div>
            <div class="pricing-plan-three-item__lists">
                <ul class="text-list">
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Up to 30 members
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Collaboration
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Project management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Case management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Process management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Workflow management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Team management
                    </li>
                </ul>
            </div>
            <a href="#" class="btn btn-outline-light mt-32 w-100 fw-400">Get Started</a>
        </div>
        </div>
                                <div class="col-lg-4 col-sm-6">
        <div class="pricing-plan-three-item hover-bg-main">
            <img src="{{ asset('assets') }}/images/gradients/price-hover-bg.png" alt="" class="hover-bg">
            <span class="popular-badge d-none"></span>
            <div class="pricing-plan-three-item__top flx-align gap-3">
                <span class="pricing-plan-three-item__icon">
                    <img src="{{ asset('assets') }}/images/icons/price-icon3.svg" alt="">
                </span>
                <h6 class="pricing-plan-three-item__title mb-0 mt-2 fw-500">Premium Plan</h6>
            </div>
            <div class="pricing-plan-three-item__content">
                <h5 class="pricing-plan-three-item__price mb-0"> $1789.00 <span class="text font-14 text-body font-body fw-300">/Per Month</span> </h5>
                <p class="pricing-plan-three-item__desc mt-32 fw-300">Essential services for startups and small businesses seeking.</p>
            </div>
            <div class="pricing-plan-three-item__lists">
                <ul class="text-list">
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Up to 30 members
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Collaboration
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Project management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Case management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Process management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Workflow management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Team management
                    </li>
                </ul>
            </div>
            <a href="#" class="btn btn-outline-light mt-32 w-100 fw-400">Get Started</a>
        </div>
        </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-yearly" role="tabpanel" aria-labelledby="pills-yearly-tab" tabindex="0">
                            <div class="row gy-4">
                                <div class="col-lg-4 col-sm-6">
        <div class="pricing-plan-three-item hover-bg-main">
            <img src="{{ asset('assets') }}/images/gradients/price-hover-bg.png" alt="" class="hover-bg">
            <span class="popular-badge d-none"></span>
            <div class="pricing-plan-three-item__top flx-align gap-3">
                <span class="pricing-plan-three-item__icon">
                    <img src="{{ asset('assets') }}/images/icons/price-icon1.svg" alt="">
                </span>
                <h6 class="pricing-plan-three-item__title mb-0 mt-2 fw-500">Startup</h6>
            </div>
            <div class="pricing-plan-three-item__content">
                <h5 class="pricing-plan-three-item__price mb-0"> $1589.00 <span class="text font-14 text-body font-body fw-300">/Per Month</span> </h5>
                <p class="pricing-plan-three-item__desc mt-32 fw-300">Essential services for startups and small businesses seeking.</p>
            </div>
            <div class="pricing-plan-three-item__lists">
                <ul class="text-list">
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Up to 30 members
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Collaboration
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Project management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Case management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Process management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Workflow management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Team management
                    </li>
                </ul>
            </div>
            <a href="#" class="btn btn-outline-light mt-32 w-100 fw-400">Get Started</a>
        </div>
        </div>
                                <div class="col-lg-4 col-sm-6">
        <div class="pricing-plan-three-item hover-bg-main">
            <img src="{{ asset('assets') }}/images/gradients/price-hover-bg.png" alt="" class="hover-bg">
            <span class="popular-badge ">Popular</span>
            <div class="pricing-plan-three-item__top flx-align gap-3">
                <span class="pricing-plan-three-item__icon">
                    <img src="{{ asset('assets') }}/images/icons/price-icon2.svg" alt="">
                </span>
                <h6 class="pricing-plan-three-item__title mb-0 mt-2 fw-500">Professional</h6>
            </div>
            <div class="pricing-plan-three-item__content">
                <h5 class="pricing-plan-three-item__price mb-0"> $1689.00 <span class="text font-14 text-body font-body fw-300">/Per Month</span> </h5>
                <p class="pricing-plan-three-item__desc mt-32 fw-300">Essential services for startups and small businesses seeking.</p>
            </div>
            <div class="pricing-plan-three-item__lists">
                <ul class="text-list">
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Up to 30 members
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Collaboration
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Project management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Case management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Process management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Workflow management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Team management
                    </li>
                </ul>
            </div>
            <a href="#" class="btn btn-outline-light mt-32 w-100 fw-400">Get Started</a>
        </div>
        </div>
                                <div class="col-lg-4 col-sm-6">
        <div class="pricing-plan-three-item hover-bg-main">
            <img src="{{ asset('assets') }}/images/gradients/price-hover-bg.png" alt="" class="hover-bg">
            <span class="popular-badge d-none"></span>
            <div class="pricing-plan-three-item__top flx-align gap-3">
                <span class="pricing-plan-three-item__icon">
                    <img src="{{ asset('assets') }}/images/icons/price-icon3.svg" alt="">
                </span>
                <h6 class="pricing-plan-three-item__title mb-0 mt-2 fw-500">Premium Plan</h6>
            </div>
            <div class="pricing-plan-three-item__content">
                <h5 class="pricing-plan-three-item__price mb-0"> $1789.00 <span class="text font-14 text-body font-body fw-300">/Per Month</span> </h5>
                <p class="pricing-plan-three-item__desc mt-32 fw-300">Essential services for startups and small businesses seeking.</p>
            </div>
            <div class="pricing-plan-three-item__lists">
                <ul class="text-list">
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Up to 30 members
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Collaboration
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Project management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Case management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Process management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Workflow management
                    </li>
                    <li class="text-list__item text-heading">
                        <span class="icon"><i class="fas fa-check"></i></span>
                        Team management
                    </li>
                </ul>
            </div>
            <a href="#" class="btn btn-outline-light mt-32 w-100 fw-400">Get Started</a>
        </div>
        </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> --}}
<!-- ========================= Pricing Plan Section End ============================ -->

<!-- =========================== Blog Section Start ========================== -->
    {{-- <section class="blog padding-y-120 section-bg position-relative z-index-1 overflow-hidden">
        <img src="{{ asset('assets') }}/images/shapes/pattern-five.png" class="position-absolute end-0 top-0 z-index--1" alt="">
        <div class="container container-two">
            <div class="section-heading style-left style-flex flx-between align-items-end gap-3">
                <div class="section-heading__inner">
                    <h3 class="section-heading__title">Browse all latest blogs and articles</h3>
                </div>
                <a href="{{ route('index') }}" class="btn btn-main btn-lg pill">Browse All Articles </a>
            </div>
            <div class="row gy-4">
                <div class="col-lg-4 col-sm-6">
        <div class="post-item">
            <div class="post-item__thumb">
                <a href="{{ route('index') }}" class="link">
                    <img src="{{ asset('assets') }}/images/thumbs/blog1.png" class="cover-img" alt="">
                </a>
            </div>
            <div class="post-item__content">
                <div class="post-item__top flx-align">
                    <a href="{{ route('index') }}" class="post-item__tag pill font-14 text-heading fw-500 hover-text-main">Hiring</a>
                    <div class="post-item__date font-14 flx-align gap-2 font-14 text-heading fw-500"> 
                        <span class="icon">
                            <img src="{{ asset('assets') }}/images/icons/calendar.svg" alt="" class="white-version">
                            <img src="{{ asset('assets') }}/images/icons/calendar-white.svg" alt="" class="dark-version">
                        </span> 
                        <span class="text">Jan 17, 2024</span>
                    </div>
                </div>
                <h5 class="post-item__title">
                    <a href="{{ route('index') }}" class="link">How to hire a right business executive for your company</a>
                </h5>
                <a href="{{ route('index') }}" class="btn btn-outline-light pill fw-600">Read More </a>
            </div>
        </div>
        </div>
                <div class="col-lg-4 col-sm-6">
        <div class="post-item">
            <div class="post-item__thumb">
                <a href="{{ route('index') }}" class="link">
                    <img src="{{ asset('assets') }}/images/thumbs/blog2.png" class="cover-img" alt="">
                </a>
            </div>
            <div class="post-item__content">
                <div class="post-item__top flx-align">
                    <a href="{{ route('index') }}" class="post-item__tag pill font-14 text-heading fw-500 hover-text-main">Workshop</a>
                    <div class="post-item__date font-14 flx-align gap-2 font-14 text-heading fw-500"> 
                        <span class="icon">
                            <img src="{{ asset('assets') }}/images/icons/calendar.svg" alt="" class="white-version">
                            <img src="{{ asset('assets') }}/images/icons/calendar-white.svg" alt="" class="dark-version">
                        </span> 
                        <span class="text">Jan 17, 2024</span>
                    </div>
                </div>
                <h5 class="post-item__title">
                    <a href="{{ route('index') }}" class="link">The Gig Economy: Adapting to a Flexible Workforce</a>
                </h5>
                <a href="{{ route('index') }}" class="btn btn-outline-light pill fw-600">Read More </a>
            </div>
        </div>
        </div>
                <div class="col-lg-4 col-sm-6">
        <div class="post-item">
            <div class="post-item__thumb">
                <a href="{{ route('index') }}" class="link">
                    <img src="{{ asset('assets') }}/images/thumbs/blog3.png" class="cover-img" alt="">
                </a>
            </div>
            <div class="post-item__content">
                <div class="post-item__top flx-align">
                    <a href="{{ route('index') }}" class="post-item__tag pill font-14 text-heading fw-500 hover-text-main">Project Management</a>
                    <div class="post-item__date font-14 flx-align gap-2 font-14 text-heading fw-500"> 
                        <span class="icon">
                            <img src="{{ asset('assets') }}/images/icons/calendar.svg" alt="" class="white-version">
                            <img src="{{ asset('assets') }}/images/icons/calendar-white.svg" alt="" class="dark-version">
                        </span> 
                        <span class="text">Jan 17, 2024</span>
                    </div>
                </div>
                <h5 class="post-item__title">
                    <a href="{{ route('index') }}" class="link">The Future of Remote Work: Strategies for Success</a>
                </h5>
                <a href="{{ route('index') }}" class="btn btn-outline-light pill fw-600">Read More </a>
            </div>
        </div>
        </div>
            </div>
        </div>
    </section> --}}
<!-- =========================== Blog Section End ========================== -->


<!-- ========================= Newsletter Section Start ======================= -->
    {{-- <div class="newsletter-three padding-y-120">
        <div class="container container-two">
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="newsletter-three-content overflow-hidden z-index-1">
                        <img src="{{ asset('assets') }}/images/gradients/newsletter-bg.png" alt="" class="bg--gradient">
                        <img src="{{ asset('assets') }}/images/thumbs/newsletter-img.png" alt="" class="newsletter-three-content__img">
                        <h3 class="mb-3">Newsletter</h3>
                        <p class="mb-24 font-18">Subscribe our newsletter to get the latest news</p>
                        <div class="search-box">
                            <input type="text" class="common-input common-input--lg shadow-sm" placeholder="Enter Mail">
                            <button type="submit" class="btn btn-main btn-lg">
                                <span class="d-sm-block d-none">Subscribe Now</span>
                                <span class="icon d-sm-none d-block"><i class="fas fa-bell"></i></span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="newsletter-three-content support-content overflow-hidden z-index-1">
                        <img src="{{ asset('assets') }}/images/gradients/support-gradient.png" alt="" class="bg--gradient">
                        <img src="{{ asset('assets') }}/images/shapes/arrow-round.png" alt="" class="arrow-round">
                        <img src="{{ asset('assets') }}/images/thumbs/newsletter-thumb.png" alt="" class="newsletter-three-content__img">
                        <h3 class="mb-3">Support 24/7</h3>
                        <p class="mb-24 font-18">Wanna talk? Send us a message</p>
                        <a href="mailto:azency@office.com" class="btn btn-outline-black btn-lg">azency@office.com</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
<!-- ========================= Newsletter Section End ======================= -->
@endsection
