@extends('admin_master')
@section('title')
Admin - Bình Chọn Sự Kiện
@endsection
@section('css')
	<style type="text/css">
		.breadcrumb .active>a{
			color: red;
		}
	</style>
@endsection
@section('body')
<div class="app-content container center-layout mt-2">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<div class="row">
	 	 <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-users"></i>   Các sự kiện biểu quyết ý kiến</h1>
			<div class="col-12 pt-2">
						 <div class="row breadcrumbs-top">
			            <div class="breadcrumb-wrapper col-12">
			              <ol class="breadcrumb">
			                <li class="breadcrumb-item active"><a href="#">Các sự kiện</a>
			                </li>
			                <li class="breadcrumb-item"><a href="#">Kết quả</a>
			                </li>
			                <li class="breadcrumb-item "><a href="#">Khai báo</a>
			                </li>
			              </ol>
			            </div>
			          </div>
			</div>
		</div>
	</div>
@if(Session::has('status'))
				<br><br>
				<div class="row col-md-12">
                    <div class="alert alert-success col-md-12">
                        {{Session::get('status')}}
                    </div>
                </div>
                @endif
                @if(Session::has('error'))
				<br><br>
				<div class="row col-md-12">
                    <div class="alert alert-danger col-md-12">
                        {{Session::get('error')}}
                    </div>
                </div>
                @endif
		<div class="row div-show" id="list">
			<div class="col-12 " >
				<div class="card" >
					<div class="card-header">
						<h2 class="menu-title">Danh sách sự kiện</h2>
					</div>
					<div class="card-content">
						<div class="row">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>STT</th>
										<th>Chủ đề</th>
										<th>Ngày thực hiện</th>
										<th>
											<i class="fa fa-cog"></i>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; ?>
									@foreach($list as $key)
									<tr>
										<td>{{$i++}}</td>
										<td>{{$key->tensk}}</td>
										<td>{{date('d-m-Y',strtotime($key->thoigian))}}</td>
										<td>
											<button class="btn btn-success" onclick="window.open('./binh-chon/{{$key->mask}}')">Bắt đầu</button>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row div-show" id="def" style="display: none;">
			<div class="col-12 " >
				<div class="card" >
					<div class="card-header">
						<h2 class="menu-title">Chủ đề biểu quyết</h2>
					</div>
					<div class="card-content">
						<form class="form" method="post">
							@csrf
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label>Chủ đề</label>
										<input type="text" name="tensk" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label>Thời gian biểu quyết</label>
										<input type="date" name="thoigian" class="form-control">
									</div>
								</div>
							</div>
							<div class="row  float-right">
								<button class="btn btn-success">Khai báo</button>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>


</div>
@endsection
@section('js')
<script type="text/javascript" src="{{URL::asset('js/switch.js')}}"></script>

@endsection