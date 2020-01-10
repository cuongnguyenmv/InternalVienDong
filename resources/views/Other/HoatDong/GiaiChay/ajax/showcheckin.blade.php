<div class="col-12">
	<div class="card ">
		<div class="card-header">
			<p class="card-title">Danh sách check in tham gia</p>
		</div>
		<div class="card-body">
			<table class="table table-tripped" id="tblcheckin">
				<?php $stt = 1; ?>
				<thead>
					<tr>
						<th>STT</th>
						<th>Mã</th>
						<th>Họ tên</th>
						<th>Mục tiêu (Số vòng)</th>
						<th>Thời gian check in</th>
					</tr>
				</thead>
				<tbody>

					@foreach($checked as $key)
					<tr>
						<td>{{$stt++}}</td>
						<td>{{$key->madk}}</td>
						<td>{{$key->hoten}}</td>
						<td>{{$key->sovong}}</td>
						<td>{{Date('H:i d-m-Y',strtotime($key->checkin))}}</td>
					</tr>@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>