@extends('admin_master')
@section('title')
 Quy đổi tiền thành hạt
@endsection
@section('css')
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/app-assets/css/plugins/forms/extended/form-extended.css')}}">
@endsection
@section('body')
<div class="app-content container center-layout mt-2">
	<div class="row">
		<div class="col-12">
			<div class="card box-shadow-1">
			<table class="table table-striped col-12">
				<thead>
					<tr>
						<th>Mã quy đổi</th>
						<th>Nội dung</th>
						<th>Mức quy đổi (Cống hiến)</th>
						<th>Tỷ lệ thưởng thêm</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $key)
					<tr>
						<td>{{$key->maqd}}</td>
						<td>{{$key->noidung}}</td>
						<td>{{$key->mucconghien}}</td>
						<td>{{round($key->tylethem,2)}} %</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
		<div class="col-12">
			<div class="card box-shadow-1">
				<div class="card-header">
				 	<h2 class=" card-title">  NẠP HẠT  <i class="fa fa-joomla text-success"></i></h2>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							@if(Session::has('status'))
							<div class="alert alert-success">
								{{Session::get('status')}}
							</div>
							@endif
							@if($errors->any())
							<div class="alert alert-danger">
								@foreach($errors as $err)
								<p>{{$err}}</p>
								@endforeach
							</div>
							@endif
							<div class="row">
								 <div class="col-xl-6 col-lg-12">
			                        <div class='card-wrapper'>
			                        	<div class="row">
			                        		<div class="col-4">
			                        			<img src="{{URL::asset('template/app-assets/images/avatar.jpg')}}" width="100%" id="hinh">
			                        		</div>
			                        		<div class="col-8">
			                        			<h5 >Mã nhân viên:<span id="manv" class="text-bold-600"></span></h5>
			                        			<h5 >Bộ phận: <span id="bophan" class="text-bold-600"></span></h5>
			                        			<h5 >Họ và tên: <span id="hoten" class="text-bold-600"></span></h5>
			                        			<h5 >Điểm cống hiến hiện tại <span id="diemch" class="text-bold-600"></span></h5>
			                        			<h5 >Thuộc mức <span id="mucquydoi" class="text-bold-600"></span></h5>
			                        		</div>
			                        	</div>
			                        </div>
			                     </div>
			                     <div class="col-xl-6 col-lg-12 border-left">
			                     	<div class="form-group">
			                     		<fieldset class="mb-1">
				                            <h5>Thẻ nhân viên / Mã nhân viên</h5>
				                            <div class="form-group">
				                              <input type="text" class="form-control card-number" name="info" id="info" placeholder="Scan mã thẻ hoặc nhập mã nhân viên">
				                            </div>
				                          </fieldset>
			                     	</div>
			                     	<form method="post" action="{{route('tien-thanh-hat')}}">
									@csrf
			                     	<div class="form-group">
			                     		<fieldset class="mb-1">
				                            <h5>Số tiền muốn nạp</h5>
				                            <div class="form-group">
				                              <input type="number" class="form-control card-number" name="sotien" id="sotien">
				                              	<span class="ml-1 text-danger mt-1">Số hạt quy đổi được là <span id="sohatquydoi"></span></span>
				                            </div>
				                          </fieldset>

			                     	</div>
			                     	<div class="form-group">
			                     		<fieldset class="mb-1">
				                            <h5>Nội dung</h5>
				                            <div class="form-group">
				                          	<textarea class="form-control" rows="4" name="noidung"></textarea>
				                            </div>
				                          </fieldset>
			                     	</div>
			                     	<div class="form-group">
			                     		<fieldset class="mb-1">
				                          <button class="btn btn-success float-right" id="naptien" name="naptien">Xác nhận</button>
				                          </fieldset>
			                     	</div>
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

  		getInfoByCard()

  </script>
@endsection