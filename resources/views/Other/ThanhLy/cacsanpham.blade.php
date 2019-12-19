@extends('admin_master')
@section('body')
<div class="app-content container center-layout mt-2">
	<div class="row">
		@foreach($sp as $key)
		<div class="col-6 col-md-3 col-lg-3">
			<div class="card">
				<div class="card-header">
					<a href="../san-pham-thanh-ly/{{$key->matl}}"><img src="{{URL::asset('images/TaiSan')}}/{{$key->hinh1}}"  width="100%" height="100%"></a>
				</div>
				<div class="card-body">
					<div class="card-content">
						<div class="row">
							<div class="col-12" style="min-height: 100px; max-height: 100px">
								<a href="../san-pham-thanh-ly/{{$key->matl}}" >
									@if(strlen($key->tents) > 27)
									<p class="h4">{{substr($key->tents,0,27)}} ...</p></a>
									@else
									<p class="h4">{{$key->tents}}</p></a>
									@endif

							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<span class="h5 float-left">Giá tiền:</span>
								<span class="h5 text-bold-600 float-right ">{{number_format($key->dinhgia)}} <i class="fa fa-joomla text-success"></i></span>
								
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		@endforeach

	</div>
</div>
@endsection
