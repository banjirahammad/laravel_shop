@extends('layouts.frontend')
@section('title')
    Apsara || Login
@endsection

@section('page_header')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <a href="{{ route('home') }}"><i class="icon-home"></i> Home</a>
                        <span class="crumbs-spacer"><i class="fa fa-angle-double-right"></i></span>
                        <span class="current">Login </span>
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
                                <h3>Login</h3>
                                <p>Please Register using account detail bellow.</p> <br>
                                @if(session()->has('message'))
                                    <p class="alert alert-{{ session()->get('alert') }}">{{ session()->get('message') }}</p>
                                @endif
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

                            <form class="login-form" action="{{ route('login') }}" role="form" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="controls">
                                        <a href="{{route('google')}}" class="btn btn-common log-btn mb-10">Login with Google</a>
                                        <a href="{{ route('facebook') }}" class="btn btn-common log-btn pull-right mb-10">Login with Facebook</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="controls">
                                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="controls">
                                        <input type="password" class="form-control" placeholder="Password" name="password" value="{{ old('password') }}" autocomplete="off">
                                    </div>
                                </div>
                                <div class="button-box">
                                    <div class="login-toggle-btn">
                                        <input type="checkbox">
                                        <label>Remember me</label>
                                        <a href="{{ route('forgot') }}">Forgot Password?</a>
                                    </div>
                                    <button type="submit" class="btn btn-common log-btn">Login</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
