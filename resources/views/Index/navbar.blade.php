<header class="header bg-transparent">
    <div class="container container-full">
        <nav class="header-inner flx-between">
            <!-- Logo Start -->
            <div class="logo">
                <a href="index.html" class="link white-version">
                    <img src="{{ asset('assets') }}/images/logo/logo-two.png" alt="Logo">
                </a>
                <a href="index.html" class="link dark-version">
                    <img src="{{ asset('assets') }}/images/logo/white-logo.png" alt="Logo">
                </a>
            </div>
            <!-- Logo End  -->

            <!-- Menu Start  -->
            <div class="header-menu d-lg-block d-none">
                <ul class="nav-menu flx-align ">                
                    <li class="nav-menu__item">
                        <a href="/" class="nav-menu__link">Home</a>
                    </li>
                    <li class="nav-menu__item has-submenu">
                        <a href="javascript:void(0)" class="nav-menu__link">Tools</a>
                        <ul class="nav-submenu">
                            <li class="nav-submenu__item">
                                <a href="all-product.html" class="nav-submenu__link"> Envanto Downloader</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="product-details.html" class="nav-submenu__link"> Freepik Downloader</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="all-product.html" class="nav-submenu__link"> Motionarray Downloader</a>
                            </li>                                               
                        </ul>
                    </li>
                    <li class="nav-menu__item has-submenu">
                        <a href="javascript:void(0)" class="nav-menu__link">Graphic</a>
                        <ul class="nav-submenu">
                            <li class="nav-submenu__item">
                                <a href="all-product.html" class="nav-submenu__link"> Adobe Photoshop</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="product-details.html" class="nav-submenu__link"> Adobe Illustrator</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="all-product.html" class="nav-submenu__link"> Adobe InDesign</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="product-details.html" class="nav-submenu__link"> Adobe XD</a>
                            </li>                            
                            <li class="nav-submenu__item">
                                <a href="product-details.html" class="nav-submenu__link"> Figma</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="product-details.html" class="nav-submenu__link"> Sketch</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="all-product.html" class="nav-submenu__link"> Canva</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="product-details.html" class="nav-submenu__link"> Microsoft Word</a>
                            </li>                        
                        </ul>
                    </li>
                    <li class="nav-menu__item has-submenu">
                        <a href="javascript:void(0)" class="nav-menu__link">Website</a>
                        <ul class="nav-submenu">
                            <li class="nav-submenu__item">
                                <a href="{{ route('showProductByCategory', ['slug' => 'admin-template']) }}" class="nav-submenu__link"> Admin Template</a>
                            </li>                            
                            <li class="nav-submenu__item">
                                <a href="{{ route('showProductByCategory', ['slug' => 'website-template']) }}" class="nav-submenu__link"> Website Template</a>
                            </li>                                                     
                            <li class="nav-submenu__item">
                                <a href="profile.html" class="nav-submenu__link"> HTML</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="cart.html" class="nav-submenu__link"> Wordpress</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="cart-personal.html" class="nav-submenu__link"> Blogger</a>
                            </li>
                           
                            <li class="nav-submenu__item">
                                <a href="cart-thank-you.html" class="nav-submenu__link"> Portfolio</a>
                            </li>                        
                        </ul>
                    </li>
                    <li class="nav-menu__item has-submenu">
                        <a href="javascript:void(0)" class="nav-menu__link">Sound Effects</a>
                        <ul class="nav-submenu">
                            <li class="nav-submenu__item">
                                <a href="blog.html" class="nav-submenu__link"> Game Sounds</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="blog-details.html" class="nav-submenu__link"> Transitions & Movement</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="blog-details-sidebar.html" class="nav-submenu__link"> Domestic Sounds</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="blog.html" class="nav-submenu__link"> Human Sounds</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="blog-details.html" class="nav-submenu__link"> Urban Sounds</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="blog-details-sidebar.html" class="nav-submenu__link"> Nature Sounds</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="blog.html" class="nav-submenu__link"> Futuristic Sounds</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="blog-details.html" class="nav-submenu__link"> Interface Sounds</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="blog-details-sidebar.html" class="nav-submenu__link"> Cartoon Sounds</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="blog.html" class="nav-submenu__link"> Industrial Sounds</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="blog-details.html" class="nav-submenu__link"> Sound Packs</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="blog-details-sidebar.html" class="nav-submenu__link"> Miscellaneous</a>
                            </li>
                        </ul>
                    </li>                                                                             
                    <li class="nav-menu__item">
                        <a href="contact.html" class="nav-menu__link">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- Menu End  -->

            <!-- Header Right start -->
            <div class="header-right flx-align">
                    <!-- <button type="button" class="header-right__button"><img src="{{ asset('assets') }}/images/icons/sun.svg" alt=""></button> -->
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
                    
                    <div class="header-right__inner gap-3 flx-align d-lg-flex d-none">                        
                    </div>
                    <button type="button" class="toggle-mobileMenu d-lg-none"> <i class="las la-bars"></i> </button>
            </div>           
        </nav>
    </div>
</header>