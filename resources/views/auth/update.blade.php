@extends('layouts.frontend')
@section('title')
    Apsara || Update Password
@endsection

@section('page_header')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <a href="{{ route('home') }}"><i class="icon-home"></i> Home</a>
                        <span class="crumbs-spacer"><i class="fa fa-angle-double-right"></i></span>
                        <span class="current">Update Password </span>
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
                                <h3>Update Password</h3><br>
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

                            <form class="login-form" action="{{ route('update.password',$token) }}" role="form" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="controls">
                                        <input type="password" class="form-control" placeholder="Password" name="password" value="{{ old('password') }}" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="controls">
                                        <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" value="{{ old('password_confirmation') }}" autocomplete="off">
                                    </div>
                                </div>
                                <div class="button-box">
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
