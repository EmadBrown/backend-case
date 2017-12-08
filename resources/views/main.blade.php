<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
        @include('partials._head')
         @yield('stylesheet')
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar">
        <div id="main-wrapper">
        <!-- Page Preloader -->
                <div id="preloader">
                            <div id="status">
                                <div class="status-mes"></div>
                            </div>  
                </div>
                <!-- preloader -->

                <div class="uc-mobile-menu-pusher">
                            <div class="content-wrapper">
                                    @include('partials._nav')  

                                            @yield('content')

                                    @include('partials._footer') 

                            </div>
                <!-- #content-wrapper -->

                </div>
                <!-- .offcanvas-pusher -->
        </div>
     @include('partials._javascript')  

                @yield('script')
</body>
</html>