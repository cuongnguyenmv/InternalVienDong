@extends('admin_master')
@section('body')
<div class="app-content container center-layout mt-2">
	<div class="row">
		<div class="card col-12">
			<div class="card-header">
				<h2 class="card-title">Cập nhật thông tin nhân sự</h2>
			</div>
			<div class="card-body">
				<form method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-4">
							<!-- <img src="{{URL::asset('images/NhanVien/130218186M.jpg')}}" width="100%"> -->
							<a href="#" > <img src="{{URL::asset('template/app-assets/images/avatar.jpg')}}" width="100%" id="showpreview2"> </a>
							<input type="file" name="hinh" class="form-control" id="previewimg2">
						</div>
						<div class="col-8">
							<h5 class="form-section"><i class="fa fa-users"></i>Thông tin cơ bản</h5>
							<div class="row">

								<div class="col-6">
									<div class="form-group">
										<label class="text-bold-600">Mã nhân viên</label>
										<input type="text" name="manv" class="form-control input-text-dotted" required="">
									</div>
									<div class="form-group">
										<label class="text-bold-600">Họ và tên</label>
										<input type="text" name="tennv" class="form-control input-text-dotted" required="">
									</div>
									<div class="form-group">
										<label class="text-bold-600">Ngày tháng năm sinh</label>
										<input type="date" name="ngaysinh" class="form-control input-text-dotted">
									</div>
									<div class="form-group">
										<label class="text-bold-600">Ngày thử việc</label>
										<input type="date" name="ngaythuviec" class="form-control input-text-dotted">
									</div>
									<div class="form-group">
										<label class="text-bold-600">Địa chỉ hiện tại</label>
										<input type="text" name="diachi" class="form-control input-text-dotted">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label class="text-bold-600">ID Card</label>
										<input type="text" name="idcard" class="form-control input-text-dotted">
									</div>
									<div class="form-group">
										<label class="text-bold-600">Số điện thoại</label>
										<input type="text" name="sdt" class="form-control input-text-dotted">
									</div>
									<div class="form-group">
										<label class="text-bold-600">Ngày vào làm</label>
										<input type="date" name="ngayvaolam" class="form-control input-text-dotted">
									</div>
									<div class="form-group">
										<label class="text-bold-600">Ngày nghỉ việc</label>
										<input type="date" name="ngayketthuc" class="form-control input-text-dotted">
									</div>
									<div class="form-group">
										<label class="text-bold-600">Email</label>
										<input type="text" name="email" class="form-control input-text-dotted">
									</div>
									
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-2">
						<h5 class="form-section col-12"><i class="fa fa-building-o"></i>Thông tin công ty</h5>
						<div class="col-6 ">
							<div class="form-group">
								<label class="text-bold-600">Công ty</label>
								<select name="congty" class="form-control input-text-dotted">
									<option value="">Chọn</option>
									<option value="Viễn Đông">Viễn Đông</option>
									<option value="Hồn Việt">Hồn Việt</option>
									<option value="Tâm An">Tâm An</option>
								</select>
							</div>
							<div class="form-group">
								<label class="text-bold-600">Chuyên môn</label>
								<input type="text" name="chuyenmon" class="form-control input-text-dotted">
							</div>
							<div class="form-group">
								<label class="text-bold-600">Chức vụ</label>
								<input type="text" name="chucvu" class="form-control input-text-dotted">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label class="text-bold-600">Bộ phận</label>
								<select class="form-control input-text-dotted" name="thuocdv" required="">
									<option >Chọn ...</option>
									@foreach($bophan as $key)
									<option value="{{$key->madv}}">{{$key->tendv}}</option>
									@endforeach	
								</select>
								
							</div>
							<div class="form-group">
								<label class="text-bold-600">Bằng cấp</label>
								<input type="text" name="bangcap" class="form-control input-text-dotted">
							</div>
							<div class="form-group">
								<label class="text-bold-600">Trường đào tạo</label>
								<input type="text" name="truongtotnghiep" class="form-control input-text-dotted">
							</div>
							
							
						</div>
					</div>
					<div class="row mt-2">
						<h5 class="form-section col-12"><i class="fa fa-file-text"></i>Thông tin thêm</h5>
						<div class="col-6 ">
							<div class="form-group">
								<label class="text-bold-600">Nơi sinh</label>
								<input type="text" name="noisinh" class="form-control input-text-dotted">
							</div>
							<div class="form-group">
								<label class="text-bold-600">Quê quán</label>
								<input type="text" name="quequan" class="form-control input-text-dotted">
							</div>
							<div class="form-group">
								<label class="text-bold-600">Thẻ căn cước / CMND</label>
								<input type="text" name="cmnd" class="form-control input-text-dotted">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label class="text-bold-600">Số tài khoản</label>
								<input type="text" name="sotaikhoan" class="form-control input-text-dotted">
							</div>
							<div class="form-group">
								<label class="text-bold-600">Số bảo hiểm</label>
								<input type="text" name="sobaohiem" class="form-control input-text-dotted">
							</div>
							<div class="form-group">
								<label class="text-bold-600">Ngày công chuẩn</label>
								<input type="number" name="sobaohiem" class="form-control input-text-dotted">
							</div>
							
						</div>
					</div>
					<div class="row mt-2">
						<div class="col-12">
						<button class="btn btn-primary float-right">Save</button></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{URL::asset('js/NhanSu/addNV.js')}}"></script>
@endsection