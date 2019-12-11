<?php $i=1 ; $status = array('Nghỉ làm','Thử việc','Chính thức','Hạt Nhân')?>
  <table class="table table-striped responsive table-bordered" >
            <thead>
              <tr>
                <th>STT</th>
                <th>Mã nhân viên</th>
                <th>Nhân viên</th>
                <th>Ngày vào làm</th>
                <th>Bộ phận</th>
                <th>Loại</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody >
@foreach($data as $key)
<tr>
	<td>{{$i++}}</td>
	<td>{{$key->manv}}</td>
	<td  data-toggle="modal" data-target="#default">{{$key->tennv}}</td>
	<td>{{date('d-m-Y',strtotime($key->ngayvaolam))}}</td>
	<td>{{$key->tendv}}</td>
	<td>{{$status[$key->trangthai]}}</td>
	<td>
       <span class="dropdown">
         <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
         <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
         	<a href="#" class="dropdown-item"><i class="ft-edit-2"></i>Edit</a>
             <a href="#" class="dropdown-item"><i class="ft-trash-2 "></i> Delete</a>

         </span>
       </span>
     </td>
</tr>
@endforeach
  </tbody>
          </table>