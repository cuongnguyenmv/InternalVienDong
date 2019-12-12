@extends('admin_master')
@section('body')
<div class="app-content container center-layout mt-2">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h2 class="card-title">Các Sản Phẩm Đợi Duyệt</h2>
				</div>
				<div class="card-body">
					<div class="card-content">
						<table class="table table-striped">
							<thead>
								<?php $i=1; ?>
								<tr>
									<th>STT</th>
									<th>Tên sản phẩm</th>
									<th>Hình</th>
									<th>Người gửi</th>
									<th><i class="fa fa-cog"></i></th>
								</tr>
							</thead>
							<tbody>
								@foreach($sp as $key)
								<tr>
									<td>{{$i++}}</td>
									<td>{{$key->tents}}</td>
									<td><div class="row">
										<div class="col-4"><img src="{{URL::asset('images/TaiSan')}}/{{$key->hinh2}}" height="80px" width="auto" ></div>
										@if(!empty($key->hinh2))
										<div class="col-4"><img src="{{URL::asset('images/TaiSan')}}/{{$key->hinh2}}" height="80px" width="auto" ></div>
										@elseif(!empty($key->hinh3))
										<div class="col-4"><img src="{{URL::asset('images/TaiSan')}}/{{$key->hinh3}}" height="80px" width="auto" ></div>
										@endif
										
									</div></td>
									<td>{{$key->name}}</td>
									<td>
										<a href="./duyet-tl/{{$key->matl}}" class="btn btn-success"><i class="ft-check"></i></a>
									</td>
								</tr>@endforeach

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection