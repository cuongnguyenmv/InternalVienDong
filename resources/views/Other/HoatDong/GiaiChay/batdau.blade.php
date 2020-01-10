@extends('notitle_master')
@section('body')
<div class="app-content container-fluid center-layout" 
style=" background-image: url('https://genvita.vn/-/media/genvita/articles/desktops/che-do-dinh-duong-cho-nguoi-chay-bo-feature.ashx?w=1920&h=1080&useCustomFunctions=1&centerCrop=1&hash=0BCDB52BA757FB379708B7D2AEF993F05BF5451E');

  /* Full height */
  height: 94.5%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

  "

>
	<div class="row">
		<div class="col-12 card"><h2 class="text-center mt-1">GIẢI CHẠY NỘI BỘ VIỄN ĐÔNG</h2></div>
	</div>
	<div class="row col-3">
		
		<input type="text" placeholder="check in here" id="calcround">
	</div>
	<div class="row mt-2" id="showghinhan">
		<div class="col-4">
			<div class="card box-shadow-3">
				<div class="card-header">
				<h1 class="text-center text-bold-600">16 Vòng</h1>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>STT</th>
										<th>Người chạy</th>
										<th>Số vòng</th>
									</tr>
								</thead>
								<tbody>
									<?php $stt16 = 1; $stt24 = 1; $stt32=1; ?>
									@foreach($solieu->where('sovong',16) as $key)
									<tr>
										<td>{{$stt16++}}</td>
										<td>{{$key->hoten}}</td>
										<td>{{$key->runned}}</td>
									</tr>@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- 24 vòng -->
		<div class="col-4">
			<div class="card box-shadow-3">
				<div class="card-header">
				<h1 class="text-center text-bold-600">24 Vòng</h1>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>STT</th>
										<th>Người chạy</th>
										<th>Số vòng</th>
									</tr>
								</thead>
								<tbody>
									<?php $stt16 = 1; $stt24 = 1; $stt32=1; ?>
									@foreach($solieu->where('sovong',24) as $key)
									<tr>
										<td>{{$stt24++}}</td>
										<td>{{$key->hoten}}</td>
										<td>{{$key->runned}}</td>
									</tr>@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- 32 vòng -->
		<div class="col-4">
			<div class="card box-shadow-3">
				<div class="card-header">
				<h1 class="text-center text-bold-600">32 Vòng</h1>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>STT</th>
										<th>Người chạy</th>
										<th>Số vòng</th>
									</tr>
								</thead>
								<tbody>
									<?php $stt16 = 1; $stt24 = 1; $stt32=1; ?>
									@foreach($solieu->where('sovong',32) as $key)
									<tr>
										<td>{{$stt32++}}</td>
										<td>{{$key->hoten}}</td>
										<td>{{$key->runned}}</td>
									</tr>@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end -->
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{URL::asset('js/giaichaybo.js')}}"></script>
@endsection