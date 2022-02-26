@extends('layouts.frontend')
@section('title')
    Apsara || Customer Dashboard
@endsection

@section('page_header')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <a href="{{ route('home') }}"><i class="icon-home"></i> Home</a>
                        <span class="crumbs-spacer"><i class="fa fa-angle-double-right"></i></span>
                        <span class="current"> Customer Dashboard </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="list-group">
                        <a href="{{ route('customer.dashboard') }}" class="list-group-item active">
                            Dashboard
                        </a>
                        <a href="{{ route('customer.orders') }}" class="list-group-item ">
                            Orders
                        </a>
                        <a href="{{ route('customer.profile') }}" class="list-group-item ">
                            Profile Update
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h2>Dashboard</h2>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p>Total Orders : <strong> 0 </strong></p>
                            <p>Name : <strong> {{ auth()->user()->name }} </strong></p>
                            <p>Email : <strong> {{ auth()->user()->email }} </strong></p>
                            <p>Address : <strong>{{ auth()->user()->address }}</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <h3>Profile Picture</h3>
                    <div class="card">
                        <img src="{{ asset('upload/users/'.auth()->user()->photo) }}" class="img-thumbnail" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
