@extends('layouts.frontend')
@section('title')
    Apsara | Customer Order Details
@endsection

@section('body')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="list-group">
                        <a href="{{ route('customer.dashboard') }}" class="list-group-item ">
                            Dashboard
                        </a>
                        <a href="{{ route('customer.orders') }}" class="list-group-item active">
                            Orders
                        </a>
                        <a href="{{ route('customer.profile') }}" class="list-group-item ">
                            Profile Update
                        </a>
                    </div>
                </div>
                <div class="col-md-8">
                    <h2>Order Information</h2>
                    <table class="table">
                        <tbody >
                            <tr>
                                <td>Order Id</td>
                                <td class="text-center">{{ $order->id }}</td>
                            </tr>
                            <tr>
                                <td>Order Date</td>
                                <td class="text-center">{{ $order->created_at->format('d M, Y') }}</td>
                            </tr>
                            <tr>
                                <td>Order Status</td>
                                <td class="text-center"> <span class="badge">{{ $order->status }}</span> </td>
                            </tr>
                            <tr>
                                <td>Payment Method</td>
                                <td class="text-center">{{ $order->pay_method }}</td>
                            </tr>
                            <tr>
                                <td>TrxId</td>
                                <td class="text-center">{{ $order->trx_id }}</td>
                            </tr>

                        </tbody>
                    </table>

                    <h2>Products </h2>
                    <table class="table">
                        <tbody class="text-center">
                        <tr>
                            <th>SL</th>
                            <th>Product Name </th>
                            <th>Price </th>
                            <th>Quantity </th>
                            <th>Total </th>
                        </tr>
                        @php
                            $totalQty = 0;
                            $totalPrice = 0;
                        @endphp

                        @foreach($order->details as $key => $details)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    {{ $details->name}}
                                </td>
                                <td>
                                    {{ $details->price }} Tk
                                </td>
                                <td>
                                    {{ $details->qty }}
                                </td>
                                <td>
                                    {{ $details->price * $details->qty }} Tk
                                </td>
                            </tr>
                            @php
                                $totalQty +=$details->qty;
                                $totalPrice +=$details->price * $details->qty;
                            @endphp
                        @endforeach
                        <tr>
                            <td colspan="3">Total</td>
                            <td>{{$totalQty}}</td>
                            <td>{{$totalPrice}} Tk</td>
                        </tr>

                        </tbody>
                    </table>

                    <h2>User Information</h2>
                    <table class="table">
                        <tbody >
                            <tr>
                                <td>Name</td>
                                <td class="text-center">{{ $order->user_name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td class="text-center">{{ $order->email }}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td class="text-center">{{ $order->phone }}</td>
                            </tr>
                            <tr>
                                <td>Area</td>
                                <td class="text-center">{{ $order->area == 80 ? 'Inside Dhaka':'Outside Dhaka' }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td class="text-center">{{ $order->address }}</td>
                            </tr>


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection


