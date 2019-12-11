<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
	<title>Bỏ phiếu bình chọn</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('images/vd.png')}}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,400,500,700"
  rel="stylesheet">
	<!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/app-assets/css/vendors.css')}}">
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
  <!-- END Custom CSS-->
</head>
<style type="text/css">
  .banner{
    color: #ffff; font-size:300%;font-weight: bold;
  }
</style>
<body style="background-color: #0256c1;" class="d-flex justify-content-center">
	<div class="app-content container-fluid center-layout pt-5 align-self-center">
   <div class="row">
    <div class="col-3"></div>
     <div class="col-6" style="border: 3px white solid;">
       <p class="text-center banner" >CHỦ ĐỀ BÌNH CHỌN </p>
     </div>
     <div class="col-xs-12 col-md-3"></div>
   </div>
   <div class="row pt-5">
    <div class="col-xs-12 col-md-3"></div>
     <div class="col-12 col-md-3">
       <img src="{{URL::asset('images/like.png')}}" width="100%" class="btn" data-action='1'>
     </div>
     <div class="col-xs-12 col-md-3 ">
       <img src="{{URL::asset('images/dislike.png')}}" width="100%" class="btn" data-action='2'>
     </div>
     <div class="col-xs-12 col-md-3"></div>
   </div> 
   <div class="row">
    <div class="col-md-4"></div>
    <div class="col-xs-12 col-md-4 col-sm-12">
       <img src="{{URL::asset('images/vd.png')}}"  width="100%">
    </div>
    <div class="col-md-4"></div>
   </div>
  </div>
</body>
<form id="like" method="post" hidden="">
  @csrf
  <input type="text" name="action" value="1">
  <input type="text" name="room" value="{{$id}}">
</form>
<form id="dislike" method="post" hidden="">
  @csrf
  <input type="text" name="action" value="0">
  <input type="text" name="room" value="{{$id}}">
</form>
 <script src="{{URL::asset('template/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script type="text/javascript" src="{{URL::asset('template/app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
  <!-- END PAGE VENDOR JS-->
<script type="text/javascript" src="{{URL::asset('js/other.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.dev.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
<script type="text/javascript">
 
  btnSubmit()
</script>
<script type="text/javascript">
  var socket = io('http://localhost:6001')
  socket.on('channel-election',function(data){
    console.log('ok')
  })
</script>

</html>