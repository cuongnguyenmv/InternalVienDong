@extends('admin_master')
@section('body')
<div class="app-content container center-layout mt-2">
	<div class="row">
		<div class="col-12">
			<div class="card box-shadow-1">
				<div class="card-header">
					<h2>Bỏ phiếu tín nhiệm / đồng cấp</h2>
				</div>
				<div class="card-body">
					<div class="card-content">
						<div class="row">
							<div class="col-12">

								<form method="post">
									@csrf
									<input type="text" name="maki" value="{{$thongtinbophieu->first()->maki}}" hidden="">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Hạng</th>
											<th>Avatar</th>
											<th>Họ tên</th>
											<th>Mã nhân viên</th>
										</tr>
									</thead>
									<tbody>
										<?php $stt = 1; ?>
										@foreach($nhanvien as $key)
										<tr>
											<td>
												<input type="number" name="stt[]" value="{{$stt++}}" style="border: none;width:50px" readonly=""></td>
											<td>
												<div class="row">
													<div class="col-12">
														<span class="avatar avatar-online">
                  <img src="{{URL::asset('/images/NhanVien')}}/{{$key->manv}}.jpg" alt="avatar" width="100%" ></span>
													</div>
												</div>
												
											</td>
											<td><input type="text" name="hoten[]" value="{{$key->hoten}}" style="border: none; width: 200px;" readonly=""></td>
											<td><input type="text" name="manv[]" value="{{$key->manv}}" style="border: none;" readonly=""></td>
										</tr>
										@endforeach
									</tbody>
									<tfoot>
										<tr>
											<td colspan="4">
												<div class="form-group">
												<button class="btn btn-primary float-right">Gửi</button></div>
											</td>
										</tr>
									</tfoot>
								</table></form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script src="{{URL::asset('sortable/jquery-ui.min.js')}}"></script>
  <script src="{{URL::asset('sortable/jquery-ui.js')}}"></script>
  <script type="text/javascript">
  	$(document).ready(function(){
  		$('tbody').sortable({
  			cursor: "move",
  			stop: function( event, ui ){
        	$(this).find('tr').each(function(i){
            $(this).find('td:first>input').val(i+1);
		        });
		    }
  		})
  	})
  </script>
@endsection