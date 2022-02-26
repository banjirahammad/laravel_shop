@extends('layouts.frontend')

@section('title')
    Apsara || Ecommerce Site
@endsection

@section('body')

    <section class="section gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="categories-wrapper white-bg">
                        <h3 class="block-title">Product Categories</h3>
                        <ul class="vertical-menu">
                            <li>
                                <a href="{{ route('shop') }}">All Products</a>
                            </li>
                            @foreach($categories as $category)
                            <li>
                                <a href="{{ route('shop_cat',$category->slug) }}">{{$category->name}}</a>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                @include('frontend.home.slider')
            </div>
        </div>
    </section>

    <section class="feature-categories section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="feature-item-content">
                        <img src="{{ asset('upload/images/banners/1624116883.jpg') }}" alt="">
                        <div class="feature-content">
                            <div class="banner-text">
                                <h4>Trendy Wear</h4>
                                <p>Kurti</p>
                            </div>
                            <a href="shop4a3f.html?category=hijab" class="btn btn-common">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="feature-item-content">
                        <img src="{{ asset('upload/images/banners/1621705155.jpg') }}" alt="">
                        <div class="feature-content">
                            <div class="banner-text">
                                <h4>Anarkali Dress</h4>
                                <p>Exclusive Collections</p>
                            </div>
                            <a href="shop.html" class="btn btn-common">Shop Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="feature-item-content mb-30">
                        <img src="{{ asset('upload/images/banners/1621704307.jpg') }}" alt="">
                        <div class="feature-content">
                            <div class="banner-text accessories">
                                <h4>Khimar Set</h4>
                                <p>View Collection</p>
                            </div>
                            <a href="#www.apsarabyantara.com/shop" class="btn btn-common">Shop Now</a>
                        </div>
                    </div>
                    <div class="feature-item-content mb-30">
                        <img src="{{ asset('upload/images/banners/1621705205.jpg') }}" alt="">
                        <div class="feature-content">
                            <div class="banner-text accessories">
                                <h4>Garara Dresses</h4>
                                <p>Exclusive Collections</p>
                            </div>
                            <a href="#www.apsarabyantara.com/shop" class="btn btn-common">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.home.featured')

    <section class="discount-product-area" style="background-image: url({{ asset('upload/images/banners/1621963160.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="discount-text">
                    <p></p>
                    <h3></h3>
                    <a href="shop.html" class="btn btn-common btn-large">Buy Now</a>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.home.new-arival')


    @include('frontend.home.brand')
@endsection
