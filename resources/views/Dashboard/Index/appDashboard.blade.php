<!DOCTYPE html>
<html lang="en">
    @include('Index.head')    
    <body>        
        @include('sweetalert::alert')       

        <div class="overlay"></div>
        <div class="side-overlay"></div>
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>

        @include('Index.mobileMenu')

        <section class="dashboard">
            <div class="dashboard__inner d-flex">
                @include('Dashboard.Index.sidebar')
                
                <div class="dashboard-body">
                    @include('Dashboard.Index.navbar')
                    <div class="dashboard-body__content">
                                      
                                @yield('content')
                           
                    </div>
                    @include('Dashboard.Index.footer')
                </div>
            </div>
        </section>
        @include('Index.script')
    </body>
</html>