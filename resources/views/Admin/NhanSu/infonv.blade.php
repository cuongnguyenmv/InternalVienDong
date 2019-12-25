@extends('admin_master')
@section('body')
<div class="app-content container-fluid center-layout mt-2">
	<div class="row">
		<div class="card col-12">
		<div class="card-header">
			<h2 class="card-title">Hồ sơ nhân viên</h2>
			<div class="row mt-1">
				<div class="col-12">
					<a href="{{route('v-them-nv')}}" target="_blank"><button class="btn btn-primary" ><i class="fa fa-plus"></i></button></a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>STT</th>
						<th>Mã nhân viên</th>
						<th>Họ và tên</th>
						<th>Bộ phận</th>
						<th class="text-center"><i class="text-center fa fa-cog"></i></th>
						
					</tr>
				</thead>
				<tbody>
					@foreach($hoso as $key)
					<tr>
						<td>1</td>
						<td>{{$key->manv}}</td>
						<td>{{$key->hoten}}</td>
						<td>{{$key->bophan}}</td>
						
						<td>
							<button class="btn btn-success xem-ho-so"  data-toggle="modal" data-target="#xlarge" data-action="{{$key->manv}}"><i class="fa fa-eye"></i></button>
							<a href="./cap-nhat-ho-so/{{$key->manv}}"><button class="btn btn-warning "><i class="fa fa-pencil"></i></button></a>
						</td>
					</tr>@endforeach
				</tbody>
			</table>
		</div></div>
	</div>
</div>
<!-- modal -->
<div class="modal fade text-left show" id="xlarge" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" style="display: none; padding-right: 17px;">
                            <div class="modal-dialog modal-xl" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel16">Hồ sơ:
                                <!--   <button type="button" class="close" data-dismiss="modal" aria-label="Close" class="float-right">
                                    <span aria-hidden="true">×</span>
                                  </button> -->
                                </div>
                                <div class="modal-body" id="modal-body-show">
                                	
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
@endsection
@section('js')
<script type="text/javascript" src="{{URL::asset('js/other.js')}}"></script>
<script src="{{URL::asset('template/app-assets/vendors/js/charts/c3.min.js')}}" type="text/javascript"></script>

  <script src="{{URL::asset('template/app-assets/js/scripts/charts/c3/bar-pie/bar.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('template/app-assets/js/scripts/charts/c3/bar-pie/column.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('template/app-assets/js/scripts/charts/c3/bar-pie/donut.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('template/app-assets/js/scripts/charts/c3/bar-pie/pie.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('template/app-assets/js/scripts/charts/c3/bar-pie/stacked-bar.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('template/app-assets/js/scripts/charts/c3/bar-pie/stacked-column.js')}}"
  type="text/javascript"></script>

<script type="text/javascript">
	HoSoNhanVien()
	$('table').DataTable()
</script>
@endsection