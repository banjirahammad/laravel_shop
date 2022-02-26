@extends('layouts.frontend')

@section('title')
    Apsara || Cart
@endsection

@section('page_header')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <a href="{{ route('home') }}"><i class="icon-home"></i> Home</a>
                        <span class="crumbs-spacer"><i class="fa fa-angle-double-right"></i></span>
                        <span class="current">Cart </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="header text-center">
                <h3 class="small-title">Shopping cart</h3>
            </div>

            @if(session()->has('message'))
                <p class="alert alert-{{ session()->get('alert') }} text-center">{{ session()->get('message') }}</p>
            @endif

            @if(isset($carts))
            <div class="col-md-12">
                <div class="wishlist">
                    <div class="col-md-4 col-sm-4 text-center">
                        <p>Product</p>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <p>Price</p>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <p>Quantity</p>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <p>Total</p>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <p>Action</p>
                    </div>
                </div>
            </div>
            @php
                $totalQty = 0;
                $totalPrice = 0;
            @endphp
            @foreach($carts as $cart)
            <div class="wishlist-entry clearfix">
                <div class="col-md-4 col-sm-4">
                    <div class="cart-entry">
                        <a class="image" href=""><img src="{{ asset('upload/products/'.$cart['image']) }}"></a>
                        <div class="cart-content">
                            <h4 class="title">
                                <a href="#">{{ $cart['name'] }}</a>
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 entry">
                    <div class="price">
                        {{ $cart['price']}} Tk
{{--                        <del>1050.00</del>--}}
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                    <ul class="quantity-selector">
                        <li class="entry number">
                            {{ $cart['qty'] }}
                        </li>

                    </ul>
                </div>
                <div class="col-md-2 col-sm-2 entry">
                    <div class="price">
                        {{ $cart['price']*$cart['qty'] }} Tk
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 entry">
                    <a onclick="return confirm('Are you sure? You want to remove ?')" class="btn-close item-remove" href="{{ route('cart.item.delete',$cart['product_id']) }}"><i class="icon-close"></i></a>
                </div>
            </div>
                @php
                    $totalQty +=$cart['qty'];
                    $totalPrice +=$cart['price']*$cart['qty'];
                @endphp
            @endforeach

                <div class="col-md-12">
                    <div class="wishlist">
                        <div class="col-md-4 col-sm-4 text-center">
                            <p>Total</p>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p></p>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p>{{ $totalQty." items" }}</p>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p>{{ $totalPrice.' Tk'}}</p>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p></p>
                        </div>
                    </div>
                </div>

            <div class="col-md-6 col-md-offset-6" style="padding: 25px">
                <a href="{{ route('checkout') }}" class="btn btn-primary">
                    <i class="icon icon-check" style="margin-right: 10px"></i>
                    Checkout
                </a>
            </div>
            @endif

        </div>
    </div>
@endsection
