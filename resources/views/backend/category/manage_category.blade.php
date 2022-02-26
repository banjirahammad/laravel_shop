@extends('layouts.backend')
@section('title')
    Dashbord || All Category
@endsection
@section('current_page_header')
    <header class="header bg-ui-general">
        <div class="header-info">
            <h1 class="header-title">
                <strong>All Categories</strong>
            </h1>
        </div>

        <div class="header-action">
            <nav class="nav">
                <a class="nav-link active" href="{{ route('admin.category') }}">
                    Categories
                </a>

                <a class="nav-link" href="{{ route('admin.add.category') }}">
                    <i class="fa fa-plus"></i>
                    Add Category
                </a>
            </nav>
        </div>
    </header>
@endsection
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h4 class="card-title"><strong>Categories</strong></h4>
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
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Count Products</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $categories as $key => $category )
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td>
                                    <img src="{{ asset('upload/categories/'.$category->photo) }}" width="50" alt="{{$category->name}}" >
                                </td>

                                <td>{{$category->name}}</td>
                                <td>{{$category->details}}</td>
                                <td>{{ 20 }}</td>
                                <td> <span class="{{($category->status==1) ? 'text-primary':'text-warning'}}">{{ ($category->status==1)?'Active':'Inactive' }}  </span> </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-cogs"></i>
                                            Manage
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start">
                                            <a class="dropdown-item" href="{{ route('admin.edit.category',$category->id) }}">
                                                <i class="fa fa-edit"></i>
                                                Edit
                                            </a>
                                            <a class="dropdown-item delete" href="{{ route('admin.delete.category',$category->id) }}">
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
                        {{ $categories->links('backend.partials.paginate') }}

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
