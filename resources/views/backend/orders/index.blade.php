@extends('layouts.backend')
@section('title')
    Dashbord || Orders
@endsection
@section('current_page_header')
    <header class="header bg-ui-general">
        <div class="header-info">
            <h1 class="header-title">
                <strong>All Orders</strong>
            </h1>
        </div>

        <div class="header-action">
            <nav class="nav">
                <a class="nav-link active" href="{{ route('admin.orders') }}">
                    All
                </a>

                <a class="nav-link" href="{{ route('admin.add.category') }}">
                    Pending Orders
                </a>
                <a class="nav-link" href="{{ route('admin.add.category') }}">
                    Cancel Orders
                </a>
            </nav>
        </div>
    </header>
@endsection
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h4 class="card-title"><strong>Orders</strong></h4>
                <div class="card-body card-body-soft">
                    <table class=" table table-striped table-bordered nowrap" id="example">
                        <thead>
                        <tr class="bg-primary">
                            <th>Si</th>
                            <th>Order Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Price</th>
                            <th>Activity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user_name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->price }} Tk</td>
                                <td> <span class="badge {{ $order->seen == 0 ?'badge-warning':'badge-info' }}">{{ $order->seen == 0?'Unseen':'Seen' }}</span></td>
                                <td><span class="badge @if($order->status=='Pending')
                                        badge-warning
                                    @elseif($order->status=='Receive')
                                        badge-warning
                                    @elseif($order->status=='Processing')
                                        badge-info
                                    @elseif($order->status=='Deliver')
                                        badge-success
                                    @else
                                        badge-danger
                                    @endif ">{{ $order->status }}</span></td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-cogs"></i>
                                            Manage
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start">
                                            <a class="dropdown-item" href="{{ route('admin.view.order',$order->id) }}">
                                                <i class="fa fa-eye"></i>
                                                View
                                            </a>
                                            <a class="dropdown-item" data-toggle="modal" href="#editStatus{{$order->id}}">
                                                <i class="fa fa-edit"></i>
                                                Edit
                                            </a>
                                            <a class="dropdown-item delete" href="{{ route('admin.delete.order',$order->id) }}">
                                                <i class="fa fa-trash"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="editStatus{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Order Status</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('admin.orders')}}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="number" value="{{ $order->id }}" name="order_id" hidden >
                                                    <select name="status" class="form-control" id="statuSelect">
                                                        <option {{$order->status=='Pending'?'selected':''}}  value="Pending">Pending</option>
                                                        <option {{$order->status=='Receive'?'selected':''}} value="Receive">Receive</option>
                                                        <option {{$order->status=='Processing'?'selected':''}} value="Processing">Processing</option>
                                                        <option {{$order->status=='Deliver'?'selected':''}} value="Deliver">Deliver</option>
                                                        <option {{$order->status=='Cancel'?'selected':''}} value="Cancel">Cancel</option>
                                                    </select>
                                                </div>
                                                <button class="btn btn-info" type="submit">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
