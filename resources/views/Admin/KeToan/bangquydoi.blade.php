@extends('admin_master')
@section('title')
	Kế toán - Quy Đổi Hạt 
@endsection
@section('body')
<div class="app-content container center-layout mt-2">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<div class="breadcrumb-wrapper col-12">
							<h2 class="">Bảng quy đổi</h2>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item active"><a href="/">Mức quy đổi hiện tại</a>
                      </li>
                      <li class="breadcrumb-item"><a href="#">Thêm mức quy đổi</a>
                      </li>
                    </ol>
                    @if(Session::has('status'))
                    <div class="alert alert-success">
                    	{{Session::get('status')}}
                    </div>
                    @endif
                    @if($errors->any())
                    <div class="alert alert-danger">
                    	@foreach($errors as $error)
                    	<ul>
                    		<li>{{$error}}</li>
                    	</ul>@endforeach
                    </div>
                    @endif
                  </div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12 div-show" id="bangquydoi">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Mã quy đổi</th>
										<th>Nội dung</th>
										<th>Mức quy đổi</th>
										<th>Số hạt</th>
										<th>Tỷ lệ thưởng thêm</th>
										<th class="text-center"><i class="fa fa-cog"></i></th>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $key)
									<tr>
										<td>{{$key->maqd}}</td>
										<td>{{$key->noidung}}</td>
										<td>{{$key->mucconghien}}</td>
										<td>{{$key->sohat}}</td>
										<td>{{$key->tylethem}} %</td>
										<td>
											<button class="btn btn-success"><i class="fa fa-pencil"></i></button>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="col-12 div-show" id="themquydoi" style="display: none">
							<form method="post">
								@csrf
								<div class="row">
									<h2 class="form-sections">Khai báo mức quy đổi</h2>
									<div class="col-12">
										<div class="form-group">
											<label class="text-bold-600">Mã quy đổi</label>
											<input type="text" name="maqd" class="form-control" required="">
										</div>
										<div class="form-group">
											<label class="text-bold-600">Nội dung quy đổi</label>
											<input type="text" name="noidung" class="form-control" required="">
										</div>
										<div class="form-group">
											<label class="text-bold-600">Mức cống hiến</label>
											<input type="number" name="mucconghien" class="form-control" required="">
										</div>
										<div class="form-group">
											<label class="text-bold-600">Số hạt</label>
											<input type="number" name="sohat" class="form-control" required="">
										</div>
										<div class="form-group">
											<label class="text-bold-600">Tỷ lệ % hưởng thêm</label>
											<input type="text" name="tylethem" class="form-control" required="">
										</div>
									</div>
									<h2 class="form-sections col-12"></h2>
									<div class="col-12">
										<button class="btn btn-success float-right">Nhập</button>
									</div>
									
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
@section('js')
<script type="text/javascript" src="{{URL::asset('js/other.js')}}"></script>
<script type="text/javascript">
	kt_switch()
</script>
@endsection