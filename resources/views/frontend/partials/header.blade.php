<div class="header">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-4">
                    <div class="language-wrapper">
                        <div class="box-language">

                        </div>

                        <a href="tel:01533-668317"><i class="icon-phone"></i> Call Us: 01533-668317</a>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="col-md-6 col-sm-8">

                    <div class="search-area">
                        <form action="https://www.apsarabyantara.com/shop">
                            <div class="control-group">
                                <input class="search-field" name="search" placeholder="Search here...">
                                <button class="search-button" type="submit">
                                    <i class="icon-magnifier"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="shop-cart">
                        <ul>

                            <li>
                                <a href="#" class="cart-icon cart-btn"><i class="icon-basket-loaded"></i><span
                                        class="cart-label cart_number_of_products">0</span></a>
                                <div class="cart-box">
                                    <div class="popup-container">

                                        <div class="cart-list"></div>


                                        <div class="summary">
                                            <div class="subtotal">Sub Total</div>
                                            <div class="price-s sub_total">0</div>
                                        </div>
                                        <div class="cart-buttons">
                                            <a href="{{ route('cart') }}" class="btn btn-border-2">View
                                                Cart</a>
                                            <a href="{{ route('checkout') }}"
                                               class="btn btn-common">Checkout</a>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <nav class="navbar navbar-default" data-spy="affix" data-offset-top="50">
        <div class="container">
            <div class="row">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('upload/images/logos/1621700901.jpg') }}" alt="">
                    </a>
                </div>
                <div class="navbar-collapse collapse">

                    <ul class="nav navbar-nav">
                        <li>
                            <a class="active"
                               href="{{ route('home') }}">Home </a>
                        </li>
                        <li>
                            <a class=""
                               href="about.html">
                                About
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ route('shop') }}">
                                Shop
                            </a>
                        </li>
                        <li>
                            <a class=""
                               href="order-tracking.html">
                                Tracking
                            </a>
                        </li>
                        <li>
                            <a class=""
                               href="videos.html">
                                Videos
                            </a>
                        </li>
                        <li>
                            <a class=""
                               href="{{ route('checkout') }}">Checkout</a>
                        </li>

                        <li>
                            <a href="contact.html">
                                Contact
                            </a>
                        </li>
                    </ul>

                    <div class="icon-right pull-right">
                        <div class="text-right">

                            <div class="account link-inline">
                                <div class="dropdown text-right">
                                    @if(auth()->check())
                                        <a href="#" aria-expanded="false" class="dropdown-toggle"
                                           data-toggle="dropdown">
                                            <span class="icon-user"></span>
                                            Account
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ auth()->user()->role == 1 ? route('admin.dashboard'):route('customer.dashboard') }}">
                                                    <span class="icon icon-user"></span>
                                                    My Account
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}"><span
                                                        class="icon icon-logout"></span>
                                                    Logout
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="icon icon-close"></span>
                                                    close
                                                </a>
                                            </li>
                                        </ul>
                                    @else
                                        <a href="#" aria-expanded="false" class="dropdown-toggle"
                                           data-toggle="dropdown">
                                            Login/Register
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ route('login') }}">
                                                    <span class="icon icon-lock"></span>
                                                    Log In
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('register') }}"><span
                                                        class="icon icon-user-follow"></span>
                                                    Create an account
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="icon icon-close"></span>
                                                    close
                                                </a>
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <ul class="mobile-menu">
            <li>
                <a class="active" href="{{ route('home') }}">
                    Home
                </a>
            </li>
            <li>
                <a class="" href="shop.html">
                    Shop
                </a>
            </li>
            <li>
                <a class=""
                   href="order-tracking.html">
                    Tracking
                </a>
            </li>
            <li>
                <a class="" href="videos.html">
                    Videos
                </a>
            </li>
            <li>
                <a class="" href="about.html">About</a>
            </li>
            <li>
                <a class=""
                   href="{{ route('checkout') }}">Checkout</a>
            </li>
            <li>
                <a href="contact.html">
                    Contact
                </a>
            </li>
            @if(auth()->check())
                <li>
                    <a href="#">
                        My Account
                    </a>
                    <ul class="dropdown">


                        <li>
                            <a href="{{ route('customer.dashboard') }}">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}">
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            @else
                <li>
                    <a href="#">
                        Login/Register
                    </a>
                    <ul class="dropdown">


                        <li>
                            <a href="{{ route('login') }}">
                                Log In
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">
                                Create an account
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

        </ul>

    </nav>
</div>
