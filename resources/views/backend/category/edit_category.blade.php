@extends('layouts.backend')
@section('title')
    Dashboard || Edit Category
@endsection
@section('current_page_header')
    <header class="header bg-ui-general">
        <div class="header-info">
            <h1 class="header-title">
                <strong>Edit Category</strong>
            </h1>
        </div>

        <div class="header-action">
            <nav class="nav">
                <a class="nav-link" href="{{ route('admin.category') }}">
                    Category
                </a>

                <a class="nav-link active" href="#">
                    <i class="fa fa-edit"></i>
                    Edit Category
                </a>
            </nav>
        </div>
    </header>
@endsection


@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h4 class="card-title">Edit Category</h4>
                @if(session()->has('message'))
                    <p class="alert alert-{{ session()->get('alert') }}">{{ session()->get('message') }}</p>
                @endif
                <form action="{{ route('admin.edit.category',$category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Category Name</label>
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}" required placeholder="Enter Category Name...">
                                @error('name')
                                <p class="text-danger mb-0">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="details">Category Description</label>
                                <textarea name="details" id="details" required class="form-control @error('details') is-invalid @enderror">{{ $category->details }}</textarea>
                                @error('details')
                                <p class="text-danger mb-0">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Category Status</label> <br>
                                <label class="mr-5"><input type="radio" name="status" required value="1" {{ $category->status==1?'checked':'' }} > Active</label>
                                <label ><input type="radio" name="status" required value="0" {{ $category->status==0?'checked':'' }} > Inactive</label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 form-type-line file-group">
                                <label for="photo">Category Image</label>
                                <label>
                                    <input type="text" class="form-control file-value file-browser @error('photo') is-invalid @enderror " placeholder="Choose file..." readonly="">
                                </label>
                                <input type="file" class="" id="photo" name="photo">

                                @error('photo')
                                <p class="text-danger mb-0"> {{ $message }} </p>
                                @enderror
                                <img class="mt-4 img-thumbnail" height="150px" width="150px" src="{{ asset('upload/categories/'.$category->photo) }}" alt="">
                            </div>
                            <div class="form-group col-md-6 mt-4">
                                <button type="submit" class="btn btn-info float-right">
                                    <i class="fa fa-save"></i>
                                    Update Category
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
