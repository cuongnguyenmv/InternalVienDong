@if(Session::has('error'))
	<div class="alert alert-danger col-12">
		{{Session::get('error') }}
		<?php Session::forget('error'); ?>
	</div>
@endif
<div class="col-4">
			<div class="card box-shadow-3">
				<div class="card-header">
				<h1 class="text-center text-bold-600">16 Vòng</h1>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<div class="row">
								<div class="col-1 text-center text-bold-600">#</div>
								<div class="col-5 text-center text-bold-600">Họ tên</div>
								<div class="col-2 text-center text-bold-600">Vòng</div>
								<div class="col-2 text-center text-bold-600">Pace</div>
								<div class="col-2 text-center text-bold-600">TTG</div>
							</div>
							<?php $stt16 = 1; $stt24 = 1; $stt32=1; ?>
							@foreach($solieu->where('sovong',16) as $key)
							<div class="row border-top">
										<div class="col-1 text-center">{{$stt16++}}</div>
										<div class="col-5 text-center">{{$key->hoten}}</div>
										<div class="col-2 text-center">{{$key->runned}}</div>
										<div class="col-2 text-center"></div>
										<div class="col-2 text-center">1</div>
							</div>@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- 24 vòng -->
		<div class="col-4">
			<div class="card box-shadow-3">
				<div class="card-header">
				<h1 class="text-center text-bold-600">24 Vòng</h1>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<div class="row">
								<div class="col-1 text-center text-bold-600">#</div>
								<div class="col-5 text-center text-bold-600">Họ tên</div>
								<div class="col-2 text-center text-bold-600">Vòng</div>
								<div class="col-2 text-center text-bold-600">Pace</div>
								<div class="col-2 text-center text-bold-600">TTG</div>
							</div>
							@foreach($solieu->where('sovong',24) as $key)
							<div class="row border-top">
										<div class="col-1 text-center">{{$stt24++}}</div>
										<div class="col-5 text-center">{{$key->hoten}}</div>
										<div class="col-2 text-center">{{$key->runned}}</div>
										<div class="col-2 text-center">01:00</div>
										<div class="col-2 text-center">1</div>
							</div>@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- 32 vòng -->
		<div class="col-4">
			<div class="card box-shadow-3">
				<div class="card-header">
				<h1 class="text-center text-bold-600">32 Vòng</h1>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<div class="row">
								<div class="col-1 text-center text-bold-600">#</div>
								<div class="col-5 text-center text-bold-600">Họ tên</div>
								<div class="col-2 text-center text-bold-600">Vòng</div>
								<div class="col-2 text-center text-bold-600">Pace</div>
								<div class="col-2 text-center text-bold-600">TTG</div>
							</div>
							@foreach($solieu->where('sovong',32) as $key)
							<div class="row border-top">
										<div class="col-1 text-center">{{$stt32++}}</div>
										<div class="col-5 text-center">{{$key->hoten}}</div>
										<div class="col-2 text-center">{{$key->runned}}</div>
										<div class="col-2 text-center">01:00</div>
										<div class="col-2 text-center">1</div>
							</div>@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end -->