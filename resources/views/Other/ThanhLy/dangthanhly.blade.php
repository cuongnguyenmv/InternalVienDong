@extends('admin_master')
@section('body')
<div class="app-content container center-layout mt-2">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h2 class="card-title ">Đăng sản phẩm thanh lý</h2>
				</div>
				<div class="card-body">
					<div class="card-body">
						<form method="post" enctype="multipart/form-data">
							@csrf
							@if(Session::has('status'))
							<div class="alert alert-success">
								{{Session::get('status')}}
							</div>
							@endif
							@if($errors->any())
							<div class="alert alert-danger">
								<ul>@foreach($errors as $error)
									<li>{{$error}}</li>
								</ul>@endforeach
							</div>
							@endif
							<div class="row">
								<h2 class="form-section col-12"><i class="fa fa-user"></i> Thông tin người đăng</h2>
								<div class="col-6">
									<div class="form-group">
										<label class="text-bold-600">Mã nhân viên</label>
										<input type="text" name="nguongoc" value="{{$info->manv}}" class="form-control" readonly="">
									</div>
										<div class="form-group">
										<label class="text-bold-600">Họ và tên</label>
										<input type="text" value="{{$info->name}}" class="form-control" readonly="">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label class="text-bold-600">Số điện thoại</label>
										<input type="text" value="{{$info->sdt}}" class="form-control" readonly="">
									</div>
										<div class="form-group">
										<label class="text-bold-600">Email</label>
										<input type="text" value="{{$info->email}}" class="form-control" readonly="">
									</div>

								</div>
							</div>
							<div class="row">
								<h2 class="form-section col-12"><i class="fa fa-wpforms"></i> Thông tin sản phẩm</h2>
								<div class="col-6">
									<div class="form-group">
										<label class="text-bold-600">Mã sản phẩm</label>
										<input type="text" name="matl" class="form-control"  value="{{$matl}}" readonly="">
									</div>
									<div class="form-group">
										<label class="text-bold-600">Tên sản phẩm</label>
										<input type="text" name="tents" class="form-control">
									</div>
									<div class="form-group">
										 <textarea name="mota" id="ckeditor" cols="30" rows="15" class="ckeditor form-control">
								
									</textarea>
											</div>
									
								</div>
								<div class="col-6">
									<div class="form-group">
										<label class="text-bold-600">Seri sản phẩm(nếu có)</label>
										<input type="ser" name="seri" class="form-control">
									</div>
									<div class="form-group">
										<label class="text-bold-600">Tự định giá</label>
										<input type="number" name="dinhgia" class="form-control">
									</div>
									<div class="form-group row">
										<div class="col-3">
										<label class="text-bold-600">Hình1 </label>
										<input type="file" name="hinh1" class="form-control">
										</div>
										<div class="col-3">
										<label class="text-bold-600">Hình2 </label>
										<input type="file" name="hinh2" class="form-control">
										</div>
										<div class="col-3">
										<label class="text-bold-600">Hình3 </label>
										<input type="file" name="hinh3" class="form-control">
										</div>
										<div class="col-3">
										<label class="text-bold-600">Hình4 </label>
										<input type="file" name="hinh4" class="form-control">
										</div>
									</div>
								</div>
								
							</div>
							<div class="form-actions">
								<button class="btn btn-primary float-right">Đăng ký</button>
							</div>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')

  <script src="{{URL::asset('template/app-assets/vendors/js/editors/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
@endsection