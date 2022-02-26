<aside class="sidebar sidebar-expand-lg sidebar-dark">
    <header class="sidebar-header bg-dark">
        <a class="logo-icon" href="{{ route('admin.dashboard') }}"><img src="{{ asset('assets/backend/images/logo-light-lg.png') }}" alt="logo icon"></a>
        <span class="logo">
      <a href="{{ route('admin.dashboard') }}">
        <img src="{{ asset('assets/backend/images/Final-Logo03.png') }}" alt="logo">
      </a>
    </span>
        <span class="sidebar-toggle-fold"></span>
    </header>

    <nav class="sidebar-navigation">



        <ul class="menu">
            <li class="menu-item {{ request()->is('admin')?'active':'' }}">
                <a class="menu-link" href="{{ route('admin.dashboard') }}">
                    <span class="icon fa fa-home"></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li class="menu-category">Sale & Purchase</li>
            <li class="menu-item {{ request()->is('admin/orders')?'active':'' }}">
                <a class="menu-link" href="{{ route('admin.orders') }}">
                    <span class="icon fa fa-cart-plus"></span>
                    <span class="title"> Orders
                        <?php
                            $order_unseen = \App\Models\Order::where('seen','=','0')->count( );
                            if ($order_unseen!=0) echo $order_unseen;
                        ?>
                    </span>
                </a>
            </li>
{{--            <li class="menu-item ">--}}
{{--                <a class="menu-link" href="#">--}}
{{--                    <span class="icon fa fa-cart-plus"></span>--}}
{{--                    <span class="title"> POS</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="menu-item ">--}}
{{--                <a class="menu-link" href="back/pos">--}}
{{--                    <span class="icon fa fa-shopping-bag"></span>--}}
{{--                    <span class="title"> Sales</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="menu-item ">--}}
{{--                <a class="menu-link" href="back/return">--}}
{{--                    <span class="icon fa fa-backward"></span>--}}
{{--                    <span class="title"> Returns</span>--}}
{{--                </a>--}}
{{--            </li>--}}



{{--            <li class="menu-item ">--}}
{{--                <a class="menu-link" href="#">--}}
{{--                    <span class="icon fa fa-suitcase"></span>--}}
{{--                    <span class="title">Purchase</span>--}}
{{--                    <span class="arrow"></span>--}}
{{--                </a>--}}

{{--                <ul class="menu-submenu">--}}
{{--                    <li class="menu-item ">--}}
{{--                        <a class="menu-link" href="back/purchase/create">--}}
{{--                            <span class="dot"></span>--}}
{{--                            <span class="title">Add Purchase</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="menu-item">--}}
{{--                        <a class="menu-link" href="back/purchase">--}}
{{--                            <span class="dot"></span>--}}
{{--                            <span class="title">Manage Purchases</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}

{{--            </li>--}}

{{--            <li class="menu-item ">--}}
{{--                <a class="menu-link" href="back/stock">--}}
{{--                    <span class="icon fa fa-university"></span>--}}
{{--                    <span class="title"> Stock</span>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="menu-item ">--}}
{{--                <a class="menu-link" href="#">--}}
{{--                    <span class="icon fa fa-folder"></span>--}}
{{--                    <span class="title">Damages</span>--}}
{{--                    <span class="arrow"></span>--}}
{{--                </a>--}}

{{--                <ul class="menu-submenu">--}}
{{--                    <li class="menu-item ">--}}
{{--                        <a class="menu-link" href="back/damage/create">--}}
{{--                            <span class="dot"></span>--}}
{{--                            <span class="title">Add Damage</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="menu-item ">--}}
{{--                        <a class="menu-link" href="back/damage">--}}
{{--                            <span class="dot"></span>--}}
{{--                            <span class="title">Damages</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                </ul>--}}
{{--            </li>--}}

            <li class="menu-category">Product Information</li>
            <li class="menu-item {{ request()->is('admin/product')?'active':'' }} {{ request()->is('admin/product/add')?'active':'' }} ">
                <a class="menu-link" href="#">
                    <span class="icon fa fa-book"></span>
                    <span class="title">Products</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">

                    <li class="menu-item ">
                        <a class="menu-link" href="{{ route('admin.add.product') }}">
                            <span class="dot"></span>
                            <span class="title">Add Product</span>
                        </a>
                    </li>

                    <li class="menu-item ">
                        <a class="menu-link" href="{{ route('admin.product') }}">
                            <span class="dot"></span>
                            <span class="title">Manage Products</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="menu-item {{ request()->is('admin/category')?'active open':'' }} {{ request()->is('admin/category/add')?'active open':'' }}">
                <a class="menu-link" href="#">
                    <span class="icon fa fa-folder"></span>
                    <span class="title">Cateogries</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">
                    <li class="menu-item {{ request()->is('admin/category/add')?'active':'' }} ">
                        <a class="menu-link" href="{{ route('admin.add.category') }}">
                            <span class="dot"></span>
                            <span class="title">Add Cateogry</span>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/category')?'active':'' }}">
                        <a class="menu-link" href="{{ route('admin.category') }}">
                            <span class="dot"></span>
                            <span class="title">Manage Cateogries</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="menu-item {{ request()->is('admin/brand')?'active open':'' }} {{ request()->is('admin/brand/add')?'active open':'' }}">
                <a class="menu-link" href="#">
                    <span class="icon fa fa-folder"></span>
                    <span class="title">Brands</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">
                    <li class="menu-item {{ request()->is('admin/brand/add')?'active':'' }} ">
                        <a class="menu-link" href="{{ route('admin.add.brand') }}">
                            <span class="dot"></span>
                            <span class="title">Add Brand</span>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/brand')?'active':'' }}">
                        <a class="menu-link" href="{{ route('admin.brand') }}">
                            <span class="dot"></span>
                            <span class="title">Manage Brands</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="menu-category">Expenses & Payment</li>


            <li class="menu-item">
                <a class="menu-link" href="#">
                    <span class="icon fa fa-folder"></span>
                    <span class="title">Expenses</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">
                    <li class="menu-item ">
                        <a class="menu-link" href="back/expense/create">
                            <span class="dot"></span>
                            <span class="title">Add Expense</span>
                        </a>
                    </li>

                    <li class="menu-item ">
                        <a class="menu-link" href="back/expense">
                            <span class="dot"></span>
                            <span class="title">Manage Expenses</span>
                        </a>
                    </li>

                    <li class="menu-item ">
                        <a class="menu-link" href="back/expense-category">
                            <span class="dot"></span>
                            <span class="title">Expense Category</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="#">
                    <span class="icon fa fa-folder"></span>
                    <span class="title">Payments</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">
                    <li class="menu-item ">
                        <a class="menu-link" href="back/payment/create">
                            <span class="dot"></span>
                            <span class="title">Add Payment</span>
                        </a>
                    </li>

                    <li class="menu-item ">
                        <a class="menu-link" href="back/payment">
                            <span class="dot"></span>
                            <span class="title">Payments</span>
                        </a>
                    </li>

                </ul>
            </li>



            <li class="menu-category">Peoples</li>



            <li class="menu-item ">
                <a class="menu-link" href="#">
                    <span class="icon fa fa-folder"></span>
                    <span class="title">Customers</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">
                    <li class="menu-item ">
                        <a class="menu-link" href="back/customer/create">
                            <span class="dot"></span>
                            <span class="title">Add Customer</span>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a class="menu-link" href="back/customer">
                            <span class="dot"></span>
                            <span class="title">Manage Customers</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item ">
                <a class="menu-link" href="#">
                    <span class="icon fa fa-wheelchair-alt"></span>
                    <span class="title">Suppliers</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">
                    <li class="menu-item">
                        <a class="menu-link " href="back/supplier/create">
                            <span class="dot"></span>
                            <span class="title">Add Supplier</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="menu-link " href="back/supplier">
                            <span class="dot"></span>
                            <span class="title">Manage Suppliers</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="menu-category">Reports</li>
            <li class="menu-item ">
                <a class="menu-link" href="back/report/today_report">
                    <span class="icon fa fa-clock-o"></span>
                    <span class="title"> Today Report</span>
                </a>
            </li>
            <li class="menu-item ">
                <a class="menu-link" href="back/report/current_month_report">
                    <span class="icon fa fa-calendar"></span>
                    <span class="title"> Current Month Report</span>
                </a>
            </li>
            <li class="menu-item ">
                <a class="menu-link" href="back/report/summery-report">
                    <span class="icon fa fa-file-pdf-o"></span>
                    <span class="title"> Summary Report</span>
                </a>
            </li>

            <li class="menu-item ">
                <a class="menu-link" href="back/report/daily_report">
                    <span class="icon fa fa-file-pdf-o"></span>
                    <span class="title"> Daily Report</span>
                </a>
            </li>

            <li class="menu-item ">
                <a class="menu-link" href="back/report/customer_due">
                    <span class="icon fa fa-file-pdf-o"></span>
                    <span class="title">Due Customer Report</span>
                </a>
            </li>

            <li class="menu-item ">
                <a class="menu-link" href="back/report/low_stock">
                    <span class="icon fa fa-file-pdf-o"></span>
                    <span class="title">Low Stock Report</span>
                </a>
            </li>

            <li class="menu-item ">
                <a class="menu-link" href="back/report/most_purchase">
                    <span class="icon fa fa-file-pdf-o"></span>
                    <span class="title">Top Customer</span>
                </a>
            </li>

            <li class="menu-item ">
                <a class="menu-link" href="back/report/purchase_report">
                    <span class="icon fa fa-file-pdf-o"></span>
                    <span class="title">Purchase Report</span>
                </a>
            </li>







            <li class="menu-category">Setting & Customize</li>

            <li class="menu-item ">
                <a class="menu-link" href="back/pos-setting">
                    <span class="icon fa fa-wrench"></span>
                    <span class="title"> Settings</span>
                </a>
            </li>

            <li class="menu-item ">
                <a class="menu-link" href="backup">
                    <span class="icon fa fa-files-o"></span>
                    <span class="title"> Backup</span>
                </a>
            </li>
        </ul>
    </nav>

</aside>
