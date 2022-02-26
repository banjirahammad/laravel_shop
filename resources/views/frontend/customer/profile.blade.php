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
                <div class="col-md-5">
                    <div class="list-group">
                        <a href="{{ route('customer.dashboard') }}" class="list-group-item ">
                            Dashboard
                        </a>
                        <a href="{{ route('customer.orders') }}" class="list-group-item ">
                            Orders
                        </a>
                        <a href="{{ route('customer.profile') }}" class="list-group-item active">
                            Profile Update
                        </a>
                    </div>
                    <h2>Profile Photo </h2>
                    <hr>
                    <div class="">
                        <img class="img-thumbnail" src="{{ asset('upload/users/'.auth()->user()->photo) }}" alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    @if(session()->has('message'))
                        <p class="alert alert-{{ session()->get('alert') }}">{{ session()->get('message') }}</p>
                    @endif
                    <h2>Profile Update </h2>
                    <hr>
                    <form class="mb-50" action="{{ route('customer.profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="controls">
                                <label for="name">Name </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror " name="name" autocomplete="off" value="{{ auth()->user()->name }}">
                                @error('name')
                                <small class="text-danger mb-0" style="padding-left: 10px;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label for="phone">Mobile </label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror " name="phone" autocomplete="off" value="{{ auth()->user()->phone }}">
                                @error('phone')
                                <small class="text-danger mb-0" style="padding-left: 10px;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label for="email">Email </label>
                                <input type="text" class="form-control"  readonly value="{{ auth()->user()->email }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label for="address">Address </label>
                                <textarea name="address" placeholder="Type your address here" class="form-control @error('address') is-invalid @enderror">{{ auth()->user()->address }}</textarea>
                                @error('address')
                                <small class="text-danger mb-0" style="padding-left: 10px;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label for="photo">Profile Photo </label>
                                <input type="file" class="@error('photo') is-invalid @enderror" id="photo" name="photo" >
                                @error('photo')
                                <small class="text-danger mb-0" style="padding-left: 10px;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
