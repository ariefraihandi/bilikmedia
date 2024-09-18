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
                    <h2 class="banner-two__title text-center mb-3">Request Envanto Download</h2>
                    <p class="banner-two__desc text-center">
                        Please enter your email address below. The download link for the requested Envanto file will be sent directly to your email.
                    </p>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('submit.download') }}" method="POST" class="search-box" id="envantoForm">
                        @csrf
                        <input 
                            type="email" 
                            class="common-input common-input--lg pill shadow-sm" 
                            placeholder="Enter Your Mail Address"                          
                            id="email"
                            name="email"
                        >
                        <input 
                        type="hidden" 
                        id="envanto_url" 
                        name="envanto_url" value="{{ $envanto_url }}">
                        <button type="submit" class="btn btn-main btn-icon icon border-0" id="downloadButton">
                            <img src="{{ asset('assets') }}/images/icons/download-white.svg" alt="">
                        </button>
                    </form>                                            
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
@endsection

@push('footer-script')


@endpush