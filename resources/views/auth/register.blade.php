@extends('layouts.frontend')
@section('title')
    Apsara || Register
@endsection

@section('page_header')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <a href="{{ route('home') }}"><i class="icon-home"></i> Home</a>
                        <span class="crumbs-spacer"><i class="fa fa-angle-double-right"></i></span>
                        <span class="current">Customer Register </span>
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
                <div class="col-md-12 col-lg-6 col-lg-offset-3">
                    <div class="login">
                        <div class="login-form-container">
                            <div class="login-text">
                                <h3>Creat a new account</h3>
                                <p>Please Register using account detail bellow.</p>
                                @if(session()->has('message'))
                                    <p class="alert alert-{{ session()->get('alert') }}">{{ session()->get('message') }}</p>
                                @endif
                            </div>

                            <form class="login-form" action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="controls">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror " placeholder="Enter name..." name="name" value="{{ old('name') }}">
                                        @error('name')
                                        <small class="text-danger mb-0" style="padding-left: 10px;">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="controls">
                                        <input type="number" class="form-control @error('phone') is-invalid @enderror " placeholder="Enter mobile number ..." name="phone" value="{{ old('phone') }}">
                                        @error('phone')
                                        <small class="text-danger mb-0" style="padding-left: 10px;">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="controls">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror " placeholder="Email" name="email" value="{{ old('email') }}">
                                        @error('email')
                                        <small class="text-danger mb-0" style="padding-left: 10px;">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="controls">
                                        <textarea name="address" class="form-control @error('address') is-invalid @enderror " placeholder="Type your address">{{ old('address') }}</textarea>
                                        @error('address')
                                        <small class="text-danger mb-0" style="padding-left: 10px;">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="controls">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror " placeholder="Password" name="password">
                                        @error('password')
                                        <small class="text-danger mb-0" style="padding-left: 10px;">{{ $message }}</small>
                                        @enderror
{{--                                        <small class="text-success">* Minimum 6 characters password</small>--}}
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <div class="controls">
                                        <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                                    </div>
                                </div> -->

                                <div class="button-box">
                                    <button type="submit" class="btn btn-common log-btn">Register</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
