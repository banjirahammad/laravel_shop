@extends('layouts.backend')
@section('title')
    Dashbord || All Brand
@endsection
@section('current_page_header')
    <header class="header bg-ui-general">
        <div class="header-info">
            <h1 class="header-title">
                <strong>All Brands</strong>
            </h1>
        </div>

        <div class="header-action">
            <nav class="nav">
                <a class="nav-link active" href="{{ route('admin.brand') }}">
                    Brands
                </a>

                <a class="nav-link" href="{{ route('admin.add.brand') }}">
                    <i class="fa fa-plus"></i>
                    Add Brand
                </a>
            </nav>
        </div>
    </header>
@endsection
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h4 class="card-title"><strong>Brands</strong></h4>
                @if(session()->has('message'))
                    <p class="alert alert-{{ session()->get('alert') }}">{{ session()->get('message') }}</p>
                @endif
                <div class="card-body card-body-soft">
                    <div class="table-responsive table-bordered">
                        <table class="table table-soft">
                            <thead>
                            <tr class="bg-primary">
                                <th>Si</th>
                                <th>Image</th>
                                <th>Brand Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $brands as $key => $brand )
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td>
                                    <img src="{{ asset('upload/brands/'.$brand->photo) }}" width="50" alt="{{$brand->name}}" >
                                </td>

                                <td>{{$brand->name}}</td>
                                <td>{{$brand->details}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-cogs"></i>
                                            Manage
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start">
                                            <a class="dropdown-item" href="{{ route('admin.edit.brand',$brand->id) }}">
                                                <i class="fa fa-edit"></i>
                                                Edit
                                            </a>
                                            <a class="dropdown-item delete" href="{{ route('admin.delete.brand',$brand->id) }}">
                                                <i class="fa fa-trash"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{ $brands->links('backend.partials.paginate') }}

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
