@extends('layouts.frontend')

@section('title')
    Apsara || Checkout
@endsection

@section('page_header')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <a href="{{ route('home') }}"><i class="icon-home"></i> Home</a>
                        <span class="crumbs-spacer"><i class="fa fa-angle-double-right"></i></span>
                        <span class="current">Checkout </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body')
    <div id="content">
        <div class="container">
            @if($carts == null)
                <div class="alert alert-info text-center">
                    <strong> Please add product to cart. </strong>
                </div>
            @else
            <div class="row">

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h2 class="title-checkout"><i class="icon-user"></i>Name &amp; Address</h2>
                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label> Name <sup>*</sup></label>
                            <input class="form-control" type="text" name="name" placeholder="Enter name" value="{{ auth()->user()->name }}">
                            @error('name')
                            <small class="text-danger mb-0" style="padding-left: 10px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Mobile Number <sup>*</sup> </label>
                            <input class="form-control" type="number" name="phone" placeholder="Enter mobile number" value="{{ auth()->user()->phone }}">
                            @error('phone')
                            <small class="text-danger mb-0" style="padding-left: 10px;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <input class="form-control" type="email" readonly value="{{ auth()->user()->email }}">
                            <input class="qty" name="qty" type="number" hidden value="">
                            <input class="price" name="price" type="number" hidden value="">
                        </div>
                        <div class="form-group">
                            <label>Area <sup>*</sup></label>
                            <select name="area" class="form-control " id="area">
                                <option value="80" >
                                    Inside Dhaka</option>
                                <option value="120">
                                    Out side Dhaka</option>
                            </select>
                            @error('area')
                            <small class="text-danger mb-0" style="padding-left: 10px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Address <sup>*</sup></label>
                            <textarea name="address" placeholder="Write address" class="form-control">{{ auth()->user()->address }}</textarea>
                            @error('address')
                            <small class="text-danger mb-0" style="padding-left: 10px;">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>Payment Method <sup>*</sup></label>
                            <select name="pay_method" class="form-control" id="payment_method">
                                <option value="">Select Method</option>
                                <option value="Bank" {{ old('pay_method')=='Bank'?'selected':'' }} data="Bank">Bank</option>
                                <option value="Rocket" {{ old('pay_method')=='Rocket'?'selected':'' }} data="Rocket">Rocket</option>
                                <option value="Bkash" {{ old('pay_method')=='Bkash'?'selected':'' }} data="Bkash">Bkash</option>
                                <option value="Cash On Delivery" {{ old('pay_method')=='Cash On Delivery'?'selected':'' }} data="Cash On Delivery">Cash On Delivery</option>
                            </select>
                            @error('pay_method')
                            <small class="text-danger mb-0" style="padding-left: 10px;">{{ $message }}</small>
                            @enderror


                        </div>
                        <div class="form-group" id="trxid_input" >
                            <label for="trx_id">TrxId</label>
                            <input type="text" name="trx_id" placeholder="Enter TrxId" value="{{ old('trx_id') }}" class="form-control">
                            @error('trx_id')
                            <small class="text-danger mb-0" style="padding-left: 10px;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="card card--padding fill-bg">

                            <button type="submit" class="btn btn-common btn-full">Place Order Now <span class="icon-action-redo"></span>
                            </button>
                        </div>

                    </form>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="order-details">
                        <h2 class="title-checkout"><i class="icon-basket-loaded-loaded"></i>Your Order</h2>
                        <div class="order_review margin-bottom-35">
                            <table class="table table-responsive table-review-order">
                                <thead>
                                <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $totalQty = 0;
                                    $totalPrice = 0;
                                @endphp
                                @foreach($carts as $cart)
                                    <tr>
                                        <td>
                                            <p>{{ $cart['name'] }}</p>
                                            <p>{{ $cart['qty'] }} X {{ $cart['price'] }}</p>
                                        </td>
                                        <td>
                                            <p class="price" id="total_price" >{{ $cart['qty'] * $cart['price'] }} Tk</p>
                                        </td>
                                    </tr>
                                    @php
                                        $totalQty += $cart['qty'];
                                        $totalPrice += $cart['price']*$cart['qty'];
                                    @endphp
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Subtotal</th>
                                    <td>
                                        <p class="price" > <span id="totalPrice">{{ $totalPrice }}</span> Tk</p>
                                    </td>
                                    <td class="hidden" id="qty">{{ $totalQty }}</td>
                                </tr>
                                <tr>
                                    <th>Delivery Charge</th>
                                    <td>
                                        <p class="price"><span id="d_charge">0.0</span> Tk</p>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                    <div class="card card--padding fill-bg">
                        <table class="table-total-checkout">
                            <tbody>
                            <tr>
                                <th>GRAND TOTAL:</th>
                                <td><span id="grand">{{ $totalPrice }}</span> Tk</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="mb-50"></div>
            @endif


        </div>
    </div>
@endsection


@push('script')
    <script>

        $(document).ready(function (){
            var qty = parseFloat($('#qty').html());
            $('.qty').val(qty);
            var number = parseFloat($('#totalPrice').html());
            $('.price').val(number);

            var dalivary_charge = $('#area option:selected').val();
            $('#d_charge').html(dalivary_charge);

            var grand = $('#totalPrice').html();

            $('#grand').html(parseFloat(grand) + parseFloat(dalivary_charge));

            $('#area').change(function (){
                var dalivary_charge = $('#area option:selected').val();
                $('#d_charge').html(dalivary_charge);

                $('#grand').html(parseFloat(grand) + parseFloat(dalivary_charge));

            });
        });

    </script>
@endpush


