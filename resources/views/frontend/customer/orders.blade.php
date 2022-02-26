@extends('layouts.frontend')
@section('title')
    Apsara | Customer Orders
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
                    <h2>Orders </h2>
                    <table class="table">
                        <tbody class="text-center">
                            <tr>
                                <th>SL</th>
                                <th>Order Date </th>
                                <th>Quantity </th>
                                <th>Price </th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        @if($orders == null)
                            <tr>
                                <td colspan="6" class="text-center">No order found</td>
                            </tr>
                        @else
                            @foreach($orders as $key => $order)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    {{ $order->created_at->format('d M, Y')}}
                                </td>
                                <td>
                                    {{ $order->qty }}
                                </td>
                                <td>
                                    <a href="">{{ $order->price }} Tk</a>
                                </td>

                                <td>
                                    <span class="badge">{{ $order->status }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('customer.order.view',$order->id) }}" class="btn btn-primary">View</a>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
