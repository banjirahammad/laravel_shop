@extends('layouts.backend');
@section('title')
    Admin || Category
@endsection
@section('current-page')
    Category
@endsection
@section('main')

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            All Category
            <a href="{{ route('admin.add.category') }}" class="btn btn-primary" >Add Category</a>
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
