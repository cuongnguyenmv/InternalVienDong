@extends('admin_master')
@section('body')
<div class="app-content container center-layout mt-2">
	<div class="row">
		<div class="col-4">
			<img src="{{URL::asset('images/TaiSan')}}/{{$sp->hinh1}}"  width="100%">
			<div class="row mt-1">
				@if(!empty($sp->hinh2))
				<div class="col-4"><img src="{{URL::asset('images/TaiSan')}}/{{$sp->hinh2}}"  width="100%"></div>
        @endif
				@if(!empty($sp->hinh3))
				<div class="col-4"><img src="{{URL::asset('images/TaiSan')}}/{{$sp->hinh3}}"  width="100%"></div>
				@endif
        @if(!empty($sp->hinh4))
        <div class="col-4"><img src="{{URL::asset('images/TaiSan')}}/{{$sp->hinh4}}"  width="100%"></div>
        @endif
			</div>
		</div>
		<div class="col-8">
			<form method="post" enctype="multipart/form-data" >
				@csrf
				@if(Session::has('status'))
							<div class="alert alert-success">
								{{Session::get('status')}}
							</div>
							@endif
							@if($errors->any())
							<div class="alert alert-danger">
								<ul>@foreach($errors as $error)
									<li>{{$error}}</li>
								</ul>@endforeach
							</div>
							@endif
			<ul class="list-group">
            <li class="list-group-item">Người gửi: {{$sp->name}}</li>  
          <li class="list-group-item">Số điện thoại: {{$sp->sdt}}</li>  
					  <li class="list-group-item">Mã sản phẩm: 
					  	<input type="text" name="matl" value="{{$sp->matl}}"  class="form-control">
					  </li>	
                      <li class="list-group-item">Tên sản phẩm: 
                      		<input type="text" name="tents" value="{{$sp->tents}}"  class="form-control">
                      	</li>
                      <li class="list-group-item">Mô tả:

                       <textarea name="mota" id="ckeditor" cols="30" rows="15" class="ckeditor form-control">
                           {!! $sp->mota !!}
                        </textarea>
                      </li>
                      <li class="list-group-item">Hình ảnh
                      	<div class="row">
                      		<input type="file" name="hinh1" class="col-3">
                      		<input type="file" name="hinh2" class="col-3">
                      		<input type="file" name="hinh3" class="col-3">
                          <input type="file" name="hinh4" class="col-3">
                      	</div>
                      
                      </li>
                      <li class="list-group-item">Số seri  
                      	<input type="text" name="seri" value="{{$sp->seri}}"  class="form-control">
                      </li>
                      <li class="list-group-item">Định giá  
                      	<input type="number" name="dinhgia" value="{{$sp->dinhgia}}"  class="form-control">
                      </li>
                      <li class="list-group-item">Mã đấu giá
                      	<input type="text" name="madaugia" value="{{$sp->madaugia}}"  class="form-control">
                      </li>
                      <li class="list-group-item">Ngày lên sàn
                      	<input type="date" name="ngaydaugia" value="{{$sp->ngaydaugia}}"  class="form-control">
                      </li>
                      <li class="list-group-item">Ngày kết thúc
                      	<input type="date" name="ngayketthuc" value="{{$sp->ngayketthuc}}"  class="form-control">
                      </li>

                    
            </ul>
            <div class="row mt-1 mb-1">
            	<div class="col-12">
            		<button class="btn btn-danger float-right col-4 ml-1" name="trangthai" value="4">Từ chối</button>
            		<button class="btn btn-success float-right col-4 " name="trangthai" value="1">Lên sàn</button>
            		
            	</div>
            </div>	</form>
		</div>
	</div>
</div>
@endsection
@section('js')

  <script src="{{URL::asset('template/app-assets/vendors/js/editors/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
@endsection