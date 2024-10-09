<!-- Dashboard Nav Start -->
<div class="dashboard-nav bg-white flx-between gap-md-3 gap-2">
    <div class="dashboard-nav__left flx-align gap-md-3 gap-2">
        <button type="button" class="icon-btn bar-icon text-heading bg-gray-seven flx-center">
            <i class="las la-bars"></i>
        </button>
        <button type="button" class="icon-btn arrow-icon text-heading bg-gray-seven flx-center">
            <img src="{{ asset('assets') }}/images/icons/angle-right.svg" alt="angle">
        </button>
        
    </div>
    <div class="dashboard-nav__right">
        <div class="header-right flx-align">
            <div class="header-right__inner gap-sm-3 gap-2 flx-align d-flex">

        <!-- Light Dark Mode -->
                <div class="theme-switch-wrapper position-relative">
                    <label class="theme-switch" for="checkbox">
                        <input type="checkbox" class="d-none" id="checkbox">
                        <span class="slider text-black header-right__button white-version">
                            <img src="{{ asset('assets') }}/images/icons/sun.svg" alt="">
                        </span>
                        <span class="slider text-black header-right__button dark-version">
                            <img src="{{ asset('assets') }}/images/icons/moon.svg" alt="">
                        </span>
                    </label>
                </div>

                <div class="user-profile">
                    <button class="user-profile__button flex-align">
                        <span class="user-profile__thumb">
                            <img id="navAvatar" src="" alt="Avatar" />
                        </span>
                    </button>
                    <ul class="user-profile-dropdown">
                        <li class="sidebar-list__item">
                            <a href="{{ route('user.profile') }}" class="sidebar-list__link">
                                <span class="sidebar-list__icon">
                                    <img src="{{ asset('assets') }}/images/icons/sidebar-icon2.svg" alt="" class="icon">
                                    <img src="{{ asset('assets') }}/images/icons/sidebar-icon-active2.svg" alt="" class="icon icon-active">
                                </span>
                                <span class="text">Profile</span>
                            </a>
                        </li>                     
                        <li class="sidebar-list__item">
                            <a href="{{ route('logout') }}" class="sidebar-list__link">
                                <span class="sidebar-list__icon">
                                    <img src="{{ asset('assets') }}/images/icons/sidebar-icon13.svg" alt="" class="icon">
                                    <img src="{{ asset('assets') }}/images/icons/sidebar-icon-active13.svg" alt="" class="icon icon-active">
                                </span>
                                <span class="text">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            
                <div class="language-select flx-align">
                    <strong class="user-credit">Credit: 
                        @isset($userDetail)
                            {{ $userDetail->kredit ?? 0 }}
                        @else
                            0
                        @endisset
                    </strong>                                 
                </div>
                
            </div>
        </div>
    </div>
</div>