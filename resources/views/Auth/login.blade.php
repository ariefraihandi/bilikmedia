@extends('Index.appLogin')

@section('content')
    <section class="account d-flex">
        <img src="{{ asset('assets') }}/images/thumbs/account-img.png" alt="account" class="account__img">
        <div class="account__left d-md-flex d-none flx-align section-bg position-relative z-index-1 overflow-hidden">
            <img src="{{ asset('assets') }}/images/shapes/pattern-curve-seven.png" alt="pattern" class="position-absolute end-0 top-0 z-index--1 h-100">
            <div class="account-thumb">
                <img src="{{ asset('assets') }}/images/thumbs/banner-img.png" alt="banner">
                <div class="statistics animation bg-main text-center">
                    <h5 class="statistics__amount text-white">50k</h5>
                    <span class="statistics__text text-white font-14">Customers</span>
                </div>
            </div>
        </div>
        <div class="account__right padding-y-120 flx-align">

            <div class="dark-light-mode">
                <!-- Light Dark Mode -->
                <div class="theme-switch-wrapper position-relative">
                    <label class="theme-switch" for="checkbox">
                        <input type="checkbox" class="d-none" id="checkbox">
                        <span class="slider text-black header-right__button white-version">
                            <img src="{{ asset('assets') }}/images/icons/sun.svg" alt="sun">
                        </span>
                        <span class="slider text-black header-right__button dark-version">
                            <img src="{{ asset('assets') }}/images/icons/moon.svg" alt="moon">
                        </span>
                    </label>
                </div>
            </div>

            <div class="account-content">
                <a href="{{ route('index') }}" class="logo mb-64">  
                    <img src="{{ asset('assets') }}/images/logo/logo.png" alt="logo" class="white-version">
                    <img src="{{ asset('assets') }}/images/logo/white-logo-two.png" alt="logo" class="dark-version">
                </a>
                <h4 class="account-content__title mb-48 text-capitalize">Welcome Back!</h4>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-12">
                            <label for="email" class="form-label mb-2 font-18 font-heading fw-600">Email</label>
                            <div class="position-relative">
                                <input type="email" class="common-input common-input--bg common-input--withIcon" id="email" name="email" placeholder="infoname@mail.com" required>
                                <span class="input-icon"><img src="{{ asset('assets') }}/images/icons/envelope-icon.svg" alt="envelope"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="your-password" class="form-label mb-2 font-18 font-heading fw-600">Password</label>
                            <div class="position-relative">
                                <input type="password" class="common-input common-input--bg common-input--withIcon" id="your-password" name="password" placeholder="6+ characters, 1 Capital letter" required>
                                <span class="input-icon toggle-password cursor-pointer" id="#your-password"><img src="{{ asset('assets') }}/images/icons/lock-icon.svg" alt="lock"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="flx-between gap-1">
                                <div class="common-check my-2">
                                    <input class="form-check-input" type="checkbox" name="remember" id="keepMe">
                                    <label class="form-check-label mb-0 fw-400 font-14 text-body" for="keepMe">Keep me signed in</label>
                                </div>
                                <a href="#" class="forgot-password text-decoration-underline text-main text-poppins font-14">Forgot password?</a>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-main btn-lg w-100 pill"> Sign In</button>
                        </div>                       
                        <div class="col-sm-12 mb-0">
                            <div class="have-account">
                                <p class="text font-14">New to the market? <a class="link text-main text-decoration-underline fw-500" href="{{ route('showRegisterForm') }}">sign up</a></p>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </section>
@endsection
