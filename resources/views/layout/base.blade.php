<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0" name="viewport">
    <meta name="twitter:widgets:theme" content="light">
    <meta property="og:title" content="Mesh Advertising and Design Studios" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://meshadstudios.com/frontend/images/logo.png" />
    <meta property="og:description" content="MADS is a design agency. We transform businesses at scale by creating systems of brand, product and service that deliver a distinctly better experience." />
    <title>Mesh Advertising and Design Studios</title>
    <!-- <link rel="shortcut icon" type="image/x-icon" href="images/theme-mountain-favicon.ico"> -->

    <!-- Font -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
    
    <!-- Css -->
    <link rel="stylesheet" href="/css/core.min.css" />
    <link rel="stylesheet" href="/css/skin.css" />

    <!--[if lt IE 9]>
        <script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body class="shop home-page">

        <!-- Overlay Navigation Menu -->
            @include('partials.overlaynav')
    <!-- Overlay Navigation Menu End -->

    <!-- Side Navigation Menu -->
            @include('partials.sidenav')
    <!-- Side Navigation Menu End -->

    <div class="wrapper">
        <div class="wrapper-inner">
    <!-- Side Navigation Menu -->
            @include('partials.header')
    <!-- Side Navigation Menu End -->
           <!-- Content -->
            <div class="content clearfix">

                @yield('content')


        <!-- end -->
            </div>
        <!-- Content End -->
 
        <!-- Footer -->
        @include('partials.footer')
    </div>
</div>
<!-- End Wrapper -->


    <!-- Js -->
    <script src="/frontend/js/jquery.min.js"></script>
  <!--   <script src="http://maps.googleapis.com/maps/api/js?v=3"></script> -->
    <script src="/frontend/js/timber.master.min.js"></script>
    @yield('javascript')

</body>
</html>