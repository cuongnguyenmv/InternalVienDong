@extends('admin_master')
@section('body')
<div class="app-content container center-layout mt-2 mb-2">
	<div class="row">
		<div class="col-4">
			<img src="{{URL::asset('images/TaiSan')}}/{{$sp->hinh1}}" height="300px" width="100%">
			<div class="row mt-1">
				@if(!empty($sp->hinh2))
				<div class="col-4"><img src="{{URL::asset('images/TaiSan')}}/{{$sp->hinh2}}"  width="100%"></div>@endif
				@if(!empty($sp->hinh3))
				<div class="col-4"><img src="{{URL::asset('images/TaiSan')}}/{{$sp->hinh3}}"  width="100%"></div>
				@endif
        @if(!empty($sp->hinh4))
        <div class="col-4"><img src="{{URL::asset('images/TaiSan')}}/{{$sp->hinh4}}"  width="100%"></div>
        @endif
			</div>
		</div>
		<div class="col-8">
       @if(Session::has('mess'))
       <div class="alert alert-danger">
         {{Session::get('mess')}}
       </div>
       @endif
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
					  <li class="list-group-item">Mã sản phẩm: {{$sp->matl}}</li>	
                      <li class="list-group-item">Tên sản phẩm: {{$sp->tents}}</li>
                       <li class="list-group-item">Giá khởi điểm: {{number_format($sp->dinhgia)}} <i class="fa fa-joomla text-success"></i></li>
                      <li class="list-group-item">Mô tả:
                      	
                      	<p class="mt-1 ml-1"> {!! $sp->mota !!}</p>
                      </li>
                      <li class="list-group-item">Số seri  {{$sp->seri}}</li>
                    
            </ul>
            <div class="row mt-1 mb-1">
            	<div class="col-12">
            		<button class="btn btn-primary float-right " data-toggle="modal"
                          data-target="#default">Đấu giá</button>
            	</div>
            </div>
		</div>
	</div>
</div>
 <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                          aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel1">Gửi giá</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form method="post" action="{{route('dau-gia-thanh-ly')}}" id="guigia">
                                	@csrf
                                <div class="modal-body">
                                		<input type="text" name="madaugia" hidden="" value="{{$sp->madaugia}}">
                                    <input type="text" name="matl" hidden="" value="{{$sp->matl}}">
                                		<div class="form-group">
                                			<label>Giá đấu:</label>
                                			<input type="number" name="sohat" class="form-control" required="" id="gia">
                                		</div>
                                		
                                	  </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Đóng</button>
                                  <button type="button" class="btn btn-outline-primary" id="subdaugia">Đấu giá</button>
                                </div>

                              </div>
                            </div>
                          </div>
@endsection
@section('js')
<script type="text/javascript">
  $('#subdaugia').click(function(){
    event.preventDefault()
    var xacnhan = confirm('Bạn chắc chắn gửi giá là: ' + $('#gia').val() + ' Hạt')
    if(xacnhan){
       $('#guigia').submit()
     }
  })
</script>
@endsection
