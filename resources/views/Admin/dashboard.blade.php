@extends('admin_master')
@section('css')
@endsection
@section('body')
<div class="content-wrapper">
		<div class="card">
			<div class="card-header"><h2>Tiêu đề</h2></div>
			<div class="card-body">
				<table class="table table-striped">
					<thead>
						<tr>
						<th>STT</th>
						<th>Mã nhân viên</th>
						<th>Nhân viên</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>STAFF1</td>
							<td><span class="avatar avatar-online">
                              <img src="{{URL::asset('template/app-assets/images/portrait/small/avatar-s-6.png')}}" alt="avatar" data-placement="right" title="Nicole Barrett"><i></i>
                            </span><span class="ml-2">Hải Cường</span></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
</div>
@endsection
@section('js')
@endsection