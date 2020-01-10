@extends('admin_master')
@section('body')
<div class="app-content container-fluid center-layout mt-2">
	<div class="row">
		<div class="col-12">
			<div class="card" >
	                <div class="card-content">
	                  <div class="card-body">
	                    <ul class="nav nav-tabs nav-topline">
	                      <li class="nav-item">
	                        <a class="nav-link active" id="base-tab21" data-toggle="tab" aria-controls="tab21" href="#tab21" aria-expanded="true">Giảy chạy</a>
	                      </li>
	                      <li class="nav-item">
	                        <a class="nav-link" id="base-tab22" data-toggle="tab" aria-controls="tab22" href="#tab22" aria-expanded="false">Khởi tạo giải chạy</a>
	                      </li>
	                      <li class="nav-item">
	                        <a class="nav-link" id="base-tab23" data-toggle="tab" aria-controls="tab23" href="#tab23" aria-expanded="false">Import đăng ký</a>
	                      </li>
	                    </ul>
	                    <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
	                      <div role="tabpanel" class="tab-pane active" id="tab21" aria-expanded="true" aria-labelledby="base-tab21">
	                      	<div class="row">
	                      		<div class="col-12 mb-2">
	                      			<a href="./giai-chay" target="_blank"><button class="btn btn-success">Check in</button></a>
	                      		</div>
	                      	</div>
	                      	<table class="table table-striped">
	                      		<thead>
	                      			<tr>
	                      				<th>ID</th>
	                      				<th>Giải chạy</th>
	                      				<th>Số km</th>
	                      				<th>Số vòng</th>
	                      				<th>Thời gian bắt đầu</th>
	                      				<th>Trạng thái</th>
	                      			</tr>
	                      		</thead>
	                      		<tbody>
	                      			<?php $trangthai = ['Đang chờ','Đang chạy','Đã chạy']; ?>
	                      			@foreach($giaichay as $key)
	                      				<tr>
	                      				<td>{{$key->machaybo}}</td>
	                      				<td>{{$key->giaichay}}</td>
	                      				<td>{{$key->sokm}}</td>
	                      				<td>{{$key->sovong}}</td>
	                      				<td>{{Date('H:i d-M-Y',strtotime($key->batdau))}}</td>
	                      				<td>{{$trangthai[$key->trangthai]}}</td>
	                      				
	                      				</tr>
	                      			@endforeach
	                      		</tbody>
	                      	</table>
	                      </div>
	                      <div class="tab-pane" id="tab22" aria-labelledby="base-tab22">
	                       <div class="row">
			                       	<div class="col-12">
			                       		@if(Session::has('status'))
			                       		<div class="alert alert-success">
			                       				{{Session::get('status')}}
			                       			</div>
			                       		@endif
			                       		@if($errors->any())
			                       			<div class="alert alert-danger">
			                       				@foreach($errors->all() as $err)
			                       					<p>{{$err}}</p>
			                       				@endforeach
			                       			</div>
			                       		@endif
			                       		 	<form method="post">
			                       		 		@csrf
			                       		<h2 class="form-sections">Thông tin</h2>
			                       		<div class="form-group">
			                       			<label>Mã chạy bộ</label>
			                       			<input type="text" name="machaybo" class="form-control">
			                       		</div>
			                       		<div class="form-group">
			                       			<label>Giải chạy </label>
			                       			<input type="text" name="giaichay" class="form-control">
			                       		</div>
			                       		<div class="form-group">
			                       			<label>Thời gian bắt đầu</label>
			                       			<input type="datetime-local" name="batdau" class="form-control">
			                       		</div>
			                       		<div class="form-group">
			                       			<label>Thời gian kết thúc</label>
			                       			<input type="datetime-local" name="ketthuc" class="form-control">
			                       		</div>
			                       		<h2 class="form-sections">Mục tiêu</h2>
			                       		<div class="form-group">
			                       			<label>Số kilomet</label>
			                       			<input type="number" name="sokm" class="form-control">
			                       		</div>
			                       		<div class="form-group">
			                       			<label>Số vòng</label>
			                       			<input type="number" name="sovong" class="form-control">
			                       		</div> 
			                       		<div class="form-group ">
			                       			<button class="btn btn-success float-right mb-2">Lưu</button>
			                       		</div> 
			                       		 </form>
			                       	</div>
		                     
	                       </div>
	                      </div>
	                      <div class="tab-pane" id="tab23" aria-labelledby="base-tab23">
	                      	<div class="row">
	                      		<div class="col-12">
	                      		<form method="post" enctype="multipart/form-data" action="{{route('import-chay-bo')}}">
	                        	@csrf
	                        	<div class="form-group">
	                        	<input type="file" name="file" class="form-control"></div>
	                        	<div class="form-group">
	                        		<button class="btn btn-success float-right mb-2">Import</button>
	                        	</div>
	                        </form>
	                      	</div>
	                        </div>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	              </div>
		</div>
	</div>
</div>
@endsection