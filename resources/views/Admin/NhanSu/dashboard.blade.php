@extends('admin_master')
@section('css')
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
@section('body')
<div class="content-wrapper">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-content">
					<div class="row">
							<div class="col-lg-4 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
			                    <div class="p-1 text-center">
			                      <div>
			                        <h3 class="font-large-1 grey darken-1 text-bold-400">Thành viên</h3>
			                        <span class="font-large-3 grey darken-1">80</span>
			                      </div>
			                    </div>
		                  	</div>
		                  <!-- card 2 -->
		                  <div class="col-lg-4 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
			                    <div class="p-1 text-center">
			                      <div>
			                        <h3 class="font-large-1 grey darken-1 text-bold-400">Hạt nhân</h3>
			                        <span class="font-large-3 grey darken-1">80</span>
			                      </div>
			                    </div>
		                  	</div>
		                  <!-- card 3 -->
		                  <div class="col-lg-4 col-md-12 col-sm-12">
			                    <div class="p-1 text-center">
			                      <div>
			                        <h3 class="font-large-1 grey darken-1 text-bold-400">Tổng</h3>
			                        <span class="font-large-3 grey darken-1">160</span>
			                      </div>
			                    </div>
		                  	</div>
		                  <!-- end -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header"><h4 class="text-center">Danh Sách Thành viên</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-lg-2 col-md-2">
			              <div class="card border-right-lighten-5 border-right-blue-grey" style="height: 383.4px;">
			                <div class="card-content collapse show">
			                  <div class="card-body">
			                    <div class="list-group">
			                    	<div class="card-header card-head-inverse bg-success">
                  					<h4 class="card-title text-white">Menu</h4></div>
                 
			                      <button type="button" class="list-group-item list-group-item-action view-page active" data-action="ds-tong">
			                        Danh sách tổng
			                      </button>
			                      <button type="button" class="list-group-item list-group-item-action view-page" data-action="ds-hat-nhan">Hạt nhân</button>
			                      <button type="button" class="list-group-item list-group-item-action view-page" data-action="ds-thanh-vien">Thành viên</button>
			                      <button type="button" class="list-group-item list-group-item-action view-page" data-action="ds-thu-viec">Thử việc</button>
			                    </div>

			                  </div>
			                </div>
			              </div>
			            </div>
			            <div class="col-10" id="show-table">
			            <?php $i=1 ; $status = array('Nghỉ làm','Thử việc','Chính thức','Hạt Nhân')?>
							  <table class="table table-striped responsive table-bordered" >
							            <thead>
							              <tr>
							                <th>STT</th>
							                <th>Mã nhân viên</th>
							                <th>Nhân viên</th>
							                <th>Ngày vào làm</th>
							                <th>Bộ phận</th>
							                <th>Loại</th>
							                <th>Action</th>
							              </tr>
							            </thead>
							            <tbody >
							@foreach($nhanvien as $key)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$key->manv}}</td>
								<td  data-toggle="modal" data-target="#default">{{$key->tennv}}</td>
								<td>{{date('d-m-Y',strtotime($key->ngayvaolam))}}</td>
								<td>{{$key->tendv}}</td>
								<td>{{$status[$key->trangthai]}}</td>
								<td>
							       <span class="dropdown">
							         <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
							         <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
							         	<a href="#" class="dropdown-item"><i class="ft-edit-2"></i>Edit</a>
							             <a href="#" class="dropdown-item"><i class="ft-trash-2 "></i> Delete</a>

							         </span>
							       </span>
							     </td>
							</tr>
							@endforeach
							  </tbody>
							          </table>
							
					
			            </div>
					</div>
					
				</div>
				<div class="card-footer">
					<div class="col-12">
						<a href="./add-nhan-su" target="_blank"><button class="btn btn-outline-success float-right">Thêm nhân sự</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- row 3 -->
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-content">
					
				</div>
			</div>
		</div>
	</div>
	<!-- Row 4 -->
<div class="row">
	<div class="col-6">
		<div class="card">
			<div class="card-header">
                <h4 class="card-title">Giờ đào tạo công ty</h4>
                <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                <div class="heading-elements">
                	<span class="dropdown">
                    <button id="btnSearchDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-warning btn-sm dropdown-toggle dropdown-menu-right"><i class="ft-download white"></i></button>
                    <span aria-labelledby="btnSearchDrop1" class="dropdown-menu mt-1 dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-87px, 25px, 0px); top: 0px; left: 0px; will-change: transform;">
                      <a href="#" class="dropdown-item"><i class="fa fa-calendar"></i> Due Date</a>
                      <a href="#" class="dropdown-item"><i class="fa fa-random"></i> Priority </a>
                    </span>
                  </span>
                  <button class="btn btn-primary btn-sm"><i class="ft-plus white"></i> New Task</button>
                </div>
              </div>
			<div class="card-content">
					<div class="card-body">
						<table class="table table-sm table-striped table-bordered">
							<thead>
								<tr>
									<th>Mã</th>
									<th>Tên</th>
									<th>Điểm</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Mã 1</td>
									<td>Guitar</td>
									<td>10</td>
								</tr>
							</tbody>
						</table>
					</div>
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card">
			<div class="card-header">
                <h4 class="card-title">Điểm tăng giảm</h4>
                <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                <div class="heading-elements">
                	<span class="dropdown">
                    <button id="btnSearchDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-warning btn-sm dropdown-toggle dropdown-menu-right"><i class="ft-download white"></i></button>
                    <span aria-labelledby="btnSearchDrop1" class="dropdown-menu mt-1 dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-87px, 25px, 0px); top: 0px; left: 0px; will-change: transform;">
                      <a href="#" class="dropdown-item"><i class="fa fa-calendar"></i> Due Date</a>
                      <a href="#" class="dropdown-item"><i class="fa fa-random"></i> Priority </a>
                    </span>
                  </span>
                  <button class="btn btn-primary btn-sm"><i class="ft-plus white"></i> New Task</button>
                </div>
              </div>
			<div class="card-body">
				<table class="table table-sm table-striped table-bordered">
					<thead>
						<tr>
							<th>Mã</th>
							<th>Tên</th>
							<th>Điểm thưởng</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Mã 1</td>
							<td>Guitar</td>
							<td>10</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
	<!-- Row 5 -->
</div>
<!-- Modal -->
                          <div class="modal animated slideInLeft text-left" id="default" tabindex="-1"
                          role="dialog" aria-labelledby="myModalLabel75" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel75">Basic Modal</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <h5>Check First Paragraph</h5>
                                  <p>Oat cake ice cream candy chocolate cake chocolate
                                    cake cotton candy dragée apple pie. Brownie carrot
                                    cake candy canes bonbon fruitcake topping halvah.
                                    Cake sweet roll cake cheesecake cookie chocolate
                                    cake liquorice. Apple pie sugar plum powder donut
                                    soufflé.</p>
                                  <p>Sweet roll biscuit donut cake gingerbread. Chocolate
                                    cupcake chocolate bar ice cream. Danish candy
                                    cake.</p>
                                  <hr>
                                  <h5>Some More Text</h5>
                                  <p>Cupcake sugar plum dessert tart powder chocolate
                                    fruitcake jelly. Tootsie roll bonbon toffee danish.
                                    Biscuit sweet cake gummies danish. Tootsie roll
                                    cotton candy tiramisu lollipop candy cookie biscuit
                                    pie.</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-outline-primary">Save changes</button>
                                </div>
                              </div>
                            </div>
                          </div>
@endsection
@section('js')
<script src="{{URL::asset('template/app-assets/js/scripts/modal/components-modal.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('template/app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{URL::asset('js/NhanSu/dashboard.js')}}"></script>
@endsection