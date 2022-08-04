<!DOCTYPE html>
<html>
<head>
    @include('admin.include._head')
</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">
        @include('admin.include._topNav')
    </div>
    <!-- Top Bar End -->

    <!-- ========== Left Sidebar Start ========== -->

    <div class="left side-menu">
        @include('admin.include._leftNav')
    </div>
    <!-- Left Sidebar End -->

    <!-- Start right Content here -->

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                @yield('content')
            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer">
            @include('admin.include._footer')
        </footer>

    </div>
    <!-- End Right content here -->

</div>
<!-- END wrapper -->

@include('admin.include._script')

</body>
</html>
