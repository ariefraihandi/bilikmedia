<header class="header bg-transparent">
    <div class="container container-full">
        <nav class="header-inner flx-between">
            <!-- Logo Start -->
            <div class="logo">
                <a href="/" class="link white-version">
                    <img src="{{ asset('assets') }}/images/logo/logo-two.png" alt="Logo">
                </a>
                <a href="/" class="link dark-version">
                    <img src="{{ asset('assets') }}/images/logo/white-logo.png" alt="Logo">
                </a>
            </div>
            <!-- Logo End  -->

            <!-- Menu Start  -->
            <div class="header-menu d-lg-block d-none">
                <ul class="nav-menu flx-align ">                
                    <li class="nav-menu__item">
                        <a href="{{ route('index') }}" class="nav-menu__link">Home</a>
                    </li>
                    <li class="nav-menu__item">
                        <a href="{{ route('showAllProduct') }}" class="nav-menu__link">Product</a>
                    </li>
                    <li class="nav-menu__item has-submenu">
                        <a href="javascript:void(0)" class="nav-menu__link">Tools</a>
                        <ul class="nav-submenu">
                            <li class="nav-submenu__item">
                                <a href="{{ route('envanto.downloader') }}" class="nav-submenu__link">Envato Downloader</a>
                            </li>                            
                            <li class="nav-submenu__item">
                                <a href="{{ route('freepik.downloader') }}" class="nav-submenu__link"> Freepik Downloader</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="{{ route('motionarray.downloader') }}" class="nav-submenu__link"> Motion Array Downloader</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-menu__item has-submenu">
                        <a href="javascript:void(0)" class="nav-menu__link">Graphic</a>
                        <ul class="nav-submenu">
                            <li class="nav-submenu__item">
                                <a href="{{ route('showProductByCategory', ['slug' => 'adobe-photoshop']) }}" class="nav-submenu__link"> Adobe Photoshop</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="{{ route('showProductByCategory', ['slug' => 'after-effects']) }}" class="nav-submenu__link"> After Effects</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="{{ route('showProductByCategory', ['slug' => 'adobe-illustrator']) }}" class="nav-submenu__link"> Adobe Illustrator</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="{{ route('showProductByCategory', ['slug' => 'adobe-indesign']) }}" class="nav-submenu__link"> Adobe InDesign</a>
                            </li>
                           
                            <li class="nav-submenu__item">
                                <a href="{{ route('showProductByCategory', ['slug' => 'canva']) }}" class="nav-submenu__link"> Canva</a>
                            </li>
                         
                        </ul>
                    </li>
                    <li class="nav-menu__item has-submenu">
                        <a href="{{ route('showProductByCategory', ['slug' => 'website-template']) }}" class="nav-menu__link">Website</a>
                        <ul class="nav-submenu">
                            <li class="nav-submenu__item">
                                <a href="{{ route('showProductByCategory', ['slug' => 'admin-template']) }}" class="nav-submenu__link"> Admin Template</a>
                            </li>                            
                            <li class="nav-submenu__item">
                                <a href="{{ route('showProductByCategory', ['slug' => 'website-template']) }}" class="nav-submenu__link"> Website Template</a>
                            </li>                                                                          
                            <li class="nav-submenu__item">
                                <a href="{{ route('showProductByCategory', ['slug' => 'wordpress']) }}" class="nav-submenu__link"> Wordpress</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="{{ route('showProductByCategory', ['slug' => 'woocommerce']) }}" class="nav-submenu__link"> WooCommerce</a>
                            </li>                                           
                        </ul>
                    </li>                    
                    <li class="nav-menu__item has-submenu">
                        <a href="{{ route('showProductByCategory', ['slug' => 'video-templates']) }}" class="nav-menu__link">Video</a>
                        <ul class="nav-submenu">
                            <li class="nav-submenu__item">
                                <a href="{{ route('showProductByCategory', ['slug' => 'stock-footage']) }}" class="nav-submenu__link">Stock Footage</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-menu__item has-submenu">
                        <a href="{{ route('showProductByCategory', ['slug' => 'presentation-templates']) }}" class="nav-menu__link">Presentation</a>
                        <ul class="nav-submenu">
                            <li class="nav-submenu__item">
                                <a href="{{ route('showProductByCategory', ['slug' => 'power-point']) }}" class="nav-submenu__link">Power Point</a>
                            </li>
                        </ul>
                    </li>                                                                                                        
                </ul>               
            </div>
            <!-- Menu End  -->

            <!-- Header Right start -->
            <div class="header-right flx-align">    
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
                
                <div class="header-right__inner gap-3 flx-align d-lg-flex d-none">
                    
                    @if(Auth::check())
                    <!-- Jika pengguna sudah login, tampilkan tombol "Profile" -->
                        <a href="{{ route('user.profile') }}" class="btn btn-main pill">
                            <span class="icon-left icon"> 
                                <img src="{{ asset('assets/images/icons/user.svg') }}" alt="user">
                            </span>Profile  
                        </a>
                        <div class="language-select flx-align">
                            <strong class="user-credit">Credit: 
                                @isset($userDetail)
                                    {{ $userDetail->kredit ?? 0 }}
                                @else
                                    0
                                @endisset
                            </strong>                                 
                        </div>
                    @else
                        <!-- Jika pengguna belum login, tampilkan tombol "Create Account" -->
                        <a href="{{ route('showRegisterForm') }}" class="btn btn-main pill">
                            <span class="icon-left icon"> 
                                <img src="{{ asset('assets/images/icons/user.svg') }}" alt="user">
                            </span>Create Account  
                        </a>
                    @endif                
                </div>
                <button type="button" class="toggle-mobileMenu d-lg-none"> <i class="las la-bars"></i> </button>
            </div>         
        </nav>
    </div>
</header>