@extends('notitle_master')
@section('css')

@endsection
@section('body')
<div class="app-content center-layout container-fluid" >
	<div class="card row">
		<div class="card-header">
			<h1 class="text-center">GIẢI CHẠY NỘI BỘ VIỄN ĐÔNG</h1>
			<p class="text-center">
				<a href="./bat-dau" target="_blank"><button class="btn btn-success">BẮT ĐẦU</button></a>
			</p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-4">
					<div class="row">
						<h4 class="col-4">Check in here   </h4>
						<input type="text" name="checkin" class="col-8" id="checkin">
					</div>
					
				</div>
			</div>
			<div class="row mt-2" id="showcheckin">
				<div class="col-12">
					<div class="card ">
						<div class="card-header">
							<p class="card-title">Danh sách check in tham gia</p>
						</div>
						<div class="card-body">
							<table class="table table-tripped" id="tblcheckin">
								<?php $stt = 1; ?>
								<thead>
									<tr>
										<th>STT</th>
										<th>Mã</th>
										<th>Họ tên</th>
										<th>Mục tiêu (Số vòng)</th>
										<th>Thời gian check in</th>
									</tr>
								</thead>
								<tbody>

									@foreach($checked as $key)
									<tr>
										<td>{{$stt++}}</td>
										<td>{{$key->madk}}</td>
										<td>{{$key->hoten}}</td>
										<td>{{$key->sovong}}</td>
										<td>{{Date('H:i:s d-m-Y',strtotime($key->checkin))}}</td>
									</tr>@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{URL::asset('js/giaichaybo.js')}}"></script>

@endsection