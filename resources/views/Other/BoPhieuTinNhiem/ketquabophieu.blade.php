@extends('admin_master')
@section('body')
<div class="app-content container center-layout mt-2">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h2>Kết quả bỏ phiếu tín nhiệm </h2>

					<select id="kibophieu">
						@foreach($kibophieu as $key)
						<option value="{{$key->maki}}">{{$key->kibophieu}} ({{Date('d-m-Y',strtotime($key->ngaybophieu))}})</option>
						@endforeach
					</select>
					
				
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<table class="table table-striped">
								<thead>
									<th>Hạng</th>
									<th>Nhân viên</th>
									<th>Điểm</th>
								</thead>
								<tbody>
									<?php $stt = 1; ?>
									@foreach($ketqua as $key)
									<tr>
										<td>{{$stt++}}</td>
										<td>{{$key->hoten}}</td>
										<td>{{round($key->diembophieu,2)}}</td>
									</tr>@endforeach
								</tbody>
								<tfoot>
									<tr>
										<td colspan="2">Tổng người tham gia:</td>
										<td>{{$songuoi->tong}}</td>
									</tr>
									<tr>
										<td colspan="2">Tổng người tham gia:</td>
										<td></td>
									</tr>
								</tfoot>
							</table>
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
	$(document).ready(function(){
		KetQuaBoPhieu()
	})
</script>
@endsection