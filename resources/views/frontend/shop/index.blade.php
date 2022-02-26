@extends('layouts.frontend')

@section('title')
    Apsara || Shop
@endsection

@section('page_header')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <a href="{{ route('shop') }}"><i class="icon-home"></i> Home</a>
                        <span class="crumbs-spacer"><i class="fa fa-angle-double-right"></i></span>
                        <span class="current">Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body')
    <div id="content" class="product-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">

                    <div class="widget-ct widget-categories mb-30">
                        <div class="widget-s-title">
                            <h4>Categories</h4>
                        </div>
                        <ul id="" class="product-cat">
                            @foreach($categories as $category)
                            <li>
                                <a href="{{ route('shop_cat',$category->slug) }}">
                                    {{ $category->name }}
                                    <span>({{$cat[$category->slug]}})</span>
                                </a>
                            </li>
                            @endforeach

                        </ul>
                    </div>


                    <div class="widget-ct widget-banner">
                        <div class="widget-info widget-banner-img">
                            <a href="#">
                                <img src="{{ asset('upload/brands/'.$brand->photo) }}" alt="">
                            </a>
                        </div>
                    </div>

                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="row shop-content" style="display: block !important">
                        <div class="col-md-12">
                            <div class="product-option mb-30 clearfix">
                                <ul class="shop-tab">
                                    <li class="active">
                                        <a aria-expanded="true" href="#grid-view" data-toggle="tab"><i class="icon-grid"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a aria-expanded="false" href="#list-view" data-toggle="tab"><i class="icon-list"></i></a></li>
                                </ul>

                                <div class="showing text-right">
                                    <p class="hidden-xs">Showing
                                        {{ $products->count() }} Results</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            @if(session('message'))
                                <p class="alert alert-{{ session()->get('alert') }}">{{ session()->get('message') }}</p>
                            @endif
                        </div>
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane active">
                                <div class="row">
                                    @foreach($products as $product)
                                    <div class="col-md-4 col-sm-6 col-xs-6">
                                        <div class="shop-product">
                                            <div class="product-box">
                                                <a href="#"><img src="{{ asset('upload/products/'.$product->product_image) }}" alt="{{ $product->product_name }}"></a>
                                                <div class="cart-overlay">
                                                </div>
                                                <div class="actions">
                                                    <div class="add-to-links">
                                                        <a class="btn-cart" href="{{ route('cart.add',$product->id) }}" title="Add to Cart">
                                                            <i class="icon-basket-loaded"></i>
                                                        </a>

                                                        <a class="btn-quickview md-trigger" href="#" title="">
                                                            <i class="icon-eye"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h4 class="product-title"><a href="product/one-loop-lace-work-hijab-pink.html">{{ $product->product_name }}</a>
                                                </h4>
                                                <div class="align-items">
                                                    <div class="pull-left">
                                                                 <span class="price">Tk {{  $product->product_price }}
                                                                      </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="list-view" class="tab-pane">
                                <div class="shop-list">
                                    @foreach($products as $product)
                                    <div class="col-md-12">
                                        <div class="shop-product clearfix">
                                            <div class="product-box">
                                                <a href="#"><img src="{{ asset('upload/products/'.$product->product_image) }}" alt=""></a>
                                                <div class="cart-overlay">
                                                </div>
                                                <div class="actions">
                                                    <div class="add-to-links">
                                                        <a class="btn-cart" href="{{ route('cart.add',$product->id) }}" title="Add to Cart">
                                                            <i class="icon-basket-loaded"></i>
                                                        </a>

                                                        <a class="btn-quickview md-trigger" href="#" title="View">
                                                            <i class="icon-eye"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="fix">
                                                    <h4 class="product-title">
                                                        <a href="product/one-loop-lace-work-hijab-pink.html">{{ $product->product_name }}</a>
                                                    </h4>

                                                </div>
                                                <div class="fix mb-10">
                                                            <span class="price">Tk
                                                                 {{ $product->product_price }}</span>

                                                </div>
                                                <div class="product-description mb-20">

                                                </div>
                                                <button type="submit" class="btn btn-common">
                                                    <i class="icon-basket-loaded" aria-hidden=" true"></i>
                                                        Add to cart
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pagination">
                        <div class="results-navigation pull-left">
                            Showing Products {{($products->currentPage()-1)* $products->perPage() + 1}} -
                            {{ ($products->currentPage()-1)* $products->perPage() + $products->perPage() }} of {{ $products->total() }} Result
                        </div>


                        {{ $products->links('frontend.partials.paginate') }}


                    </div>





                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#brand').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#category').select2();
        });
    </script>
@endpush

