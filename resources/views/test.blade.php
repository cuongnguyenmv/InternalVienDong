<form method="post" action="{{Route('manv')}}" enctype="multipart/form-data">
	@csrf
	<input type="file" name="file">
	<button>Nhap</button>
</form>