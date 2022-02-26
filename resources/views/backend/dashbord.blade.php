@extends('layouts.backend')

@section('title')
    Dashbord || Apsora
@endsection

@section('main')

    <div class="row">



        <div class="col-md-3 col-6">
            <div class="card card-body bg-dark">
                <h6 class="text-white text-uppercase">Today Sold</h6>
                <p class="fs-18 fw-700">৳ 0</p>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="card card-body card-pink">
                <h6 class="text-white text-uppercase">
                    Today Sold - Purchase Cost
                </h6>
                <p class="fs-18 fw-700 text-white">৳
                    0</p>
            </div>
        </div>

        <div class="col-md-2 col-6">
            <div class="card card-body card-danger">
                <h6 class="text-white text-uppercase">
                    <span>Today Expense</span>
                </h6>
                <p class="fs-18 fw-700 text-white">৳ 0</p>
            </div>
        </div>

        <div class="col-md-2 col-6">
            <div class="card card-body card-info">
                <h6 class="text-white text-uppercase">
                    Today Sell Profit
                </h6>
                <p class="fs-18 fw-700 text-white">

                    0
            </div>
        </div>

        <div class="col-md-2 col-6">
            <div class="card card-body bg-dark">
                <h6 class="text-white text-uppercase">
                    Today Cash
                </h6>
                <p class="fs-18 fw-700 text-white">
                    ৳ 0
            </div>
        </div>




        <div class="col-md-2 col-6">
            <div class="card card-body bg-primary">
                <h6 class="text-white text-uppercase">Sold in Jan 2022</h6>
                <p class="fs-18 fw-700">৳ 359,691</p>
            </div>
        </div>

        <div class="col-md-2 col-6">
            <div class="card card-body card-brown">
                <h6 class="text-white text-uppercase">
                    Purchased - in Jan 2022
                </h6>
                <p class="fs-18 fw-700 text-white">৳
                    13,295,261</p>
            </div>
        </div>

        <div class="col-md-2 col-6">
            <div class="card card-body card-danger">
                <h6 class="text-white text-uppercase">
                    <span>Expense in Jan 2022</span>
                </h6>
                <p class="fs-18 fw-700 text-white">৳ 435</p>
            </div>
        </div>



        <div class="col-md-2 col-6">
            <div class="card card-body card-cyan">
                <h6 class="text-white text-uppercase">
                    <span>Returned in Jan 2022</span>
                </h6>
                <p class="fs-18 fw-700 text-white">৳ 0</p>
            </div>
        </div>

        <div class="col-md-2 col-6">
            <div class="card card-body card-purple">
                <h6 class="text-white text-uppercase">
                    Net Profit Jan 2022

                </h6>
                <p class="fs-18 fw-700 text-white">

                    -12,936,005
            </div>
        </div>

        <div class="col-md-2 col-6">
            <div class="card card-body card-dark">
                <h6 class="text-white text-uppercase">
                    Cash in Jan 2022
                </h6>
                <p class="fs-18 fw-700 text-white">

                    214,424
            </div>
        </div>






        <div class="col-md-2 col-6">
            <div class="card card-body bg-dark">
                <h6 class="text-white text-uppercase">Total Sold</h6>
                <p class="fs-18 fw-700">৳ 361,941</p>
            </div>
        </div>

        <div class="col-md-2 col-6">
            <div class="card card-body card-success">
                <h6 class="text-white text-uppercase">
                    Total Purchase Cost
                </h6>
                <p class="fs-18 fw-700 text-white">৳
                    13,795,261</p>
            </div>
        </div>

        <div class="col-md-2 col-6">
            <div class="card card-body card-danger">
                <h6 class="text-white text-uppercase">
                    <span>Total Expense</span>
                </h6>
                <p class="fs-18 fw-700 text-white">৳ 435</p>
            </div>
        </div>



        <div class="col-md-2 col-6">
            <div class="card card-body card-cyan">
                <h6 class="text-white text-uppercase">
                    <span>Total Returned</span>
                </h6>
                <p class="fs-18 fw-700 text-white">৳ 99</p>
            </div>
        </div>

        <div class="col-md-2 col-6">
            <div class="card card-body card-brown">
                <h6 class="text-white text-uppercase">
                    Total Profit
                </h6>
                <p class="fs-18 fw-700 text-white">

                    -13,433,854
            </div>
        </div>

        <div class="col-md-2 col-6">
            <div class="card card-body card-dark">
                <h6 class="text-white text-uppercase">
                    Total Cash
                </h6>
                <p class="fs-18 fw-700 text-white">

                    216,374
            </div>
        </div>






        <div class="col-6">
            <div class="card card-body bg-purple">
                <h6>
                    <span class="text-uppercase text-white">Total Receivable</span>
                </h6>
                <p class="fs-28 fw-700">৳ 185,532</p>
            </div>
        </div>


        <div class="col-6">
            <div class="card card-body bg-yellow">
                <h6>
                    <span class="text-uppercase text-white">Total Payable</span>
                </h6>
                <p class="fs-28 fw-700">৳ 176,824</p>
            </div>
        </div>




        <div class="col-6">
            <div class="card card-body bg-brown">
                <h6>
                    <span class="text-uppercase text-white">Stock - Purchase Value</span>
                </h6>
                <p class="fs-28 fw-700">৳ 12,565,531</p>
            </div>
        </div>


        <div class="col-6">
            <div class="card card-body bg-info">
                <h6>
                    <span class="text-uppercase text-white">Stock - Sell Value</span>
                </h6>
                <p class="fs-28 fw-700">৳ 7,438,915</p>
            </div>
        </div>



        <div class="col-md-3 col-6">
            <div class="card card-body bg-dark">
                <h6 class="text-white text-uppercase">Total Customer</h6>
                <p class="fs-18 fw-700"> 11</p>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="card card-body card-brown">
                <h6 class="text-white text-uppercase">
                    Total Supplier
                </h6>
                <p class="fs-18 fw-700 text-white">
                    4</p>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="card card-body card-danger">
                <h6 class="text-white text-uppercase">
                    <span>Total Invoice</span>
                </h6>
                <p class="fs-18 fw-700 text-white"> 46</p>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="card card-body card-purple">
                <h6 class="text-white text-uppercase">
                    Total Product
                </h6>
                <p class="fs-18 fw-700 text-white">

                    18
            </div>
        </div>



    </div>

@endsection
