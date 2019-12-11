<!DOCTYPE html>
<html>
<head>
	<title>Events are coming</title>
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
<body style="background-image: url('https://images.unsplash.com/photo-1545608444-f045a6db6133?ixlib=rb-1.2.1&w=1000&q=80');
 height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
" 
>
	<div class="app-content container-fluid  " 
  >
		<div class="row  pt-1">
      <div class="col-3 rounded " style=" background-image: linear-gradient(#c973ff,#AEBAF8);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); min-height: 700px;
      ">
        <div class="row">
          <div class="col-12">
            <h2 class="text-center">Events are Coming</h2>
          </div>
        </div>
          <canvas id="canvas" width="200" height="200"  class="col-12"></canvas>
          <div class="col-12">
            <h2 class="text-center">20/11/2019</h2>
          </div>
      </div>
      <!-- Detail event -->
      <div class="col-9">
        <div class="row">
          <div class="card rounded" style="margin-left: 1%; 
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); width: 95%;
      ">    
            <div class="card-content">
             <div class="row">
               <div class="col-2 border-right">
                  <h1 class="text-center align-text-middle mt-2">11:30</h1>
               </div>
               <div class="col-10">
                 <h1 class="text-left mb-1 ">Nghỉ trưa</h1>
                 
                   <ul>
                     <h1 class="float-right mr-1"><i class="fa fa-home"></i> Vị trí: Căn teen</h1>
                    
                   </ul>
               
               </div>
             </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="card rounded" style="margin-left: 1%; 
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); width: 95%;
      ">    
            <div class="card-content">
             <div class="row">
               <div class="col-2 border-right">
                  <h1 class="text-center align-text-middle mt-2">13:00</h1>
               </div>
               <div class="col-10">
                 <h1 class="text-left mb-1 ">Lại làm </h1>
                 
                   <ul>
                     <h1 class="float-right mr-1"><i class="fa fa-home"></i>  Vị trí: Văn phòng sáng tạo</h1>
                    
                   </ul>
               
               </div>
             </div>
            </div>
          </div>
        </div>
         <div class="row">
          <div class="card rounded" style="margin-left: 1%; 
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); width: 95%;
      ">    
            <div class="card-content">
             <div class="row">
               <div class="col-2 border-right">
                  <h1 class="text-center align-text-middle mt-2">17:30</h1>
               </div>
               <div class="col-10">
                 <h1 class="text-left mb-1 ">Đi về</h1>
                 
                   <ul>
                     <h1 class="float-right mr-1"><i class="fa fa-home"></i> Vị trí: GO HOME</h1>
                    
                   </ul>
               
               </div>
             </div>
            </div>
          </div>
        </div>
      </div>  
    </div>
	</div>
  <script>
  var canvas = document.getElementById("canvas");
  var ctx = canvas.getContext("2d");
  var radius = canvas.height / 2;
  ctx.translate(radius, radius);
  radius = radius * 0.90
  setInterval(drawClock, 1000);
  
  function drawClock() {
    drawFace(ctx, radius);
     drawNumbers(ctx, radius);
     drawTime(ctx, radius);
}
 
function drawFace(ctx, radius) {
    var grad;
    ctx.beginPath();
    ctx.arc(0, 0, radius, 0, 2*Math.PI);
    ctx.fillStyle = 'white';
    ctx.fill();
    grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
    grad.addColorStop(0, '#0f52a0');
    grad.addColorStop(0.5, 'white');
    grad.addColorStop(1, '#0f52a0');
    ctx.strokeStyle = grad;
    ctx.lineWidth = radius*0.1;
    ctx.stroke();
    ctx.beginPath();
    ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
    ctx.fillStyle = '#0f52a0';
    ctx.fill();
}
function drawNumbers(ctx, radius) {
    var ang;
    var num;
    ctx.font = radius*0.15 + "px arial";
    ctx.textBaseline="middle";
    ctx.textAlign="center";
 
    for(num= 1; num < 13; num++){
        ang = num * Math.PI / 6;
        ctx.rotate(ang);
        ctx.translate(0, -radius*0.85);
        ctx.rotate(-ang);
        ctx.fillText(num.toString(), 0, 0);
        ctx.rotate(ang);
        ctx.translate(0, radius*0.85);
        ctx.rotate(-ang);
    }
}
function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    // Giờ
    hour=hour%12;
    hour=(hour*Math.PI/6)+(minute*Math.PI/(6*60))+(second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    // Phút
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // Giây
    second=(second*Math.PI/30);
    ctx.strokeStyle = '#f37126';
    drawHand(ctx, second, radius*0.9, radius*0.02);
}
  
function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}

  </script>
</body>
</html>