@extends('layouts.backend')
@section('title')
    Dashbord || Order View
@endsection
@section('current_page_header')
    <header class="header bg-ui-general">
        <div class="header-info">
            <h1 class="header-title">
                <strong>Order View</strong>
            </h1>
        </div>

        <div class="header-action">
            <nav class="nav">
                <a class="nav-link active" href="{{ route('admin.orders') }}">
                    View
                </a>

                <a class="nav-link" href="{{ route('admin.orders') }}">
                    All Orders
                </a>
            </nav>
        </div>
    </header>
@endsection
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h4 class="card-title text-center"><strong>Order View</strong></h4>
                <div class="card-body card-body-soft">
                    <div class="row">
                        <div class="col-6">
                            <h5>Name : <label>{{$order->user_name}}</label></h5>
                            <h5>Email : <label>{{$order->email}}</label></h5>
                            <h5>Phone : <label>{{$order->phone}}</label></h5>
                            <h5>Address : <label>{{$order->address}}</label></h5>
                            <h5>Order Date : <label>{{$order->created_at->format('d M, Y')}}</label></h5>
                        </div>
                        <div class="col-6">
                            <h5>Oeder Id : <label>{{$order->id}}</label></h5>
                            <h5>Total Price : <label>{{$order->price}}</label></h5>
                            <h5>Total Quantity : <label>{{$order->qty}}</label></h5>
                            <h5>Payment Method : <label>{{$order->pay_method}}</label></h5>
                            <h5>TrxId : <label>{{$order->trx_id}}</label></h5>
                        </div>
                        <br>
                        <hr> <br>
                        <div class="col-12">
                            <div class="table-responsive table-bordered">
                                <table class="table table-soft">
                                    <thead>
                                    <tr class="bg-primary">
                                        <th>Si</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $products as $product )
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>

                                            <td>{{$product->name}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{ $product->qty }}</td>
                                            <td>{{ $product->price*$product->qty }}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
