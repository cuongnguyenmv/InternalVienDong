@extends('admin_master')
@section('body')
<div class="app-content container-fluid center-layout mt-2">
	<div class="row">
		<div class="card col-12">
			<div class="card-header">
				<h2 class="card-title">Bảng lương nhân viên theo tháng</h2>
				<ul class="nav nav-tabs nav-justified nav-linetriangle mt-1 col-6">
					@foreach($luongthang as $key)
                      <li class="nav-item">
                        <a class="nav-link " id="active-tab1" data-toggle="tab" data-thang = "{{$key->thang}}" href="#active1" aria-controls="active1" aria-expanded="true">Lương tháng {{$key->thang}}</a>
                      </li>@endforeach
                    </ul>
			</div>
			<div class="card-body">
			<div class="col-12" id="show">
				
			</div>
		</div>
		</div>

	</div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{URL::asset('js/other.js')}}"></script>
<script type="text/javascript">
	
	viewLuongTheoThang()
</script>
@endsection