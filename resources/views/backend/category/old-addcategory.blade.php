@extends('layouts.backend');
@section('title')
    Admin || Add Category
@endsection
@section('current-page')
    Category
@endsection
@section('main')
    <div class="row">
        <h3><a href="{{ route('admin.category') }}" class="btn btn-primary">All Category</a></h3>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mb-4">
                <div class="card-header">
                    <h2 class="text-center">Add Category</h2>
                </div>
                <div class="card-body">
{{--                    @if ($errors->any())--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <ul>--}}
{{--                                @foreach ($errors->all() as $error)--}}
{{--                                    <li>{{ $error }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endif--}}
                    <form method="post" action="{{ route('admin.add.category') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" required class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="details" class="form-label">Description</label>
                            <textarea name="details" required class="form-control @error('details') is-invalid @enderror" placeholder="Leave a comment here" id="details" style="height: 100px">{{ old('details') }}</textarea>
                            @error('details')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Image</label>
                            <input type="file" required class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                            @error('photo')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Status</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="radio" name="status" required value="1" {{ old('status')==1?"checked":'' }} class="form-check-input" id="active">
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="radio"  name="status" required value="0" {{ old('status')==0?"checked":'' }} class="form-check-input" id="deactive">
                                    <label class="form-check-label" for="deactive">Deactive</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            All Category
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                    <th>Si</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Si</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach( $categories as $key => $category )
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$category->name}}</td>
                        <td class="w-25">{{$category->details}}</td>
                        <td class="mw-100 mh-100"><img class="category-img-100" src="{{ asset('upload/categories/'.$category->photo) }}" alt=""></td>
                        <td> <span class="{{($category->status==1) ? 'text-primary':'text-warning'}}">{{ ($category->status==1)?'Active':'Inactive' }}  </span> </td>
                        <td>
                            <a href="{{ route('admin.edit.category',$category->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('admin.delete.category',$category->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
