@extends('admin_master')
@section('body')
<div class="app-content container center-layout mt-2 ">
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
      <li class="nav-item">
        <a class="nav-link" id="base-tab5" data-toggle="tab" aria-controls="tab5" href="#tab5"
        aria-expanded="false">Các hoạt động</a>
      </li>
    </ul>
</div>
<div class="tab-content px-1 pt-1 col-12 card">
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
        <div class="row">
     	<table class="table table-striped table-bordered">
     		<thead>
     			<tr>
            <th></th>
     				<th>Trải Nghiệm</th>
     				<th>Văn Hóa</th>
     				<th>Đào Tạo</th>
     				<th>Thưởng Phạt</th>
     				<th>Tổng</th>
     			</tr>
     		</thead>
     		<tbody>
     			@if(!empty($conghien))
     			<tr>
            <td class="text-bold-600">Điểm cống hiến </td>
     				<td>{{round($conghien->trainghiem,2)}}</td>
     				<td>{{round($conghien->vanhoa,2)}}</td>
     				<td>{{round($conghien->daotao,2)}}</td>
     				<td>{{round($conghien->tanggiam,2)}}</td>
     				<td>{{round($conghien->tongdiem,2)}}</td>
     			</tr>
     			@else
     			<tr>
     				<td colspan="5">Chưa cập nhật</td>
     			</tr>
     			@endif
     		</tbody>
     	</table></div>
  <!-- đào tạo -->
      <div class="row">
        <div class="col-12">
          <table class="table table-striped">
            <thead>
              <tr>
                <th></th>
                <th>Tâm Lý</th>
                <th>Kiến Thức</th>
                <th>Kĩ Năng</th>
                <th>Nghệ Thuật</th>
                <th>Cộng Đồng</th>
                <th>Thể Chất</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-bold-600">Điểm đào tạo</td>
                <td>{{$daotao->TL}}</td>
                <td>{{$daotao->KT}}</td>
                <td>{{$daotao->KN}}</td>
                <td>{{$daotao->NT}}</td>
                <td>{{$daotao->CD}}</td>
                <td>{{$daotao->TC}}</td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                 <th class="text-bold-600" colspan="6">Tổng điểm</th>
                 <th>{{$daotao->TL+
                     $daotao->KT+
                     $daotao->KN+
                     $daotao->NT+
                     $daotao->CD+
                     $daotao->TC}}</th>
              </tr>
              
            </tfoot>
          </table>
        </div>
      </div>
      <!-- THưởng phạt -->
      <div class="row">
        <div class="col-12">
          <table class="table table-striped">
            <thead>
              <tr>
              
                <th>Sự kiện</th>
                <th>Nội dung</th>
                <th>Điểm</th>
                <th>Ngày tăng</th>
                
              </tr>
            </thead>
            <tbody>
              <?php $tongdiem =0; ?>
              @foreach($thuongphat as $key)
              <tr>
                <td>{{$key->tentg}}</td>
                <td>{{$key->noidungtg}}</td>
                <td>{{$key->diem}}</td>
                <td>{{Date('d-m-Y',strtotime($key->ngayhieuluc))}}</td>
                <?php $tongdiem += $key->diem ?>
              </tr>@endforeach
            </tbody>
            <tfoot>
              <th colspan="2">Tổng điểm</th>
              <th colspan="2">{{$tongdiem}}</th>
             
            </tfoot>
          </table>
        </div>
      </div>
     	<!-- chart Đào tạo -->
     	 <div class="row">
           <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Donut Chart</h4>
                  <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
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
        		<h4 class="col-12">1. Điều khoản cố định (Tổng giá trị hiện tại: {{number_format($banga->tien)}})</h4>
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
        						<td colspan="2">{{$banga->tuoivaolam}}</td>
        						<td colspan="2">{{number_format($banga->tien)}}</td>
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
      		<div class="col-6 col-md-6 col-xl-6 col-lg-6">
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
      		 <div class="col-6 col-md-6 col-xl-6 col-lg-6">
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
      <div role="tabpanel" class="tab-pane" id="tab5" aria-expanded="true" aria-labelledby="base-tab5">
        <div class="row">
          <div class="col-12 ">
            <div class="card">
              <div class="card-body">
                <div class="row"> 
                <div class="col-12 col-md-2">
                  <div class="media-list list-group">
                                          <a href="#" class="list-group-item list-group-item-action media tt_group">
                        <div class="media-left">
                          <img class="media-object rounded-circle" src="{{URL::asset('images/CB.png')}}" alt="Generic placeholder image" style="width: 30px;height: 30px;">
                        </div>
                        <div class="media-body">
                          <h5 class="list-group-item-heading" data-group="CB">Chạy bộ</h5>
                        </div>
                      </a>
                         <a href="#" class="list-group-item list-group-item-action media tt_group">
                        <div class="media-left">
                          <img class="media-object rounded-circle" src="{{URL::asset('images/CC.png')}}" alt="Generic placeholder image" style="width: 30px;height: 30px;">
                        </div>
                        <div class="media-body">
                          <h5 class="list-group-item-heading" data-group="CC">Chuyên Cần</h5>
                        </div>
                      </a>
                        <!--  <a href="#" class="list-group-item list-group-item-action media tt_group ">
                        <div class="media-left">
                          <img class="media-object rounded-circle" src="{{URL::asset('images/CGTK.png')}}" alt="Generic placeholder image" style="width: 30px;height: 30px;">
                        </div>
                        <div class="media-body">
                          <h5 class="list-group-item-heading" data-group="CGTK">Cự Ly</h5>
                        </div>
                      </a>
                         <a href="#" class="list-group-item list-group-item-action media tt_group">
                        <div class="media-left ">
                          <img class="media-object rounded-circle" src="{{URL::asset('images/GDT.png')}}" alt="Generic placeholder image" style="width: 30px;height: 30px;">
                        </div>
                        <div class="media-body">
                          <h5 class="list-group-item-heading" data-group="GDT">Đào Tạo</h5>
                        </div>
                      </a> -->
                         </div></div>
                      <div class="col-12 col-md-10 show-tt" id="CB" style="display: none">
                    <ul class="nav nav-tabs nav-linetriangle no-hover-bg">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" aria-controls="home4" aria-expanded="true">Số liệu hiện tại</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" aria-controls="profile4" aria-expanded="false">Thành tựu</a>
                      </li>
                     
                    </ul>
                    <div class="tab-content px-1 pt-1">
                      <div role="tabpanel" class="tab-pane active" id="home4" aria-labelledby="home-tab4" aria-expanded="true">
                        <p>Số vòng hiện tại : {{$chaybo->sv}} vòng</p>
                      </div>
                      <div class="tab-pane " id="profile4" role="tabpanel" aria-labelledby="profile-tab4" aria-expanded="false">
                        <p>Pudding candy canes sugar plum cookie chocolate cake powder
                          croissant. Carrot cake tiramisu danish candy cake muffin
                          croissant tart dessert. Tiramisu caramels candy canes chocolate
                          cake sweet roll liquorice icing cupcake.</p>
                      </div>
                    </div>
                      </div>
                      <div class="col-12 col-md-10 show-tt" id="CC" style="display: none">
                    <ul class="nav nav-tabs nav-linetriangle no-hover-bg">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home5" aria-controls="home4" aria-expanded="true">Số ngày đi làm</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" aria-controls="profile4" aria-expanded="false">Thành tựu</a>
                      </li>
                     
                    </ul>
                    <div class="tab-content px-1 pt-1">
                      <div role="tabpanel" class="tab-pane active" id="home5" aria-labelledby="home-tab4" aria-expanded="true">
                        <p>Số vòng hiện tại : 10 vòng</p>
                         <p>Số vòng hiện tại : 10 vòng</p>
                          <p>Số vòng hiện tại : 10 vòng</p>
                      </div>
                      <div class="tab-pane " id="profile4" role="tabpanel" aria-labelledby="profile-tab4" aria-expanded="false">
                        <p>Pudding candy canes sugar plum cookie chocolate cake powder
                          croissant. Carrot cake tiramisu danish candy cake muffin
                          croissant tart dessert. Tiramisu caramels candy canes chocolate
                          cake sweet roll liquorice icing cupcake.</p>
                      </div>
                    </div>
                      </div>
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
      SwitchThanhTuu()
  			ChartDaoTao('{{$daotao->TL}}','{{$daotao->KT}}','{{$daotao->KN}}','{{$daotao->NT}}','{{$daotao->CD}}','{{$daotao->TC}}')
			ChartLuong()
			ChartLuongThucLanh()
  	})
$('table').DataTable({
  "aLengthMenu": [[5, 50, 100, -1], [5, 50, 100, "All"]],
   "bInfo": false,
})

  </script>
  <script src="{{URL::asset('template/app-assets/vendors/js/charts/echarts/echarts.js')}}" type="text/javascript"></script>
@endsection