<!DOCTYPE html>
<html lang="en">
    <head>
        @include('frontend.includes.header')
        @include('frontend.includes.css')
    </head>
    <body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
            <header class="header-style-1"> 
                @include('frontend.includes.topber')
                @include('frontend.includes.menu')
            </header>
    <!-- ============================================== HEADER : END ============================================== -->
            <div class="body-content outer-top-xs" id="top-banner-and-menu">
                <div class="container">
                    <div class="row"> 
                        @include('frontend.includes.sideber')
                    <!-- ============================================== CONTENT ============================================== -->
                        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
                            @yield('body')
                        </div>
                    </div>
                </div>
            </div>
            @include('frontend.includes.footer')
            @include('frontend.includes.script')
    </body>
</html>