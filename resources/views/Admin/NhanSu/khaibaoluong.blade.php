@extends('admin_master')
@section('body')
<div class="app-content container center-layout mt-2">
	<div class="row">
		<div class="col-12 mb-1">
				 <div class="row breadcrumbs-top">
	            <div class="breadcrumb-wrapper col-12">
	              <ol class="breadcrumb">
	                <li class="breadcrumb-item active"><a href="#">Các điều khoản</a>
	                </li>
	                <li class="breadcrumb-item"><a href="#">Khai báo</a>
	                </li>
	              </ol>
	            </div>
	          </div>
		</div>
	<div class="card col-12 col-md-12" id="dieukhoan">
		<div class="card-header">
			<h2 class="card-title">Điều khoản lương</h2>
		</div>
		<div class="card-body col-12">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Mã điều khoản</th>
								<th>Tên </th>
								<th>Nhóm</th>
								<th>Giá trị</th>
							</tr>
						</thead>
						<tbody>
							@foreach($dieukhoan as $key)
							<tr>
								<td>{{ $key->madieukhoan}}</td>
								<td>{{ $key->dieukhoan}} </td>
								<td>{{ $key->loai}}</td>
								<td>{{ number_format($key->tien)}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
			
		</div>
	</div>
		<div class="card col-12" id="form-dk" style="display: none">
			<div class="card-header">
				<h2 class="card-title">Khai báo điều khoản lương</h2>
			</div>
			<div class="card-body">
				@if(Session::has('status'))
				<div class="alert alert-success">{{Session::get('status')}}</div>
				@endif
				@if($errors->any())
				<div class="alert alert-success">
					<ul>
						@foreach($errors as $key)
						<li>{{$key}}</li>
						@endforeach
					</ul>
					
				</div>
				@endif
				<form method="post" >
					@csrf
					<div class="form-group">
						<label class="text-bold-600">Điều khoản</label>
						<input type="text" name="dieukhoan" class="form-control" required="" placeholder="Ví dụ: Kinh nghiệm làm việc được kiểm chứng 
(ấn tượng ban đầu), Điểm cống hiến,Hạt Nhân Văn Hoá 2019
 Học kỳ 1, ...">
					</div>
					<div class="form-group">
						<label class="text-bold-600">Giá trị điều khoản</label>
						<input type="number" name="tien" class="form-control" required="" value="0">
					</div>
					<div class="form-group">
						<label class="text-bold-600">Nhóm điều khoản</label>
						<select class="form-control" name="loai" required="">
							<option value="">Chọn</option>
							<!-- <option value="A">A</option> -->
							<option value="B">B</option>
							<option value="C">C</option>
							<option value="D">D</option>
							<option value="E">E</option>
							<option value="F">F</option>
							<option value="G">G</option>
						</select>
					</div>
					<hr>
					<div class="row">
						<button class="btn btn-primary float-right">Nhập</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{URL::asset('js/other.js')}}"></script>
<script type="text/javascript">
	$('table').DataTable()
	swichpage()
</script>
@endsection