@extends('admin_master')
@section('body')
<div class="app-content container center-layout mt-2">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h1 class=" text-danger">{{$tintuc->tieude}}</h1>
					<i class="fa fa-clock-o"></i> {{Date('d-m-Y',strtotime($tintuc->ngaydang))}}
				</div>
				{!! $tintuc->noidung !!}
			</div>
		</div>
	</div>
</div>
@endsection