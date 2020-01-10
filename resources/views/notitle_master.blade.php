<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
  <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>Viễn Đông - @yield('title')</title>
   <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- <link rel="apple-touch-icon" href="{{URL::asset('template/app-assets/images/ico/apple-icon-120.png')}}"> -->
  <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('images/vd.png')}}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,400,500,700"
  rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/app-assets/css/vendors.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN ROBUST CSS-->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/app-assets/css/app.css')}}">
  <!-- END ROBUST CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/app-assets/css/core/menu/menu-types/horizontal-menu.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/app-assets/css/core/colors/palette-gradient.css')}}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/assets/css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('css/other.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/app-assets/css/plugins/charts/c3-chart.css')}}">
  @yield('css')
  <!-- END Custom CSS-->
</head>
<body class="horizontal-layout horizontal-menu horizontal-menu-padding 2-columns   menu-expanded"
data-open="hover" data-menu="horizontal-menu" data-col="2-columns">
@yield('body')
</body>
<footer class="footer footer-static footer-light navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2 container center-layout">
      <span class="float-md-left d-block d-md-inline-block">Made by Super Developers Team Viễn Đông<a class="text-bold-800 grey darken-2" target="_blank"> </a> </span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Made with <i class="ft-heart pink"></i></span>
    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="{{URL::asset('template/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script type="text/javascript" src="{{URL::asset('template/app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>

  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{URL::asset('template/app-assets/vendors/js/charts/d3.min.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('template/app-assets/vendors/js/charts/c3.min.js')}}" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN ROBUST JS-->
  <script src="{{URL::asset('template/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('template/app-assets/js/core/app.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('template/app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
  <!-- END ROBUST JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{URL::asset('template/app-assets/js/scripts/extensions/block-ui.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('template/app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
  @yield('js')
</body>
</html>