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
        <div class="account__right padding-t-120 flx-align">

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
                <h4 class="account-content__title mb-48 text-capitalize">Create A Free Account</h4>

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-12">
                            <label for="username" class="form-label mb-2 font-18 font-heading fw-600">Username</label>
                            <div class="position-relative">
                                <input type="text" class="common-input common-input--bg common-input--withIcon" id="username" name="username" placeholder="username" required>
                                <span class="input-icon"><img src="{{ asset('assets') }}/images/icons/user-icon.svg" alt="user"></span>
                            </div>
                        </div>
                
                        <div class="col-12">
                            <label for="email" class="form-label mb-2 font-18 font-heading fw-600">Email</label>
                            <div class="position-relative">
                                <input type="email" class="common-input common-input--bg common-input--withIcon" id="email" name="email" placeholder="infoname@mail.com" required>
                                <span class="input-icon"><img src="{{ asset('assets') }}/images/icons/envelope-icon.svg" alt="envelope"></span>
                            </div>
                        </div>
                
                        <div class="col-12">
                            <label for="password" class="form-label mb-2 font-18 font-heading fw-600">Password</label>
                            <div class="position-relative">
                                <input type="password" class="common-input common-input--bg common-input--withIcon" id="password" name="password" placeholder="6+ characters, 1 Capital letter" required>
                                <span class="input-icon toggle-password cursor-pointer" id="#password"><img src="{{ asset('assets') }}/images/icons/lock-icon.svg" alt="lock"></span>
                            </div>
                        </div>
                
                        <div class="col-12">
                            <label for="password_confirmation" class="form-label mb-2 font-18 font-heading fw-600">Confirm Password</label>
                            <div class="position-relative">
                                <input type="password" class="common-input common-input--bg common-input--withIcon" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>
                                <span class="input-icon toggle-password cursor-pointer" id="#password_confirmation"><img src="{{ asset('assets') }}/images/icons/lock-icon.svg" alt="lock"></span>
                            </div>
                        </div>                                                
                        <div class="col-12">
                            <div class="common-check my-2">
                                <input class="form-check-input" type="checkbox" name="agree" id="agree" required>
                                <label class="form-check-label mb-0 fw-400 font-16 text-body" for="agree">I agree to the terms & conditions</label>
                            </div>
                        </div>
                        <input type="hidden" id="reff" name="reff" value="{{$reff}}">
                        <div class="col-12">
                            <button type="submit" class="btn btn-main btn-lg w-100 pill"> Create An Account</button>
                        </div>                      
                
                        <div class="col-sm-12 mb-0">
                            <div class="have-account">
                                <p class="text font-14">Already a member? <a class="link text-main text-decoration-underline fw-500" href="{{ route('showLoginForm') }}">Login</a></p>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </section>
@endsection
