@extends('layouts.backend')

@section('title')
    Dashboard || All Product
@endsection

@section('current_page_header')
    <header class="header bg-ui-general">
        <div class="header-info">
            <h1 class="header-title">
                <strong>All Product</strong>
            </h1>
        </div>

        <div class="header-action">
            <nav class="nav">
                <a class="nav-link active" href="{{ route('admin.product') }}">
                    Product
                </a>

                <a class="nav-link" href="{{ route('admin.add.product') }}">
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
            <div class="card card-body mb-2">
                <form action="">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <input type="text" name="code" class="form-control" placeholder="Product Code">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" name="name" placeholder="Product Name">
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-group">
                                <select name="category" id="" class="form-control">
                                    <option value="">Select Category</option>
                                    <option value="1">Electronics</option>
                                    <option value="2">House</option>
                                    <option value="3">Fashion</option>
                                    <option value="4">Hardware</option>
                                    <option value="5">Document</option>
                                    <option value="6">j</option>
                                    <option value="7">crokarise</option>
                                    <option value="8">Service</option>
                                    <option value="9">R1</option>
                                    <option value="10">R2</option>
                                    <option value="12">R4</option>
                                    <option value="13">Projector</option>
                                    <option value="14">SMART PHONE</option>
                                    <option value="15">Auto Parts</option>
                                    <option value="16">Dairy</option>
                                    <option value="17">Juta</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="form-group float-right">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-sliders"></i>
                                Filter
                            </button>
                            <a href="https://pos.softghor.com/back/product" class="btn btn-info">Reset</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card">
                <h4 class="card-title"><strong>Products</strong></h4>
                @if(session()->has('message'))
                    <p class="alert alert-{{ session()->get('alert') }}">{{ session()->get('message') }}</p>
                @endif
                <div class="card-body">
                    <div class="">
                        <table class="table table-responsive table-bordered" data-provide="">
                            <thead>
                                <tr class="bg-primary">
                                    <th class="text-center">Si</th>
                                    <th class="text-center">Image</th>
                                    <th>Code</th>
                                    <th>Name</th>
{{--                                    <th>Description</th>--}}
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Cost</th>
                                    <th class="text-center">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td style="padding:5px" class="text-center">
                                        <img src="{{ asset('upload/products/'.$product->product_image) }}" width="40" alt="{{ $product->product_name }}" >
                                    </td>
                                    <td>{{ $product->product_code }}</td>
                                    <td style="max-width:120px;">{{ $product->product_name }}</td>
{{--                                    <td style="max-width:120px;">{{ $product->product_des }}</td>--}}
                                    <td>{{ $product->category_id }} </td>
{{--                                    <td>{{ $product->category->name }} </td>--}}
                                    <td>
                                        {{ $product->brand_id }}
{{--                                        {{ $product->brand->name == Null ? 'No Brand':$product->brand->name }}--}}
                                    </td>
                                    <td>{{ $product->product_price }} </td>
                                    <td>{{ $product->product_cost }} </td>
                                    <td class="text-center">
                                        <button class="btn btn-brown btn-sm" onclick="productView(36)">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <div class="btn-group">
                                            <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-cogs"></i>
                                            </button>
                                            <div class="dropdown-menu" x-placement="bottom-start">

                                                <a class="dropdown-item" href="{{ route('admin.edit.product',$product->id) }}">
                                                    <i class="fa fa-edit"></i>
                                                    Edit
                                                </a>

                                                <a class="dropdown-item" href="{{ route('admin.edit.product',$product->id) }}">
                                                    <i class="fa fa-history"></i>
                                                    Sell History
                                                </a>

                                                <a class="dropdown-item delete" href="{{ route('admin.delete.product',$product->id) }}">
                                                    <i class="fa fa-trash"></i>
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                        <button class="btn btn-light btn-sm generated_barcode" data-value="1234567890   0987654321">
                                            <i class="fa fa-barcode"></i>
                                        </button>

                                        <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#qr_code_36"><i class="fa fa-qrcode"></i></button>
                                        <div class="modal fade" id="qr_code_36" role="modal" aria-modal="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="text-center p-4" id="qrcode">
                                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAnYAAAJ2AQMAAADoml26AAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAgxJREFUeJzt20uO6jAQBVBLvQCWxNay1CyDASLdUSei4g8JrfcGDudOwKni2MOSgTQ1M6aUyuXj5+XS/Mw9NUs8Ho/H4/F4vL96c0uWSwlUlll4PB6Px+PxevbCyNQA6tU141venOvP+6E4PY/H4/F4PN75vRgej8fj8Xg83r/12tWDXhYej8fj8Xi8j/OWR7f0ex923MtyzCtPz+PxeDwej9el10jwQrJhLMsBLxvQeDwej8fj8T7Oy7Ln7eYrtA/77Twej8fj8Xi9eUvnbbucM5be9Lw8u/7yWfV+zAtVHo/H4/F4vI/01mVobnntE4RUvs5M5W7xGY/H4/F4PF43Xmi5TrU86t7cPBTT1+b3YW2vsflQnJ7H4/F4PB6vSy+2tL1QrcxXS4r7q7AMJwheNh3GZh6Px+PxeLwuvWmboRiZ1vurSoa6Fz/xrhfD4/F4PB6Pd07vdbLd9v4/uLSFiWwFxpTys/B4PB6Px+N16U3NjP/BK4/7KJ/Wvr/k8Xg8Ho/HO4m3vL3VvbL5vr/lvheqPB6Px+PxeN164Q7qUXqV1KtvekPxh8bi9/I8Ho/H4/F4vFdeqgLrwMfj8Xg8Ho/3Ud6hHPTmA1231dC8CY/H4/F4PN65vKlI1jyF3YbgZWl4w7NjAb54PB6Px+PxTuA10vYuz2XtPuy1l42Dqb7k8Xg8Ho/H69X7Bnth6OHTiGN5AAAAAElFTkSuQmCC" alt="QR CODE" data-pagespeed-url-hash="888959361" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" onclick="print_qrcode()" class="btn btn-primary">
                                                            <i class="fa fa-print"></i>
                                                            Print
                                                        </button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>

                                @endforeach


                            </tbody>
                        </table>

                        {{ $products->links('backend.partials.paginate') }}

                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="product_details" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="product_title">Product Title</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="p-3">
                                    <img src="#" id="image" width="120" class="p_img" alt="" data-pagespeed-url-hash="2573097495" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div>
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>Code</td>
                                            <td id="code"></td>
                                        </tr>
                                        <tr>
                                            <td>Product Type</td>
                                            <td id="ptype"></td>
                                        </tr>
                                        <tr>
                                            <td>Category</td>
                                            <td id="category"></td>
                                        </tr>
                                        <tr>
                                            <td>Brand</td>
                                            <td id="brand"></td>
                                        </tr>
                                        <tr>
                                            <td>Price</td>
                                            <td id="price"></td>
                                        </tr>
                                        <tr>
                                            <td>Cost</td>
                                            <td id="cost"></td>
                                        </tr>
                                        <tr>
                                            <td>Tax</td>
                                            <td id="tax"></td>
                                        </tr>
                                        <tr>
                                            <td>Stock</td>
                                            <td id="stock"></td>
                                        </tr>
                                        <tr>
                                            <td>Details</td>
                                            <td id="details"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="bar_code_modal" role="modal" aria-modal="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body" id="barcode-page">

                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="print_barcode()" class="btn btn-primary">
                            <i class="fa fa-print"></i>
                            Print
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

@push('script')
    <script>


        // Product View Handle
        function productView(productId) {
            let url = "https://pos.softghor.com/back/back/product/id".replace('id', productId);
            $.get(url, (data) => {
                $("#product_title").text(data.name);
                $("#code").text(data.code);
                $("#ptype").text(data.type);
                $("#category").text(data.category_name);
                $("#brand").text(data.brand_name);
                $("#price").text(data.price);
                $("#cost").text(data.cost);
                $("#tax").text(data.tax);
                $("#stock").text(data.stock);
                $("#details").html(data.details);

                $("#image").attr('src', "https://pos.softghor.com/link".replace('link', data.image));
            });
            $("#product_details").modal('show');
        }

        // barcode Generated
        $(document).on('click', '.generated_barcode', function(){
            let code = $(this).attr('data-value');
            let url = "https://pos.softghor.com/back/product-barcode/value".replace('value', code);

            $.get(url, (data) => {
                let company = "Shamir Telecom";

                let barcode = '';
                barcode += `
          <div class="text-center p-4" id="barcode">
              <table class="table table-bordered">`;
                for ($i = 0; $i < 10; $i++) {
                    barcode += `<tr>`;
                    for($j = 0; $j < 3; $j++){
                        barcode += `
                     <td>
                    ${data}
                    <p style="margin-bottom:0px">${code}</p>
                    <strong>${company}</strong>
                    </td>
                     `;
                    }
                    barcode += `</tr>`;
                }
                barcode += `
                </table>
              </div>
              `;
                $("#barcode-page").html(barcode);
            });

            $("#bar_code_modal").modal('show');
        });



        //  Print Barcode
        function print_barcode(id) {
            $("#bar_code_modal").modal('hide');
            $(".modal-backdrop").remove();
            $(".modal").css('display', 'none');

            let mainDocBody = $('body').html();
            let printDoc = $("#barcode-page").html();
            $("body").html(printDoc);
            window.print();
            $("body").html(mainDocBody);
        }

        // Print QR Code
        function print_qrcode(doc) {

        }

    </script>
@endpush

