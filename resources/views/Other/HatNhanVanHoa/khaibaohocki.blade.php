@extends('admin_master')
@section('title')
Học Kì Hạt Nhân Văn Hóa 
@endsection
@section('body')
<div class="app-content container center-layout mt-2">
	<div class="row">
		<div class="col-12">
			<div class="card box-shadow-1">
				<div class="card-header">
					<h2 class="card-title">Học kì hạt nhân</h2>
				</div>
				<div class="card-body">
					<div class="card-content">
						<div class="row">
							<div class="col-12">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Mã HK</th>
											<th>Học Kì</th>
											<th>Thời Gian Bắt Đầu</th>
											<th>Thời Gian Kết Thúc</th>
										</tr>
									</thead>
									<tbody>@foreach($hocki as $key)
										<tr>
											<td>{{$key->mahk}}</td>
											<td>{{$key->ki}}</td>
											<td>{{Date('d-m-Y',strtotime($key->batdau))}}</td>
											<td>{{!empty($key->ketthuc) ? Date('d-m-Y',strtotime($key->ketthuc)) : "" }}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12"> 
			<div class="card box-shadow-1">
				<div class="card-header">
					<h2>Khai báo học kì</h2>
					@if(Session::has('status'))
					<div class="alert alert-success">{{Session::get('status')}}</div>
					@endif
					@if($errors->any())
					<div class="alert alert-danger">
						@foreach($errors as $err)
							<p>{{$err}}</p>
						@endforeach
					</div>
					@endif
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<form method="post" >
								@csrf
								<div class="form-group">
									<label>Mã học kì</label>
								<input type="text" name="mahk" class="form-control">
								</div>
								<div class="form-group">
									<label>Học kì</label>
									<input type="text" name="ki" class="form-control">
								</div>
								<div class="form-group">
									<label>Thời gian bắt đầu</label>
									<input type="date" name="batdau" class="form-control">
								</div>
								<div class="form-group">
									<label>Thời gian kết thúc</label>
									<input type="date" name="ketthuc" class="form-control">
								</div>
								<div class="form-group">
									<button class="btn btn-success float-right">Cập nhật</button>
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
