<!DOCTYPE html>
<html lang="en">
    @include('Index.head')    
    <body>        
        @include('sweetalert::alert')

        <div class="loader-mask">
            <div class="loader">
                <div></div>
                <div></div>
            </div>
        </div>

        <div class="overlay"></div>
        <div class="side-overlay"></div>
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>

        @include('Index.mobileMenu')
        
        <main class="main-wrapper index-three-wrapper position-relative z-index-1">
            <img src="{{ asset('assets') }}/images/shapes/border-box.png" alt="border-box" class="border-box">
            @include('Index.navbar')
            @yield('content')
        </main>
        @include('Index.footer')
        @include('Index.script')
    </body>
</html>