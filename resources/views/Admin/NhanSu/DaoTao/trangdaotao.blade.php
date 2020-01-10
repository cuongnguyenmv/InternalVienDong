@extends('admin_master')
@section('body')
<div class="app-content center-layout mt-2 container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
                    <ul class="nav nav-tabs nav-topline">
                      <li class="nav-item">
                        <a class="nav-link active" id="base-tab21" data-toggle="tab" aria-controls="tab21" href="#tab21" aria-expanded="true">Danh sách các hoạt động</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="base-tab22" data-toggle="tab" aria-controls="tab22" href="#tab22" aria-expanded="false">Đăng ký hoạt động nội bộ </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="base-tab23" data-toggle="tab" aria-controls="tab23" href="#tab23" aria-expanded="false">Import quá trình đào tạo</a>
                      </li>
                    </ul>
                    <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                      <div role="tabpanel" class="tab-pane active" id="tab21" aria-expanded="true" aria-labelledby="base-tab21">
                       <table class="table table-striped">
                         <thead>
                           <tr>
                            <th>Mã</th>
                            <th>Đào tạo</th>
                            <th>Ngày bắt đầu</th>
                            <th>TL</th> 
                            <th>KT</th>
                            <th>KN</th>
                            <th>CM</th>
                            <th>CD</th>
                            <th>TC</th>
                            <th>NT</th>  
                           </tr>
                         </thead>
                         <tbody>
                          @foreach($daotao as $key)
                           <tr>
                             <td>{{$key->madaotao}}</td>
                             <td>{{$key->tenhoatdong}}</td>
                             <td>{{Date('d-m-Y',strtotime($key->ngayhieuluc))}}</td>
                              <td>{{$key->TL}}</td>
                              <td>{{$key->KT}}</td>
                              <td>{{$key->KN}}</td>
                              <td>{{$key->CM}}</td>
                              <td>{{$key->CD}}</td>
                              <td>{{$key->TC}}</td>
                              <td>{{$key->NT}}</td>
                           </tr>
                           @endforeach
                         </tbody>
                       </table>
                      </div>
                      <div class="tab-pane" id="tab22" aria-labelledby="base-tab22">
                        <p>Sugar plum tootsie roll biscuit caramels. Liquorice brownie
                          pastry cotton candy oat cake fruitcake jelly chupa chups.
                          Pudding caramels pastry powder cake soufflé wafer caramels.
                          Jelly-o pie cupcake.</p>
                      </div>
                      <div class="tab-pane" id="tab23" aria-labelledby="base-tab23">
                       <div class="row">
                         <div class="col-12">
                          <form method="POST" action="{{route('import-diem-dao-tao')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <input type="file" name="file" >
                              <button class="btn btn-success float-right mb-2">Import</button>
                            </div>
                            
                          </form>
                           
                         </div>
                       </div>
                      </div>
                    </div>
                  </div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
  $(document).ready(function(){
    $("table").DataTable({
      "order": [[ 3, "desc" ]]
    })
  })
</script>
@endsection