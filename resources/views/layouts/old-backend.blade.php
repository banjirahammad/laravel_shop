<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/styles.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/backend/js/all.min.js') }}"></script>
</head>
<body class="sb-nav-fixed">
@include('backend.partials.header')
<div id="layoutSidenav">
    @include('backend.partials.nav-side-bar')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4"> @yield('current-page')</h1>

                @yield('main')
            </div>
        </main>
        @include('backend.partials.footer')
    </div>
</div>
<script src="{{ asset('assets/backend/js/bootstrap.bundle.min.js') }} "></script>
<script src="{{ asset('assets/backend/js/scripts.js') }}"></script>
<script src="{{ asset('assets/backend/js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/backend/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('assets/backend/demo/chart-bar-demo.js') }}"></script>
<script src="{{ asset('assets/backend/js/simple-datatables@latest.js') }} "></script>
<script src="{{ asset('assets/backend/js/datatables-simple-demo.js') }}"></script>
</body>
</html>
