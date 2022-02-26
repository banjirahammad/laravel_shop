<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Admin Panel</div>
                <a class="nav-link" href="{{ route('admin.dashbord') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="{{ route('admin.category') }}"">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Category
                </a>
                <a class="nav-link" href="{{ route('admin.brand') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Brand
                </a>
                <a class="nav-link" href="{{ route('admin.product') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Product
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Banjir Ahammad
        </div>
    </nav>
</div>
