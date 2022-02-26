<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('assets/backend/css/core.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/backend/css/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/backend/css/app.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/backend/css/style.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/backend/css/toastr.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/backend/vendor/summernote/summernote.min.css') }}" rel="stylesheet">
        <!-- Favicons -->
        <link rel="apple-touch-icon" href="{{ asset('assets/backend/images/logo-light-lg.png') }}">
        <link rel="icon" href="{{ asset('assets/backend/images/logo-light-lg.png') }}">

        <!-- datatable -->
        <link href="{{ asset('assets/backend/css/jquery.dataTables.min.css') }}" rel="stylesheet">


        <style>.main-content{padding-top:25px}</style>

    </head>

    <body>

        <!-- Preloader -->
        <div class="preloader">
            <div class="spinner-dots">
                <span class="dot1"></span>
                <span class="dot2"></span>
                <span class="dot3"></span>
            </div>
        </div>


        <!-- Sidebar -->
        <!-- Sidebar -->
        @include('backend.partials.left_side_bar')
        <!-- END Sidebar -->
        <!-- END Sidebar -->


        <!-- Topbar -->
        <!-- Topbar -->
        @include('backend.partials.header')
        <!-- END Topbar -->  <!-- END Topbar -->


        <!-- Main container -->
        <main class="main-container" id="app">
            @yield('current_page_header')
            <div class="main-content">
                @yield('main')
            </div>
            <!--/.main-content -->

            <!-- Footer -->
            @include('backend.partials.footer')
            <!-- END Footer -->
        </main>
        <!-- END Main container -->
        <!-- Scripts -->
        {{--<script src="js/app.js"></script>--}}
        <script src="{{ asset('assets/backend/js/core.min.js') }}"></script>
        <script src="{{ asset('assets/backend/vendor/summernote/summernote.min.js') }}"></script>
        <script src="{{ asset('assets/backend/js/app.js') }}"></script>
        <script src="{{ asset('assets/backend/js/script.min.js') }}"></script>
        <script src="{{ asset('assets/backend/js/select2.min.js') }}"></script>

        <!---------- datatable --------->
        <script src="{{ asset('assets/backend/js/jquery.dataTables.min.js') }}"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        @stack('script')
        @include('sweetalert::alert')
        <script>
            $(".select2").select2();
            $(document).ready(function() {
                var table = $('#example').DataTable( {
                    responsive: true
                } );

                new $.fn.dataTable.FixedHeader( table );
            } );
        </script>

    </body>

</html>
