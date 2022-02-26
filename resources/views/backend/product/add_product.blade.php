@extends('layouts.backend')

@section('title')
    Dashboard || Add Product
@endsection

@section('current_page_header')
    <header class="header bg-ui-general">
        <div class="header-info">
            <h1 class="header-title">
                <strong>New Product</strong>
            </h1>
        </div>

        <div class="header-action">
            <nav class="nav">
                <a class="nav-link" href="{{ route('admin.product') }}">
                    Product
                </a>

                <a class="nav-link active" href="{{ route('admin.add.product') }}">
                    <i class="fa fa-plus"></i>
                    Add Product
                </a>
            </nav>
        </div>
    </header>
@endsection

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="col-12" style="">
                        <h4 class="card-title" style="display: inline-block;">New Product</h4>
                    </div>
                    <div class="col-12">
                        @if(session()->has('message'))
                            <p class="alert alert-{{ session()->get('alert') }}">{{ session()->get('message') }}</p>
                        @endif
                    </div>
                </div>
                <form action="{{ route('admin.add.product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-8">

                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" id="product_name" class="form-control @error('product_name') is-invalid @enderror " name="product_name" value="{{ old('product_name') }}" placeholder="Enter Product Name...">
                                    @error('product_name')
                                    <p class="text-danger mb-0">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="product_code">Product Code</label>
                                    <input type="text" id="product_code" class="form-control @error('product_code') is-invalid @enderror " name="product_code" value="{{ old('product_code') }}" placeholder="Enter Product Code...">
                                    @error('product_code')
                                    <p class="text-danger mb-0">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select name="category_id" id="category" class="form-control @error('category_id') is-invalid @enderror ">
                                                <option value="">Select Categories</option>
                                                @foreach($categories as $category)
                                                    <option {{ old('category_id')==$category->id?'selected':'' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <p class="text-danger mb-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="brand">Brand</label>
                                            <select name="brand_id" id="brand_id" class="form-control @error('brand_id') is-invalid @enderror ">
                                                <option value="">Select brands</option>
                                                @foreach($brands as $brand)
                                                    <option {{ old('brand_id')==$brand->id?'selected':'' }} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('brand_id')
                                            <p class="text-danger mb-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="product_qty">Opening Stock</label>
                                    <input type="text" id="product_qty" name="product_qty" value="{{ old('product_qty') }}" class="form-control @error('product_qty') is-invalid @enderror ">
                                    @error('product_qty')
                                    <p class="text-danger mb-0">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="product_price">Price</label>
                                    <input type="text" id="product_price" name="product_price" class="form-control @error('product_price') is-invalid @enderror " value="{{ old('product_price') }}" placeholder="Enter Product price...">
                                    @error('product_price')
                                    <p class="text-danger mb-0">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="product_cost">Cost</label>
                                    <input type="text" id="product_cost" class="form-control @error('product_cost') is-invalid @enderror " name="product_cost" value="{{ old('product_cost') }}" placeholder="Enter Product cost...">
                                    @error('product_cost')
                                    <p class="text-danger mb-0">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label >Product Details</label>
                                    <textarea class="@error('product_des') is-invalid @enderror" name="product_des" id="summernote" data-min-height="200" placeholder="Write Product Details">{{ old('product_des') }}</textarea>
                                    @error('product_des')
                                    <p class="text-danger mb-0">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group form-type-line file-group">
                                    <label for="product_image">Product Image</label>
                                    <input type="text" id="product_image" class="form-control file-value file-browser @error('product_image') is-invalid @enderror " placeholder="Choose file..." readonly="">
                                    <input type="file" name="product_image">
                                    @error('product_image')
                                    <p class="text-danger mb-0">{{ $message }}</p>
                                    @enderror
                                    <small>Size: 298x284 pixels</small>
                                </div>
                            </div>
                            <div class="form-group col-md-6">

                            </div>
                        </div>
                        <hr>
                        <div class="form-row justify-content-center">
                            <div class="form-group ">
                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-save"></i>
                                    Save Product
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder:'Product Description',
                tabsize: 2,
                height: 200
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#brand').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#category').select2();
        });
    </script>
@endpush
