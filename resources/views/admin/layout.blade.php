<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Starter Page | Upzet - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/') }}assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ asset('/') }}assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('/') }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('/') }}assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        @include('admin.includes.header')

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.includes.sidebar')
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    @yield('content')
                    <!-- end page title -->


                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->



        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('/') }}assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('/') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('/') }}assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('/') }}assets/libs/node-waves/waves.min.js"></script>

    <script src="{{ asset('/') }}assets/js/app.js"></script>

    @stack('js')
</body>

</html>
