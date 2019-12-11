<table class="table table-striped" id="table-luong">
	<thead>
		<tr>
			<th>STT</th>
			<th>ID</th>
			<th>Họ và tên</th>
			<th>A</th>
			<th>B</th>
			<th>C</th>
			<th>D</th>
			<th>E</th>
			<th>F</th>
			<th>G</th>
			<th>Tổng</th>
			<th>Thực lãnh</th>
		</tr>
	</thead>
	<tbody><?php $i = 1; ?>
		@foreach($luongthang as $key)
		<tr>
			<td>{{$i++}}</td>
			<td>{{$key->manv}}</td>
			<td>{{$key->hoten}}</td>
			<td>{{number_format($key->banga)}}</td>
			<td>{{number_format($key->bangb)}}</td>
			<td>{{number_format($key->bangc)}}</td>
			<td>{{number_format($key->bangd)}}</td>
			<td>{{number_format($key->bange)}}</td>
			<td>{{number_format($key->bangf)}}</td>
			<td>{{number_format($key->bangg)}}</td>
			<td>{{number_format($key->luongct)}}</td>
			<td>{{number_format($key->luongthuclanh)}}</td>
		</tr>
		@endforeach
	</tbody>
</table>