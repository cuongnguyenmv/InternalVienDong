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
<body >
	<div class="app-content container center-lay card mt-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:5%; ">
		<div class="row pt-2">
    <div class="col-4  pt-2">
      <div class="row">
       <div class="col-12 d-flex justify-content-center" >
          <img src="{{URL::asset('images/ct.png')}}" width="100%">
        </div>
        <div class="col-12 d-flex justify-content-center">
          <div class="col-12 d-flex justify-content-center" >
          <img src="{{URL::asset('images/tt.png')}}" width="100%">
        </div>
        </div>
      </div>
    </div>
    <div class="col-4 ">
      <div class="col-12 border d-flex justify-content-center" style="width: 100%; margin-bottom: 20%;">
       <h1 class="text-center" style="font-size: 500%; ">{{$chude->tensk}}</h1>
      </div>

      <div class="col-12 card border d-flex justify-content-center" style="border-radius: 50%; height: 50%;width: 100%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">
       <h1 class="text-center" style="font-size: 60px;">100%</h1>
      </div>

       <div class="col-12 border  d-flex justify-content-center" style=" width: 100%; margin-top: 20%; ">
       <h1 class="text-center" style="font-size: 500%; ">/{{$chude->tongdiem}}</h1>
      </div>
    </div>
    <div class="col-4 pt-2">
      <div class="row">
       <div class="col-12 d-flex justify-content-center" >
          <img src="{{URL::asset('images/kt.png')}}" width="100%">
        </div>
        <div class="col-12 d-flex justify-content-center" >
          <img src="{{URL::asset('images/ch.png')}}" width="100%">
        </div>
      </div>
    </div> 
    </div>
	</div>
  
</body>
<script src="{{URL::asset('template/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script type="text/javascript" src="{{URL::asset('template/app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
  <!-- END PAGE VENDOR JS-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.dev.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
  <script type="text/javascript">
  var socket = io('http://localhost:6001')
  socket.on('channel-election',function(data){
    console.log('ok')
  })
</script>
</html>