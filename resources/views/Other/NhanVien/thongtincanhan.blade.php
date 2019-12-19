@extends('admin_master')
@section('body')
<div class="app-content container center-layout mt-2">
	<div class="row">
   	<div class="col-12">
    		<ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1"
        href="#tab1" aria-expanded="true">Thông tin </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2"
        aria-expanded="false">Điểm cống hiến</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab3"
        aria-expanded="false">Lương</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="base-tab4" data-toggle="tab" aria-controls="tab4" href="#tab4"
        aria-expanded="false">Biểu đồ lương</a>
      </li>
    </ul>
</div>
<div class="tab-content px-1 pt-1 col-12">
      <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
      	<div class="row">
      		<div class="col-3">
      			<!-- <img src="{{URL::asset('template/app-assets/images/avatar.jpg')}}" width="100%"> -->
      			<img src="{{URL::asset('images/NhanVien/')}}/{{$info->hinh}}" width="100%">
      		</div>
      		<div class="col-9">
      			<div class="row">
      				<div class="col-4">
      					<div class="form-group">
      						<label class="text-bold-600 h5">Mã nhân viên</label>
      						<input type="text" class="form-control input-text-dotted" value="{{$info->manv}}" readonly="">
      					</div>
      					<div class="form-group">
      						<label class="text-bold-600 h5">Họ và tên</label>
      						<input type="text" class="form-control input-text-dotted" value="{{$info->hoten}}" readonly="">
      					</div>
      					<div class="form-group">
      						<label class="text-bold-600 h5">Email</label>
      						<input type="text" class="form-control input-text-dotted" value="{{$info->email}}" readonly="">
      					</div>
      					<div class="form-group">
      						<label class="text-bold-600 h5">Số điện thoại</label>
      						<input type="text" class="form-control input-text-dotted" value="{{$info->sdt}}" readonly="">
      					</div>
      					
      				</div>
      				<div class="col-4">
      					<div class="form-group">
      						<label class="text-bold-600 h5">Ngày sinh (dd-mm-YYYY)</label>
      						<input type="text" class="form-control input-text-dotted" value="{{!empty($info->ngaysinh) ? Date('d-m-Y',strtotime($info->ngaysinh)) : ''}}" readonly="">
      					</div>
      					<div class="form-group">
      						<label class="text-bold-600 h5">Ngày thử việc (dd-mm-YYYY)</label>
      						<input type="text" class="form-control input-text-dotted" value="{{!empty($info->ngaythuviec) ? Date('d-m-Y',strtotime($info->ngaythuviec)) : ''}}" readonly="">
      					</div>
      					<div class="form-group">
      						<label class="text-bold-600 h5">Ngày chính thức (dd-mm-YYYY)</label>
      						<input type="text" class="form-control input-text-dotted" value="{{!empty($info->ngaychinhthuc) ? Date('d-m-Y',strtotime($info->ngaychinhthuc)) : ''}}" readonly="">
      					</div>
      					<div class="form-group">
      						<label class="text-bold-600 h5">Địa chỉ hiện tại</label>
      						<input type="text" class="form-control input-text-dotted" value="{{$info->diachi}}" readonly="">
      					</div>
      				</div>
      				<div class="col-4">
      					<div class="form-group">
      						<label class="text-bold-600 h5">Công ty</label>
      						<input type="text" class="form-control input-text-dotted" value="{{$info->congty}}" readonly="">
      					</div>
      					<div class="form-group">
      						<label class="text-bold-600 h5">Bộ phận</label>
      						<input type="text" class="form-control input-text-dotted" value="{{$info->bophan}}" readonly="">
      					</div>
      					<div class="form-group">
      						<label class="text-bold-600 h5">Chức vụ</label>
      						<input type="text" class="form-control input-text-dotted" value="{{$info->chucvu}}" readonly="">
      					</div>
      					<div class="form-group">
      						<label class="text-bold-600 h5">Quản lý trực tiếp</label>
      						<input type="text" class="form-control input-text-dotted" value="" readonly="">
      					</div>
      				</div>
      			</div>
      		</div>
      		
      	</div>
      </div>
      <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">

     	<table class="table table-striped table-bordered">
     		<thead>
     			<tr>
     				<th>Trải Nghiệm</th>
     				<th>Văn Hóa</th>
     				<th>Đào Tạo</th>
     				<th>Thưởng Phạt</th>
     				<th>Điểm Cống Hiến</th>
     			</tr>
     		</thead>
     		<tbody>
     			@if(!empty($conghien))
     			<tr>
     				<td>{{$conghien->trainghiem}}</td>
     				<td>{{$conghien->vanhoa}}</td>
     				<td>{{$conghien->daotao}}</td>
     				<td>{{$conghien->tanggiam}}</td>
     				<td>{{$conghien->diemtong}}</td>
     			</tr>
     			@else
     			<tr>
     				<td colspan="5">Chưa cập nhật</td>
     			</tr>
     			@endif
     		</tbody>
     	</table>
     	<!-- chart Đào tạo -->
     	 <div class="row">
           <div class="col-12">
             <div class="card">
               <div class="card-header">
                 <h4 class="card-title">Chart Đào Tạo</h4>
                 <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                 
               </div>
               <div class="card-content collapse show">
                 <div class="card-body">
                   <div id="donut-chart"></div>
                 </div>
               </div>
             </div>
           </div>
         </div>
      </div>
      <div class="tab-pane" id="tab3" aria-labelledby="base-tab3">
        	<div class="row">
        		<h4 class="col-12">1. Điều khoản cố định (Tổng giá trị hiện tại: 1,000,000)</h4>
      			<hr>
        		<div class="col-12">
        			<h4 class="card-title"><i class="fa fa-bookmark"></i>  Bảng A-B</h4>
        			<table class="table table-striped table-bordered">
        				<thead>
        					<tr>
        						<th colspan="4">Điều khoản</th>
        						<th colspan="2">Giá trị hiện tại</th>
        						<th colspan="2">Tiền</th>
        					</tr>
        				</thead>
        				<tbody>
        					<tr>
        						<td colspan="4">Tuổi vào làm</td>
        						<td colspan="2">33</td>
        						<td colspan="2">3300000</td>
        					</tr>
        					<tr>
        						<td colspan="4">Kinh nghiệm làm việc được kiểm chứng  (ấn tượng ban đầu) - B1</td>
        						<td colspan="2">B1</td>
        						<td colspan="2">3300000</td>
        					</tr>
        				</tbody>
        				<tfoot>
        					<tr>
        						<td colspan="6">Tổng</td>
        						<td colspan="2">6600000</td>
        					</tr>
        				</tfoot>
        			</table>
        		</div>
        		<h4 class="col-12">2. Điều khoản thay đổi (Tổng giá trị hiện tại: 1,000,000)</h4>
      			<hr>
        		<div class="col-6">
        			<h4 class="card-title"><i class="fa fa-bookmark"></i>  Bảng C</h4>
        			<table class="table table-striped table-bordered">
        				<thead>
        					<tr>
        						<th colspan="4">Điều khoản</th>
        						<th colspan="2">Giá trị hiện tại</th>
        						<th colspan="2">Tiền</th>
        					</tr>
        				</thead>
        				<tbody>
        					<tr>
        						<td colspan="4">Tuổi vào làm</td>
        						<td colspan="2">33</td>
        						<td colspan="2">3300000</td>
        					</tr>
        					<tr>
        						<td colspan="4">Kinh nghiệm làm việc được kiểm chứng  (ấn tượng ban đầu) - B1</td>
        						<td colspan="2">B1</td>
        						<td colspan="2">3300000</td>
        					</tr>
        				</tbody>
        				<tfoot>
        					<tr>
        						<td colspan="6">Tổng</td>
        						<td colspan="2">6600000</td>
        					</tr>
        				</tfoot>
        			</table>
        		</div>
        		<div class="col-6">
        			<h4 class="card-title"><i class="fa fa-bookmark"></i>  Bảng D</h4>
        			<table class="table table-striped table-bordered">
        				<thead>
        					<tr>
        						<th colspan="4">Điều khoản</th>
        						<th colspan="2">Giá trị hiện tại</th>
        						<th colspan="2">Tiền</th>
        					</tr>
        				</thead>
        				<tbody>
        					<tr>
        						<td colspan="4">Tuổi vào làm</td>
        						<td colspan="2">33</td>
        						<td colspan="2">3300000</td>
        					</tr>
        					<tr>
        						<td colspan="4">Kinh nghiệm làm việc được kiểm chứng  (ấn tượng ban đầu) - B1</td>
        						<td colspan="2">B1</td>
        						<td colspan="2">3300000</td>
        					</tr>
        				</tbody>
        				<tfoot>
        					<tr>
        						<td colspan="6">Tổng</td>
        						<td colspan="2">6600000</td>
        					</tr>
        				</tfoot>
        			</table>
        		</div>
        		<div class="col-6">
        			<h4 class="card-title"><i class="fa fa-bookmark"></i>  Bảng E</h4>
        			<table class="table table-striped table-bordered">
        				<thead>
        					<tr>
        						<th colspan="4">Điều khoản</th>
        						<th colspan="2">Giá trị hiện tại</th>
        						<th colspan="2">Tiền</th>
        					</tr>
        				</thead>
        				<tbody>
        					<tr>
        						<td colspan="4">Tuổi vào làm</td>
        						<td colspan="2">33</td>
        						<td colspan="2">3300000</td>
        					</tr>
        					<tr>
        						<td colspan="4">Kinh nghiệm làm việc được kiểm chứng  (ấn tượng ban đầu) - B1</td>
        						<td colspan="2">B1</td>
        						<td colspan="2">3300000</td>
        					</tr>
        				</tbody>
        				<tfoot>
        					<tr>
        						<td colspan="6">Tổng</td>
        						<td colspan="2">6600000</td>
        					</tr>
        				</tfoot>
        			</table>
        		</div>
        		<div class="col-6">
        			<h4 class="card-title"><i class="fa fa-bookmark"></i>  Bảng F</h4>
        			<table class="table table-striped table-bordered">
        				<thead>
        					<tr>
        						<th colspan="4">Điều khoản</th>
        						<th colspan="2">Giá trị hiện tại</th>
        						<th colspan="2">Tiền</th>
        					</tr>
        				</thead>
        				<tbody>
        					<tr>
        						<td colspan="4">Tuổi vào làm</td>
        						<td colspan="2">33</td>
        						<td colspan="2">3300000</td>
        					</tr>
        					<tr>
        						<td colspan="4">Kinh nghiệm làm việc được kiểm chứng  (ấn tượng ban đầu) - B1</td>
        						<td colspan="2">B1</td>
        						<td colspan="2">3300000</td>
        					</tr>
        				</tbody>
        				<tfoot>
        					<tr>
        						<td colspan="6">Tổng</td>
        						<td colspan="2">6600000</td>
        					</tr>
        				</tfoot>
        			</table>
        		</div>
        	</div>
      </div>
      <div class="tab-pane" id="tab4" aria-labelledby="base-tab4">
      	<div class="row">
      		<h4 class="menu-title col-12"><i class="fa fa-th-list"></i>  Bảng lương theo Học kì</h4>
      		<div class="col-12">
      			<table class="table table-striped">
      				<thead>
      					<tr class="bg-warning">
      						<th></th>
      						<th>A</th>
      						<th>B</th>
      						<th>C</th>
      						<th>D</th>
      						<th>E</th>
      						<th>F</th>
      						<th>G</th>
      						<th>Tổng</th>
      					</tr>
      				</thead>
      				<tbody>
      					<tr>
      						<td>HK1</td>
      						<td>3,450,000</td>
      						<td>1,000,000</td>
      						<td>200,000</td>
      						<td>500,000</td>
      						<td>500,000</td>
      						<td>0</td>
      						<td>0</td>
      						<td>5,650,000</td>
      					</tr>
      					<tr>
      						<td>HK2</td>
      						<td>3,450,000</td>
      						<td>1,000,000</td>
      						<td>600,000</td>
      						<td>1,100,000</td>
      						<td>500,000</td>
      						<td>0</td>
      						<td>0</td>
      						<td>6,650,000</td>
      					</tr>
      					<tr>
      						<td>HK3</td>
      						<td>3,450,000</td>
      						<td>1,000,000</td>
      						<td>800,000</td>
      						<td>1,800,000</td>
      						<td>500,000</td>
      						<td>0</td>
      						<td>0</td>
      						<td>7,550,000</td>
      					</tr>
      				</tbody>
      			</table>
      		</div>
      		<div class="col-3">
      			<table class="table table-striped">
      				<thead>
      					<tr class="bg-warning">
      						<th></th>
      						<th>Tổng</th>
      						<th>Thực Lãnh</th>
      					</tr>
      				</thead>
      				<tbody>
      					<tr>
      						<td>HK1</td>
      						<td>3,450,000</td>
      						<td>5,650,000</td>
      					</tr>
      					<tr>
      						<td>HK2</td>
      						<td>3,450,000</td>
      						<td>6,650,000</td>
      					</tr>
      					<tr>
      						<td>HK3</td>
      						<td>3,450,000</td>
      						<td>7,550,000</td>
      					</tr>
      				</tbody>
      			</table>
      		</div>
      		<hr>
      		<h4 class="menu-title col-12"><i class="fa fa-line-chart"></i>  Biểu Đồ</h4>
      		<div class="col-6">
      			<div class="card">
                <div class="card-header">
                  <h4 class="card-title">Lương theo nhóm</h4>
                  </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <div id="data-order"></div>
                  </div>
                </div>
              </div>
      		</div>
      		 <div class="col-6">
      			<div class="card">
                <div class="card-header">
                 <h4 class="card-title">Lương theo nhóm</h4>
                  
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <div id="column-oriented"></div>
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
@section('js')
<script type="text/javascript" src="{{URL::asset('js/other.js')}}"></script>
<script src="{{URL::asset('template/app-assets/vendors/js/charts/c3.min.js')}}" type="text/javascript"></script>
  <script type="text/javascript">
  	$(document).ready(function(){
  			ChartDaoTao()
			ChartLuong()
			ChartLuongThucLanh()
  	})
  				
  </script>
@endsection