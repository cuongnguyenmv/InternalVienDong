@extends('admin_master')
@section('title')
Trang chủ
@endsection
@section('css')

@endsection
@section('body')
<div class="app-content container center-layout mt-2">
		<div class="row">
			<div class="card col-12">
				<div class="card-header border-bottom">
					<h2>Tin tức</h2>
				</div>
				<div class="card-body ">
					<div class="row">
						<div class="col-6">
							<img src="{{URL::asset('template/app-assets/images/slider/slider-1.png')}}" width="100%">
							<div class="col-12">
								<h5 class="pt-1">Viễn Đông .com</h5>
								
								<p>Nội dung</p>
							</div>
						</div>
						<div class="col-6">
							<ul>
								<li class="dropdown-item">
									<h2 class="text-danger">Tin tức ngày 02/12/2019</h2>
									<p>Nội dung</p>
									<hr>
								</li>
								<li class="dropdown-item">
									<h2 class="text-danger">Tin tức ngày 02/12/2019</h2>
									<p>Nội dung</p>
									<hr>
								</li>
								<li class="dropdown-item">
									<h2 class="text-danger">Tin tức ngày 02/12/2019</h2>
									<p>Nội dung</p>
									<hr>
								</li>
								<li class="dropdown-item">
									<h2 class="text-danger">Tin tức ngày 02/12/2019</h2>
									<p><i class="fa fa-clock-o"></i> 17:00 02/12/2019</p>
									<p>Nội dung</p>
									<hr>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- row 2 -->
			<div class="card col-7">
					<div class="row">
						<div class="col-6">
							<h2>21312</h2>
						</div>
					</div>
			</div>
			<div class="col-1"></div>
			<div class="card col-4">
					<div class="row">
						<div class="col-6">
							<h2>21312</h2>
						</div>
					</div>
			</div>
			</div>
		</div>

</div>
@endsection
@section('js')
@endsection