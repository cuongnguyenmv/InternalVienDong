@extends('admin_master')
@section('title')

@endsection
@section('body')
<div class="app-content container center-layout mt-2">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h2 class="card-title">Tin tức sự kiện</h2>
				</div>
				<div class="card-body">
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
					<form method="post" enctype="multipart/form-data">
						@csrf
						<input type="text" name="id" value="{{$id}}" style="display: none;">
					<div class="card-content">
						<div class="form-group">
							<h5>Tiêu đề</h5>
							<input type="text" name="tieude" class="form-control" required="">
						</div>
						<div class="form-group">
							<h5>Giới thiệu</h5>
							<input type="text" name="gioithieu" class="form-control" required="">
						</div>
						<div class="form-group">
							<h5>Ngày đăng</h5>
							<input type="date" name="ngaydang" class="form-control" required="">
						</div>
						<div class="form-group">
							<h5>Ảnh bìa</h5>
							<input type="file" name="hinh" class="form-control" required="">
						</div>
						<div class="form-group">
							<textarea name="noidung" id="ckeditor" cols="30" rows="15" class="ckeditor form-control" required=""></textarea>
						</div>
						<div class="form-group">
							<button class="btn btn-primary float-right">Đăng</button>
						</div>
					</div></form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
  <script src="{{URL::asset('template/app-assets/vendors/js/editors/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
@endsection