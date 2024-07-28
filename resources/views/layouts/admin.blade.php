<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/styles.min.css') }}">

    @stack('styles')
</head>

<body>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    @include('components.admin.sidebar')
    <!--  Sidebar End -->

    <!--  Main wrapper -->
    <div class="body-wrapper">

        <!--  Header Start -->
        @include('components.admin.header')
        <!--  Header End -->

        <!-- Main start -->
        @yield('main')
        <!-- Main end -->
    </div>

    @yield('js')

</div>
<script src="{{asset('assets/admin/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset("assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset('assets/admin/js/sidebarmenu.js')}}"></script>
<script src="{{asset('assets/admin/js/app.min.js')}}"></script>
<script src="{{asset('assets/admin/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/admin/libs/simplebar/dist/simplebar.js')}}"></script>
<script src="{{asset('assets/admin/js/dashboard.js')}}"></script>
</body>

</html>
