@extends('layouts.backend');
@section('title')
    Admin || Edit Category
@endsection
@section('current-page')
    Category
@endsection
@section('main')
    <div class="row">
        <h3><a href="{{ route('admin.category') }}" class="btn btn-primary me-2">All Category</a><a href="{{ route('admin.add.category') }}" class="btn btn-primary">Add Category</a></h3>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mb-4">
                <div class="card-header">
                    <h2 class="text-center">Edit Category</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.edit.category',$category->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" name="name" value="{{ $category->name }}">
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="details" class="form-label">Description</label>
                            <textarea name="details" class="form-control @error('details') is-invalid @enderror " placeholder="Leave a comment here" id="details" style="height: 100px">{{ $category->details }}</textarea>
                            @error('details')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Image</label>
                            <input type="file" class="form-control" id="photo" name="photo">
                            <img class="mt-2 category-img-100" src="{{ asset('upload/categories/'.$category->photo) }}" alt="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Status</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="radio" {{ $category->status==1?'checked':'' }} name="status" value="1" class="form-check-input" id="active">
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="radio" {{ $category->status==0?'checked':'' }} name="status" value="0" class="form-check-input" id="deactive">
                                    <label class="form-check-label" for="deactive">Deactive</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
