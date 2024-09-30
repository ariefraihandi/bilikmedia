@extends('Index.app')

@section('content')
<!-- ======================= Blog Details Section Start ========================= -->
<section class="blog-details padding-y-120 position-relative overflow-hidden">
    <div class="container container-two">
        <!-- blog details top Start -->
        <div class="blog-details-top mb-64">
            <div class="blog-details-top__info flx-align gap-3 mb-4">
                <div class="blog-details-top__thumb flx-align gap-2">
                    <img src="{{ asset('assets') }}/images/logo/favicon.png" alt="">
                    <span class="text-heading fw-500">Bilik Media</span>
                </div>
                <span class="blog-details-top__date flx-align gap-2">
                    <img src="{{ asset('assets') }}/images/icons/clock.svg" alt="">
                    25 Jan 2024
                </span>
            </div>
            <h2 class="blog-details-top__title mb-4 text-capitalize">Top 10 Best Website Templates at Bilik Media</h2> 
            <p class="blog-details-top__desc">
                Choosing the right website template is crucial for creating a professional and visually appealing website. At Bilik Media, we offer a wide range of high-quality website templates suitable for various business needs and projects. Below are the 10 best website templates that you can find on Bilik Media.
            </p>
        </div>
        <div class="row gy-4">
            <div class="col-lg-8 pe-lg-5">
                <!-- blog details content Start -->
                <div class="blog-details-content">
                    <div class="blog-details-content__thumb mb-32">
                        <img src="{{ asset('uploads/products/' . $featuredProduct->image) }}" alt="{{$featuredProduct->title}}">
                    </div>
                    <p class="blog-details-content__desc mb-40">
                        Each template has been carefully designed to provide flexibility, creativity, and functionality. Whether you're creating a business website, a portfolio, or an e-commerce platform, you'll find a template that suits your needs perfectly.
                    </p>

                    <div class="row gy-4 mb-4">
                        @if($products->isNotEmpty())
                            @foreach($products as $product)
                                <div class="col-lg-4">
                                    <div class="product-item">
                                        <div class="product-item__thumb">
                                            <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->title }}">
                                        </div>
                                        <div class="product-item__info">
                                            <h4 class="product-item__title">{{ $product->title }}</h4>                                            
                                            <a href="{{ $product->live_preview_url }}" class="product-item__link">Preview</a>
                                            <a href="{{ $product->url_download }}" class="product-item__link">Download</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No products found under the "Website Template" category.</p>
                        @endif
                    </div>

                    <h5 class="blog-details-content__title mb-3">Why Choose Bilik Media Templates?</h5>
                    <p class="blog-details-content__desc mb-32">
                        At Bilik Media, our templates are designed with both creativity and functionality in mind. We offer modern, responsive, and highly customizable templates that can be easily adapted to suit different types of projects.
                    </p>
                    <p class="blog-details-content__desc mb-24">
                        Whether you're building a corporate website, a personal portfolio, or an online store, you'll find templates that offer cutting-edge design, seamless performance, and user-friendly customization options.
                    </p>
        
                    <!-- Features List -->
                    <ul class="product-list mb-40">
                        <li class="product-list__item font-18 fw-500 text-heading">Responsive and mobile-friendly designs</li>
                        <li class="product-list__item font-18 fw-500 text-heading">Easy to customize without coding skills</li>
                        <li class="product-list__item font-18 fw-500 text-heading">Modern UI/UX elements</li>
                        <li class="product-list__item font-18 fw-500 text-heading">SEO-friendly and optimized for performance</li>
                    </ul>
        
                    <!-- Quote Text Start -->
                    <div class="quote-text mb-40">
                        <img src="{{ asset('assets/images/icons/quote-icon.svg') }}" alt="quote-icon" class="quote-text__icon">
                        <p class="quote-text__desc mb-3 font-20 fw-500 text-heading">“These templates are not only beautifully designed but also come with exceptional functionality that makes them a go-to choice for any website project.”</p>
                        <h6 class="quote-text__name">Bilik Media</h6>
                    </div>
                    <!-- Quote Text Ebd -->
                    
                    <h5 class="blog-details-content__title mb-3">Ready to Get Started?</h5>
                    <p class="blog-details-content__desc mb-40">
                        Explore our full collection of website templates at Bilik Media and find the perfect fit for your project. Get started today and bring your website vision to life with our beautifully crafted templates.
                    </p>
                
                    <div class="flx-between gap-2 mb-40 mt-40">
                        <div class="post-tag flx-align gap-3">
                            <span class="post-tag__text text-heading fw-500">Post Tags: </span>
                            <ul class="post-tag__list flx-align gap-2">
                                <li class="post-tag__item">
                                    <a href="blog.html" class="post-tag__link font-14 text-heading pill fw-500">Templates</a>
                                </li>
                                <li class="post-tag__item">
                                    <a href="blog.html" class="post-tag__link font-14 text-heading pill fw-500">Design</a>
                                </li>
                                <li class="post-tag__item">
                                    <a href="blog.html" class="post-tag__link font-14 text-heading pill fw-500">Web Development</a>
                                </li>
                            </ul>
                        </div>
                        <div class="socail-share flx-align gap-3">
                            <span class="socail-share__text text-heading fw-500">Share On: </span>
                            <ul class="social-icon-list colorful-style">
                                <li class="social-icon-list__item">
                                    <a href="https://www.facebook.com" class="social-icon-list__link text-heading font-16 flex-center"><i class="fab fa-facebook-f"></i></a> 
                                </li>
                                <li class="social-icon-list__item">
                                    <a href="https://www.twitter.com" class="social-icon-list__link text-heading font-16 flex-center"> <i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="social-icon-list__item">
                                    <a href="https://www.linkedin.com" class="social-icon-list__link text-heading font-16 flex-center"> <i class="fab fa-linkedin-in"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="col-lg-4">
               
                <div class="common-sidebar-wrapper">
                    <div class="common-sidebar p-0">
                        <form action="#" autocomplete="off">
                            <div class="search-box w-100">
                                <input type="text" class="common-input border-0" placeholder="Type here...">
                                <button type="submit" class="icon line-height-1 rounded-icon white-version">
                                    <img src="{{ asset('assets') }}/images/icons/search-dark.svg" alt="search">
                                </button>
                                <button type="submit" class="icon line-height-1 rounded-icon dark-version">
                                    <img src="{{ asset('assets') }}/images/icons/search-dark-white.svg" alt="search">
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="common-sidebar">
                        <h6 class="common-sidebar__title">Recent News</h6>
                        <div class="latest-blog">
                            <div class="latest-blog__thumb">
                                <a href="blog-details.html"> <img src="{{ asset('assets') }}/images/thumbs/latest-blog1.png" class="cover-img" alt=""></a>
                            </div>
                            <div class="latest-blog__content">
                                <span class="latest-blog__date font-14 mb-2">January 15, 2024</span>
                                <h6 class="latest-blog__title fw-500 font-body font-16">
                                    <a href="blog-details.html">There are many variations of business consulting.</a>
                                </h6>
                            </div>
                        </div>
                        <div class="latest-blog">
                            <div class="latest-blog__thumb">
                                <a href="blog-details.html"> <img src="{{ asset('assets') }}/images/thumbs/latest-blog2.png" class="cover-img" alt=""></a>
                            </div>
                            <div class="latest-blog__content">
                                <span class="latest-blog__date font-14 mb-2">January 15, 2024</span>
                                <h6 class="latest-blog__title fw-500 font-body font-16">
                                    <a href="blog-details.html">Maecenas malesuada mauris libero, ultricies vehicula.</a>
                                </h6>
                            </div>
                        </div>
                        <div class="latest-blog">
                            <div class="latest-blog__thumb">
                                <a href="blog-details.html"> <img src="{{ asset('assets') }}/images/thumbs/latest-blog3.png" class="cover-img" alt=""></a>
                            </div>
                            <div class="latest-blog__content">
                                <span class="latest-blog__date font-14 mb-2">January 15, 2024</span>
                                <h6 class="latest-blog__title fw-500 font-body font-16">
                                    <a href="blog-details.html">Phasellus sollicitudin massa aliquet ultricies condimentum.</a>
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="common-sidebar">
                        <h6 class="common-sidebar__title"> Categories </h6>
                        <ul class="category-list">
                            <li class="category-list__item">
                                <a href="blog.html" class="category-list__link flx-align flex-nowrap gap-2 text-body hover-text-main">
                                    <span class="icon font-12"> <i class="fas fa-chevron-right"></i></span>
                                    <span class="text">WordPress (12)</span>
                                </a>
                            </li>
                            <li class="category-list__item">
                                <a href="blog.html" class="category-list__link flx-align flex-nowrap gap-2 text-body hover-text-main">
                                    <span class="icon font-12"> <i class="fas fa-chevron-right"></i></span>
                                    <span class="text">App & Saas (6)</span>
                                </a>
                            </li>
                            <li class="category-list__item">
                                <a href="blog.html" class="category-list__link flx-align flex-nowrap gap-2 text-body hover-text-main">
                                    <span class="icon font-12"> <i class="fas fa-chevron-right"></i></span>
                                    <span class="text">Web Development (6)</span>
                                </a>
                            </li>
                            <li class="category-list__item">
                                <a href="blog.html" class="category-list__link flx-align flex-nowrap gap-2 text-body hover-text-main">
                                    <span class="icon font-12"> <i class="fas fa-chevron-right"></i></span>
                                    <span class="text">Graphics (6)</span>
                                </a>
                            </li>
                            <li class="category-list__item">
                                <a href="blog.html" class="category-list__link flx-align flex-nowrap gap-2 text-body hover-text-main">
                                    <span class="icon font-12"> <i class="fas fa-chevron-right"></i></span>
                                    <span class="text">IOS/Android Design (6)</span>
                                </a>
                            </li>
                            <li class="category-list__item">
                                <a href="blog.html" class="category-list__link flx-align flex-nowrap gap-2 text-body hover-text-main">
                                    <span class="icon font-12"> <i class="fas fa-chevron-right"></i></span>
                                    <span class="text">Web Design (6)</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="common-sidebar">
                        <h6 class="common-sidebar__title"> Popular Tags </h6>
                        <ul class="tag-list flx-align gap-2">
                            <li class="tag-list__item">
                                <a href="blog.html" class="tag-list__link pill px-3 py-2 font-14 fw-500">Digital</a>
                            </li>
                            <li class="tag-list__item">
                                <a href="blog.html" class="tag-list__link pill px-3 py-2 font-14 fw-500">Template</a>
                            </li>
                            <li class="tag-list__item">
                                <a href="blog.html" class="tag-list__link pill px-3 py-2 font-14 fw-500">Web Design</a>
                            </li>
                            <li class="tag-list__item">
                                <a href="blog.html" class="tag-list__link pill px-3 py-2 font-14 fw-500">SaaS</a>
                            </li>
                            <li class="tag-list__item">
                                <a href="blog.html" class="tag-list__link pill px-3 py-2 font-14 fw-500">Products</a>
                            </li>
                            <li class="tag-list__item">
                                <a href="blog.html" class="tag-list__link pill px-3 py-2 font-14 fw-500">App</a>
                            </li>
                            <li class="tag-list__item">
                                <a href="blog.html" class="tag-list__link pill px-3 py-2 font-14 fw-500">Development</a>
                            </li>
                            <li class="tag-list__item">
                                <a href="blog.html" class="tag-list__link pill px-3 py-2 font-14 fw-500">UI/UX</a>
                            </li>
                            <li class="tag-list__item">
                                <a href="blog.html" class="tag-list__link pill px-3 py-2 font-14 fw-500">Marketing</a>
                            </li>
                            <li class="tag-list__item">
                                <a href="blog.html" class="tag-list__link pill px-3 py-2 font-14 fw-500">HTML</a>
                            </li>
                            <li class="tag-list__item">
                                <a href="blog.html" class="tag-list__link pill px-3 py-2 font-14 fw-500">Web App</a>
                            </li>
                            <li class="tag-list__item">
                                <a href="blog.html" class="tag-list__link pill px-3 py-2 font-14 fw-500">Design</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======================== Brand Section Start ========================= -->

<!-- ======================== Brand Section End ========================= -->

<!-- ==================== Footer Start Here ==================== -->

@endsection