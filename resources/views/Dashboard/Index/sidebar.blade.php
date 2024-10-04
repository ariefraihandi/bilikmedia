<div class="dashboard-sidebar">
    <button type="button" class="dashboard-sidebar__close d-lg-none d-flex"><i class="las la-times"></i></button>
    <div class="dashboard-sidebar__inner">
        <a href="#" class="logo mb-48">
            <img src="{{ asset('assets') }}/images/logo/logo.png" alt="" class="white-version">
            <img src="{{ asset('assets') }}/images/logo/white-logo-two.png" alt="" class="dark-version">
        </a>
        <a href="#" class="logo favicon mb-48">
            <img src="{{ asset('assets') }}/images/logo/favicon.png" alt="" width="50px">
        </a>

        <!-- Sidebar List Start -->
        <ul class="sidebar-list">
            <li class="sidebar-list__item {{ Route::currentRouteName() == 'showDashboard' ? 'active' : '' }}">
                <a href="{{ route('showDashboard') }}" class="sidebar-list__link">
                    <span class="sidebar-list__icon">
                        @if(Route::currentRouteName() == 'showDashboard')
                            <img src="{{ asset('assets/images/icons/sidebar-icon-active1.svg') }}" alt="" class="icon">
                            <img src="{{ asset('assets') }}/images/icons/sidebar-icon-active1.svg" alt="" class="icon icon-active">
                        @else
                            <img src="{{ asset('assets') }}/images/icons/sidebar-icon1.svg" alt="" class="icon"> 
                            <img src="{{ asset('assets') }}/images/icons/sidebar-icon-active1.svg" alt="" class="icon icon-active">
                        @endif
                    </span>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-list__item">
                <a href="{{ route('show.add.product') }}" class="sidebar-list__link">
                    <span class="sidebar-list__icon">
                        @if(Route::currentRouteName() == 'show.add.product')
                            <img src="{{ asset('assets/images/icons/sidebar-icon-active14.svg') }}" alt="" class="icon">
                            <img src="{{ asset('assets') }}/images/icons/sidebar-icon-active14.svg" alt="" class="icon icon-active">
                        @else
                            <img src="{{ asset('assets') }}/images/icons/sidebar-icon14.svg" alt="" class="icon"> 
                            <img src="{{ asset('assets') }}/images/icons/sidebar-icon-active14.svg" alt="" class="icon icon-active">
                        @endif
                    </span>
                    <span class="text">Produk</span>
                </a>
            </li>

            <li class="sidebar-list__item">
                <a href="{{ route('show.list.product') }}" class="sidebar-list__link">
                    <span class="sidebar-list__icon">
                        @if(Route::currentRouteName() == 'show.list.product')
                            <img src="{{ asset('assets/images/icons/sidebar-icon-active14.svg') }}" alt="" class="icon">
                            <img src="{{ asset('assets') }}/images/icons/sidebar-icon-active14.svg" alt="" class="icon icon-active">
                        @else
                            <img src="{{ asset('assets') }}/images/icons/sidebar-icon14.svg" alt="" class="icon"> 
                            <img src="{{ asset('assets') }}/images/icons/sidebar-icon-active14.svg" alt="" class="icon icon-active">
                        @endif
                    </span>
                    <span class="text">Produk List</span>
                </a>
            </li>

            <li class="sidebar-list__item">
                <a href="{{ route('showDownloadRequestlist') }}" class="sidebar-list__link">
                    <span class="sidebar-list__icon">
                        <img src="{{ asset('assets') }}/images/icons/sidebar-icon6.svg" alt="" class="icon">
                        <img src="{{ asset('assets') }}/images/icons/sidebar-icon-active6.svg" alt="" class="icon icon-active">
                    </span>
                    <span class="text">Downloads Request</span>
                </a>
            </li>
                                          
            <li class="sidebar-list__item">
                <a href="dashboard-profile.html" class="sidebar-list__link">
                    <span class="sidebar-list__icon">
                        <img src="{{ asset('assets') }}/images/icons/sidebar-icon2.svg" alt="" class="icon">
                        <img src="{{ asset('assets') }}/images/icons/sidebar-icon-active2.svg" alt="" class="icon icon-active">
                    </span>
                    <span class="text">Profile</span>
                </a>
            </li>   
            <li class="sidebar-list__item">
                <a href="follower.html" class="sidebar-list__link">
                    <span class="sidebar-list__icon">
                        <img src="{{ asset('assets') }}/images/icons/sidebar-icon4.svg" alt="" class="icon">
                        <img src="{{ asset('assets') }}/images/icons/sidebar-icon-active4.svg" alt="" class="icon icon-active">
                    </span>
                    <span class="text">Followers</span>
                </a>
            </li>
            <li class="sidebar-list__item">
                <a href="following.html" class="sidebar-list__link">
                    <span class="sidebar-list__icon">
                        <img src="{{ asset('assets') }}/images/icons/sidebar-icon5.svg" alt="" class="icon">
                        <img src="{{ asset('assets') }}/images/icons/sidebar-icon-active5.svg" alt="" class="icon icon-active">
                    </span>
                    <span class="text">Followings</span>
                </a>
            </li>
            <li class="sidebar-list__item">
                <a href="setting.html" class="sidebar-list__link">
                    <span class="sidebar-list__icon">
                        <img src="{{ asset('assets') }}/images/icons/sidebar-icon10.svg" alt="" class="icon">
                        <img src="{{ asset('assets') }}/images/icons/sidebar-icon-active10.svg" alt="" class="icon icon-active">
                    </span>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li class="sidebar-list__item">
                <a href="statement.html" class="sidebar-list__link">
                    <span class="sidebar-list__icon">
                        <img src="{{ asset('assets') }}/images/icons/sidebar-icon12.svg" alt="" class="icon">
                        <img src="{{ asset('assets') }}/images/icons/sidebar-icon-active12.svg" alt="" class="icon icon-active">
                    </span>
                    <span class="text">Statements</span>
                </a>
            </li>
            <li class="sidebar-list__item">
                <a href="earning.html" class="sidebar-list__link">
                    <span class="sidebar-list__icon">
                        <img src="{{ asset('assets') }}/images/icons/sidebar-icon11.svg" alt="" class="icon">
                        <img src="{{ asset('assets') }}/images/icons/sidebar-icon-active11.svg" alt="" class="icon icon-active">
                    </span>
                    <span class="text">Earnings</span>
                </a>
            </li>
            <li class="sidebar-list__item">
                <a href="review.html" class="sidebar-list__link">
                    <span class="sidebar-list__icon">
                        <img src="{{ asset('assets') }}/images/icons/sidebar-icon7.svg" alt="" class="icon">
                        <img src="{{ asset('assets') }}/images/icons/sidebar-icon-active7.svg" alt="" class="icon icon-active">
                    </span>
                    <span class="text">Reviews</span>
                </a>
            </li>
        
           
            <li class="sidebar-list__item">
                <a href="refund.html" class="sidebar-list__link">
                    <span class="sidebar-list__icon">
                        <img src="{{ asset('assets') }}/images/icons/sidebar-icon8.svg" alt="" class="icon">
                        <img src="{{ asset('assets') }}/images/icons/sidebar-icon-active8.svg" alt="" class="icon icon-active">
                    </span>
                    <span class="text">Refunds</span>
                </a>
            </li>
            <li class="sidebar-list__item">
                <a href="{{ route('logout') }}" class="sidebar-list__link">
                    <span class="sidebar-list__icon">
                        <img src="{{ asset('assets/images/icons/sidebar-icon13.svg') }}" alt="" class="icon">
                        <img src="{{ asset('assets/images/icons/sidebar-icon-active13.svg') }}" alt="" class="icon icon-active">                        
                    </span>
                    <span class="text">Logout</span>
                </a>
            </li>
            
        </ul>
        <!-- Sidebar List End -->
        
    </div>
</div>