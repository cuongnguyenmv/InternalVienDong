@extends('admin_master')
@section('body')
<div class="app-content container center-layout mt-2">
	<div class="row">
		@foreach($sp as $key)
		<div class="col-3 ">
			<div class="card">
				<div class="card-header">
					<a href="../san-pham-thanh-ly/{{$key->matl}}"><img src="{{URL::asset('images/TaiSan')}}/{{$key->hinh1}}"  width="100%" height="180px"></a>
				</div>
				<div class="card-body">
					<div class="card-content">
						<a href="../san-pham-thanh-ly/{{$key->matl}}"><p class="h3">{{$key->tents}}</p></a>
						<p class="float-left">Giá tiền:{{number_format($key->dinhgia)}}</p>
					</div>
				</div>
			</div>
		</div>
		@endforeach

	</div>
</div>
@endsection
