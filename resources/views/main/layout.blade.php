<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Philosophy</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('main-temp/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('main-temp/css/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('main-temp/css/main.css')}}">

    <!-- script
    ================================================== -->
    <script src="{{asset('main-temp/js/modernizr.js')}}"></script>
    <script src="{{asset('main-temp/js/pace.min.js')}}"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">
    <!-- pageheader
    ================================================== -->
    <!-- s-content
    ================================================== -->
   @yield('content')
    <!-- s-extra
    ================================================== -->
   @include('partials._s-extra')
    <!-- s-footer
    ================================================== -->
  @include('partials._s-footer')
    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>


    <!-- Java Script
    ================================================== -->
    <script src="{{asset('main-temp/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('main-temp/js/plugins.js')}}"></script>
    <script src="{{asset('main-temp/js/main.js')}}"></script>

</body>

</html>