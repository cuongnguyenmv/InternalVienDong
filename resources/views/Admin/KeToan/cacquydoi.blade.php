@extends('admin_master')
@section('title')
 Quy đổi tiền thành hạt
@endsection
@section('body')
<div class="app-content container center-layout mt-2">
	<div class="row">
		<div class="col-12">
			<div class="card box-shadow-1">
			<table class="table table-striped col-12">
				<thead>
					<tr>
						<th>Mã quy đổi</th>
						<th>Nội dung</th>
						<th>Mức quy đổi (Cống hiến)</th>
						<th>Tỷ lệ thưởng thêm</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $key)
					<tr>
						<td>{{$key->maqd}}</td>
						<td>{{$key->noidung}}</td>
						<td>{{$key->mucconghien}}</td>
						<td>{{round($key->tylethem,2)}} %</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
		<div class="col-12">
			<div class="card box-shadow-1">
				<div class="card-header">
				 	<h2 class=" card-title">  NẠP HẠT  <i class="fa fa-joomla text-success"></i></h2>
				</div>
				<div class="card-body">
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection