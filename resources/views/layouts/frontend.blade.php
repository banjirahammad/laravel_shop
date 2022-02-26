<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title') </title>


    <link rel="stylesheet" href="{{ asset('assets/frontend/css/toastr.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap-select.min.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/font-awesome.min.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/line-icons/line-icons.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/frontend/extras/settings.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/frontend/extras/animate.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/frontend/extras/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/extras/owl.theme.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/frontend/extras/ion.rangeSlider.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/extras/ion.rangeSlider.skinFlat.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/frontend/extras/component.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/frontend/extras/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/extras/slick-theme.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/frontend/extras/nivo-lightbox.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/color-switcher.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/slicknav.css') }}" type="text/css">
    <link type="text/css" href="{{ asset('assets/backend/vendor/summernote/summernote.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}" type="text/css">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('upload/images/logos/1621700901.jpg') }}">
    <link rel="icon" href="{{ asset('upload/images/logos/1621700901.jpg') }}">

    <style>
        iframe {
            width: 100% !important;
            height: 270px !important;
        }

        .slicknav_nav {
            max-height: 500px !important;
        }
    </style>
</head>

<body>

@include('frontend.partials.header')

@yield('page_header')

@yield('body')

@include('frontend.partials.footer')


<div class="md-modal md-effect-3" id="modal-3">
    <div class="md-content">
        <div class="product-info row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="product-details-image">
                    <div class="slider-for slider" id="slider">

                    </div>
                    <ul id="productthumbnail" class="slider slider-nav">
                    </ul>
                </div>
            </div>
            <div class="col-md-8 col-sm-6 col-xs-12">
                <div class="info-panel">
                    <h1 class="product-title" id="product_name">Name</h1>

                    <div class="price-ratting">
                        <div class="price float-left" id="price">
                            Tk. 0
                        </div>
                    </div>

                    <div class="short-desc">
                        <h5 class="sub-title">Quick Overview</h5>
                        <div id="summary"></div>
                    </div>
                    <div class="add_to_cart_form" >

                        <div class="product-size">
                            <h5 class="sub-title">Quantity</h5>
                            <div class="qty-box">
                                <div class="input-group">
                                    <input type="number" name="qty" class="form-control input-number" value="1"
                                           min="1">
                                </div>
                            </div>
                        </div>

                        <div class="quantity-cart">
                            <button class="btn btn-common add_to_cart_form"><i class="icon-basket-loaded"></i> add
                                to cart</button>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <button class="md-close"><i class="icon-close"></i></button>

    </div>
</div>


<a href="#" class="back-to-top">
    <i class="icon-arrow-up"></i>
</a>
<div class="md-overlay"></div>


<div id="preloader">
    <div id="status">
        <div class="spinner">
            Loading...
        </div>
    </div>
</div>


<!-- Scripts -->

<script type="text/javascript" src="{{ asset('assets/frontend/js/jquery-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/ion.rangeSlider.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/modalEffects.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/classie.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/nivo-lightbox.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.slicknav.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/form-validator.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/contact-form-script.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/frontend/js/toastr.min.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/summernote/summernote.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/main.js') }}"></script>
@include('sweetalert::alert')
@stack('script')

</body>

</html>
