@extends('admin_master')
@section('body')
<div class="app-content container center-layout mt-2">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h2 class="card-title">Sản phảm thanh lý</h2>
				</div>
				<div class="card-content">
					<div class="row">
						<div class="col-4">
							<img src="{{URL::asset('images/TaiSan')}}/{{$sp->hinh1}}" width="100%">
							<h4 class="text-bold-600">{{$sp->tents}}</h4>
						</div>
						<div class="col-8">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Người tham gia</th>
										<th>Giá gửi</th>
										<th class="text-center">Đơn vị</th>
									</tr>
								</thead>
								<tbody>
									@foreach($info as $key)
									<tr>
										<td>{{$key->tennv}}</td>
										<td>{{$key->sohat}}</td>
										<td class="text-center"><i class="fa fa-joomla text-success text-center"></i></td>
									</tr>
									@endforeach
								</tbody>
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
<script type="text/javascript">
	$('table').DataTable({
		"aLengthMenu": [[3, 50, 100, -1], [3, 50, 100, "All"]],
		 "bPaginate": false,
		"bLengthChange": false,
	    "bFilter": false,
	    "bInfo": false,
	})
</script>
@endsection