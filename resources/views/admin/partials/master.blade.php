<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="images/favicon.ico">
        
        <!-- select2 css -->
        <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- dropzone css -->
        <link href="{{ asset('css/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
        @yield('stylecss')
        <!-- Bootstrap Css -->
        <link href="{{ asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Sweet Alert-->
        <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    </head>

    
    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            @include('admin.partials.header')
            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.partials.sidebar')
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                @yield('content')
                @include('admin.partials.footer')
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
        <!-- JAVASCRIPT -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('js/simplebar.min.js') }}"></script>
        <script src="{{ asset('js/waves.min.js') }}"></script>
        <!-- select 2 plugin -->
        <script src="{{ asset('js/select2.min.js') }}"></script>
        <!-- dropzone plugin -->
        <script src="{{ asset('js/dropzone.min.js') }}"></script>
        <!-- init js -->
        <script src="{{ asset('js/ecommerce-select2.init.js') }}"></script>
        <!-- Sweet alert init js-->
        <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('js/sweet-alerts.init.js') }}"></script>  
        @yield('script')
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
