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
						<div class="col-12 col-md-6 col-xl-6">
							<img src="{{URL::asset('images')}}/{{$tintuc->first()->hinh}}" width="100%">
							<div class="col-12">
								<h4 class="pt-1 text-danger">{{$tintuc->first()->tieude}}</h4>
								<p><i class="fa fa-clock-o"></i> {{Date('d-m-Y',strtotime($tintuc->first()->ngaydang))}}</p>
								<p>{{$tintuc->first()->gioithieu}}</p>
							</div>
						</div>
						<div class="col-12 col-md-6 col-xl-6" style="overflow-y: scroll; height:500px;">
							<ul>
								@foreach($tintuc as $key)
								<a href="./tin-tuc/{{$key->id}}">
								<li class="dropdown-item">
									<h2 class="text-danger">{{$key->tieude}}</h2>
									<p><i class="fa fa-clock-o"></i> {{Date('d-m-Y',strtotime($key->ngaydang))}}</p>
									<p>{{$key->gioithieu}}</p>
									<hr>
								</li></a>
								@endforeach
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