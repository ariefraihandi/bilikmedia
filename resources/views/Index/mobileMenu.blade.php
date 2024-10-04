<div class="mobile-menu d-lg-none d-block">
    <button type="button" class="close-button"> <i class="las la-times"></i> </button>
    <div class="mobile-menu__inner">
        <a href="/" class="mobile-menu__logo">
            <img src="{{ asset('assets') }}/images/logo/logo.png" alt="Logo" class="white-version">
            <img src="{{ asset('assets') }}/images/logo/white-logo-two.png" alt="Logo" class="dark-version">
        </a>
        <div class="mobile-menu__menu">             
            <ul class="nav-menu flx-align nav-menu--mobile">                
                <li class="nav-menu__item">
                    <a href="/" class="nav-menu__link">Home</a>
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
                        {{-- <li class="nav-submenu__item">
                            <a href="product-details.html" class="nav-submenu__link"> Freepik Downloader</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="all-product.html" class="nav-submenu__link"> Motionarray Downloader</a>
                        </li>                                                --}}
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
                        {{-- <li class="nav-submenu__item">
                            <a href="product-details.html" class="nav-submenu__link"> Adobe XD</a>
                        </li>                            
                        <li class="nav-submenu__item">
                            <a href="product-details.html" class="nav-submenu__link"> Figma</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="product-details.html" class="nav-submenu__link"> Sketch</a>
                        </li> --}}
                        <li class="nav-submenu__item">
                            <a href="{{ route('showProductByCategory', ['slug' => 'canva']) }}" class="nav-submenu__link"> Canva</a>
                        </li>
                        {{-- <li class="nav-submenu__item">
                            <a href="product-details.html" class="nav-submenu__link"> Microsoft Word</a>
                        </li>                         --}}
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
                       
                        <li class="nav-submenu__item">
                            <a href="cart-thank-you.html" class="nav-submenu__link"> Portfolio</a>
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
                    <a href="{{ route('showProductByCategory', ['slug' => 'presentation-templates']) }}" class="nav-menu__link">Presentation Templates</a>
                    <ul class="nav-submenu">
                        <li class="nav-submenu__item">
                            <a href="{{ route('showProductByCategory', ['slug' => 'power-point']) }}" class="nav-submenu__link">Power Point</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-menu__item has-submenu">
                    <a href="{{ route('showProductByCategory', ['slug' => 'sound']) }}" class="nav-menu__link">Sound</a>
                    <ul class="nav-submenu">
                        <li class="nav-submenu__item">
                            <a href="{{ route('showProductByCategory', ['slug' => 'music']) }}" class="nav-submenu__link"> Music</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="{{ route('showProductByCategory', ['slug' => 'royalty-free-music']) }}" class="nav-submenu__link"> Royalty Free Music</a>
                        </li>
                        {{-- <li class="nav-submenu__item">
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
                        </li> --}}
                    </ul>
                </li>                                                                             
                <li class="nav-menu__item has-submenu">
                    <a href="{{ route('showProductByCategory', ['slug' => 'add-ons']) }}" class="nav-menu__link">Add Ons</a>
                    <ul class="nav-submenu">
                        <li class="nav-submenu__item">
                            <a href="{{ route('showProductByCategory', ['slug' => 'adobe-illustrator']) }}" class="nav-submenu__link"> Adobe Illustrator</a>
                        </li>
                    </ul>
                </li>
            </ul>            
        </div>
    </div>
</div>