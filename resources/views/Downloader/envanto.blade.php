@extends('Index.app')

@section('content')
<!-- ==================== Header End Here ==================== -->

<!-- ============================== Banner Two Start =========================== -->
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

            <div class="col-xl-6">
                <div class="banner-two__content">
                    <h2 class="banner-two__title text-center mb-3">Envanto Downloader</h2>
                    <p class="banner-two__desc text-center">
                        Get Envanto files instantly with our free downloader. No hassle, just fast and easy downloads!
                    </p>
                    @if (request('success'))
                    <div class="alert alert-success">
                        {{ request('success') }}
                    </div>
                @endif
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <!-- Form dan konten lain tetap di sini -->
                
                    <form action="{{ route('request.download') }}" method="POST" class="search-box" id="envantoForm">
                        @csrf
                        <input 
                            type="text" 
                            class="common-input common-input--lg pill shadow-sm" 
                            placeholder="Enter Envanto URL: exp. https://elements.envato.com/iphone-mockup-2UC6ZLK" 
                            oninput="handleInputChange(this.value)" 
                            id="envantoInput"
                            name="envanto_url"
                        >
                        <button type="button" class="btn btn-main btn-icon icon border-0" id="downloadButton">
                            <img src="{{ asset('assets') }}/images/icons/download-white.svg" alt="">
                        </button>
                    </form>
                    
                    <ul id="suggestionList" class="list-group" style="display:none;"></ul>                                    
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
<!-- ============================== Banner Two End =========================== -->
<!-- ============================ Popular Item Section Start =========================== -->
<section class="popular-item-card-section padding-y-120 overflow-hidden">

  <img src="{{ asset('assets') }}/images/shapes/brush.png" alt="" class="element-brush">
  
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
                                    <a href="{{ route('product.details', $product->slug) }}" class="link w-100"> 
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
                                        <a href="{{ route('product.details', $product->slug) }}" class="link"> {{ $product->title }}</a>
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
    <img src="{{ asset('assets') }}/images/gradients/newsletter-gradient-bg.png" alt="" class="bg--gradient">

    <img src="{{ asset('assets') }}/images/shapes/element1.png" alt="" class="element two">
    <img src="{{ asset('assets') }}/images/shapes/element2.png" alt="" class="element one">

    <img src="{{ asset('assets') }}/images/shapes/line-vector-one.png" alt="" class="line-vector one">
    <img src="{{ asset('assets') }}/images/shapes/line-vector-two.png" alt="" class="line-vector two">

    <img src="{{ asset('assets') }}/images/thumbs/newsletter-man.png" alt="" class="newsletter-man">
    
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

@push('footer-script')
<script>
    const requestDownloadUrl = "{{ route('request.download') }}";
    
    // Handle input changes and show suggestions
    function handleInputChange(value) {
        if (value.length > 0) {
            fetch(`/search-products?search=${value}`)
                .then(response => response.json())
                .then(data => {
                    let suggestionList = document.getElementById('suggestionList');
                    suggestionList.innerHTML = '';

                    if (data.products.length > 0) {
                        // Show product suggestions
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
                        // Show category suggestions if products are not found
                        data.categories.forEach(category => {
                            let li = document.createElement('li');
                            li.classList.add('list-group-item');
                            li.innerHTML = `<strong>Category: ${category.name}</strong>`;
                            li.addEventListener('click', function() {
                                window.location.href = `/product/category/${category.slug}`;
                            });
                            suggestionList.appendChild(li);
                        });
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

    // Handle form submit only when download button is clicked
    document.getElementById('downloadButton').addEventListener('click', function() {
        let form = document.getElementById('envantoForm');
        let input = document.getElementById('envantoInput').value;

        if (input.length > 0) {
            form.submit(); // Submit the form when button is clicked and input has value
        } else {
            alert('Please enter a URL.');
        }
    });
</script>

@endpush