@extends('layouts.backend')
@section('title')
    Dashbord || Add Brand
@endsection
@section('current_page_header')
    <header class="header bg-ui-general">
        <div class="header-info">
            <h1 class="header-title">
                <strong>New Brand</strong>
            </h1>
        </div>

        <div class="header-action">
            <nav class="nav">
                <a class="nav-link" href="{{ route('admin.brand') }}">
                    Brand
                </a>

                <a class="nav-link active" href="{{ route('admin.add.brand') }}">
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
                <h4 class="card-title">New Brand</h4>
                @if(session()->has('message'))
                    <p class="alert alert-{{ session()->get('alert') }}">{{ session()->get('message') }}</p>
                @endif

                <form action="{{ route('admin.add.brand') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Brand Name</label>
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror " name="name" value="{{ old('name') }}" required placeholder="Enter Brand Name...">
                                @error('name')
                                <p class="text-danger mb-0">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="details">Brand Description</label>
                                <textarea name="details" id="details" class="form-control @error('details') is-invalid @enderror">{{ old('details') }}</textarea>
                                @error('details')
                                <p class="text-danger mb-0">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 form-type-line file-group">
                                <label for="photo">Brand Image</label>
                                <input type="text" class="form-control file-value file-browser @error('photo') is-invalid @enderror " placeholder="Choose file..." readonly="">
                                <input type="file" id="photo" class="" name="photo" required>
                                @error('photo')
                                <p class="text-danger mb-0"> {{ $message }} </p>
                                @enderror

                            </div>
                            <div class="form-group col-md-6 mt-4">
                                <button type="submit" class="btn btn-info float-right">
                                    <i class="fa fa-save"></i>
                                    Save Brand
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
