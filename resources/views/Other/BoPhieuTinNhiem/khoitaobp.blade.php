@extends('admin_master')
@section('body')
<div class="app-content container mt-2 layout-center">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<p class="card-title">Khởi tạo cuộc bầu cử</p>
				</div>
				<div class="card-body">
					@if(Session::has('status'))
						<div class="alert alert-success">
							{{Session::get('status')}}
						</div>
					@endif
					<form method="post">
						@csrf
						<div class="form-group">
							<label>Kì bầu cử</label>
							<input type="text" name="kibophieu" class="form-control">
						</div>
						<div class="form-group">
							<label>Ngày bắt đầu</label>
							<input type="date" name="ngaybophieu" class="form-control">
						</div>
						<div class="form-group">
							<label>Ngày kết thúc</label>
							<input type="date" name="ngayketthuc" class="form-control">
						</div>
						<div class="form-group">
							<button class="btn btn-success">Khởi tạo</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
