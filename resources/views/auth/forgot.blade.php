@extends('layouts.frontend')
@section('title')
    Apsara || Forget Password
@endsection

@section('page_header')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <a href="{{ route('home') }}"><i class="icon-home"></i> Home</a>
                        <span class="crumbs-spacer"><i class="fa fa-angle-double-right"></i></span>
                        <span class="current">Forget Password </span>
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
                                <h3>Password Forgot</h3>
                            </div>
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(session()->has('message'))
                                <p class="alert alert-{{ session()->get('alert') }}">{{ session()->get('message') }}</p>
                            @endif
                            <form class="login-form" action="" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="controls">
                                        <input type="text" class="form-control" placeholder="Enter your account email..." name="email" value="{{ old('email') }}" autocomplete="off">
                                    </div>
                                </div>

                                <div class="button-box">
                                    <div class="login-toggle-btn">
                                        <a href="{{ route('login') }}">Login?</a>
                                    </div>
                                    <button type="submit" class="btn btn-common log-btn">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
