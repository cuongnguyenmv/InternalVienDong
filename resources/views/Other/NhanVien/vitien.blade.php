@extends('admin_master')
@section('body')
<div class="appc-content container center-layout mt-2">
	<div class="row">
		<div class="col-12">
			<div class="card box-shadow-1">
				<div class="card-header">
					
						<a href="{{route('quy-doi-ch')}}"><button class="btn btn-primary">Nhận thưởng mốc cống hiến</button></a>
					@if(Session::has('status'))
					<div class="alert alert-success mt-2">
						{{Session::get('status')}}
					</div>
					@endif
				</div>
				<div class="card-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Mã giao dịch</th>
							<th>Nội dung</th>
							<th>Số hạt</th>
							<th>Ngày giao dịch</th>
						</tr>
					</thead>
					<tbody>
						@foreach($history as $key)
						<tr>
							<td>{{$key->phiengd}}</td>
							<td>{{$key->noidung}}</td>
							@if($key->sohat < 0 )
							<td class="text-warning">{{$key->sohat}}</td>
							@else
							<td class="text-success">{{$key->sohat}}</td>
							@endif
							<td>{{Date('m-d-Y',strtotime($key->created_at))}}</td>

						</tr>@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th colspan="3">Số dư hiện tại</th>
							<th>{{Auth::user()->sohat}}</th>
						</tr>
					</tfoot>
				</table></div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
	$('table').DataTable()
</script>
@endsection