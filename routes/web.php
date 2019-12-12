<?php
use App\User;
use App\Model\NhanSu\MaNhanVienModel;
use App\Model\NhanSu\NhanVienModel;
use App\Model\NhanSu\CongHien\DaoTaoModel;
use App\Model\NhanSu\CongHien\DT_KhaiBaoModel;
use App\Model\NhanSu\CongHien\TangGiamModel;
use App\Model\NhanSu\CongHien\TG_KhaiBaoModel;
use App\Model\NhanSu\CongHien\ThamNienModel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','PublicController@Index')->name('index');
Route::get('nhan-vien/{idcard}','HomeController@ThongTinCaNhanSearch');
Route::get('san-pham-thanh-ly','HomeController@SanPhamThanhLy')->name('cac-san-pham-tl');
Route::get('san-pham-thanh-ly/{matl}','HomeController@ChiTietSanPhamThanhLy');
Route::get('dang-ky-thanh-ly','HomeController@NguoiDungThanhLy')->name('dang-ky-thanh-ly');
Route::post('dang-ky-thanh-ly','HomeController@pNguoiDungThanhLy');
Route::post('dau-gia-thanh-ly','HomeController@GuiDauGia')->name('dau-gia-thanh-ly');
Route::group(['prefix'=>'admin'],function(){
	Route::get('news','Admin\AdminController@dashboard');

	Route::group(['prefix'=>'nhan-su'],function(){
		Route::get('/ho-so-nv','Admin\NhanSu\NhanSuController@vHoSoNhanVien')->name('v-ho-so-nv');
		Route::get('/ho-so-nv/{manv}','Admin\NhanSu\NhanSuController@ViewInfo');
		Route::get('/cap-nhat-nv','Admin\NhanSu\NhanSuController@vCapNhatNhanSu')->name('v-them-nv');
		Route::post('/cap-nhat-nv','Admin\NhanSu\NhanSuController@pCapNhatNhanSu');
		// Lương
		Route::get('/khai-bao-luong','Admin\NhanSu\NhanSuController@vKhaiBaoLuong')->name('v-khai-bao-luong');
		Route::post('/khai-bao-luong','Admin\NhanSu\NhanSuController@pKhaiBaoLuong');
		Route::get('/luong-nhan-vien','Admin\NhanSu\NhanSuController@vBangLuongNhanVien')->name('v-bang-luong-nv');
		Route::get('/luong-nhan-vien/{thang}','Admin\NhanSu\NhanSuController@vThongKeLuongTheoThang');
		Route::get('/cap-nhat-luong-bd','Admin\NhanSu\NhanSuController@vCapNhatLuongBienDong');
		Route::post('/cap-nhat-luong-bd','Admin\NhanSu\NhanSuController@pCapNhatBienDong');
		Route::get('chot-luong','Admin\NhanSu\NhanSuController@ChotLuong');
	});
	Route::group(['prefix'=>'csvc'],function(){
		Route::get('duyet-tl','Admin\CSVC\CoSoVatChatController@ChiTietThanhLy')->name('duyet-tl');
		Route::get('duyet-tl/{matl}','Admin\CSVC\CoSoVatChatController@DuyetThanhLy');
		Route::post('duyet-tl/{matl}','Admin\CSVC\CoSoVatChatController@pDuyetThanhLy');
	});
});
Auth::routes();

Route::get('test','Admin\NhanSu\NhanSuController@test');


// migrate data
Route::get('migrate',function(){
	$data = \DB::connection('sqlsrv2')->table('users')->get();
	foreach ($data as $key ) {
		User::updateOrCreate(['email'=>$key->email],[
			'name' => $key->name,
			'email' => $key->email,
			'password' => $key->password,
			'remember_token' => $key->remember_token,
			'manv' => $key->Manv,
		]);
	}
});
Route::get('migrate2',function(){
	$data = \DB::connection('sqlsrv2')->table('STAFF')->get();
	foreach ($data as $key ) {
		MaNhanVienModel::updateOrCreate(['manv'=>$key->Staff_ID],[
			'manv'=>$key->Staff_ID,
			'hoten'=>$key->Full_name,
			'idcard'=>$key->Id_Card,
			'ngaychinhthuc'=>$key->Start_work,
			'ngayvaolam' =>$key->Start_work,
			'congty' => $key->Company,
		]);
	}
});

Route::get('migrate3',function(){
	$data = \DB::connection('sqlsrv2')->table('HOATDONGNOIBO')->get();
	foreach($data as $key){
		DT_KhaiBaoModel::updateOrCreate(['madaotao'=>$key->Mahoatdong],[
		'madaotao' => $key->Mahoatdong,
		'tenhoatdong' => $key->Tenhoatdong,
		'ngayhieuluc' => $key->Ngaydienra,
		'TL' => $key->TL,
		'KT' => $key->KT,
		'KN' => $key->KN,
		'CM' => $key->CM,
		'NT' => $key->NT,
		'CD' => $key->CD,
		'TC' => $key->TC,
		]);
	}
});

Route::get('migrate4',function(){
	$data = \DB::connection('sqlsrv2')->table('DIEMDANHHOATDONG')->get();
	foreach($data as $key){
		$ins = new DaoTaoModel;
		$ins->madaotao = $key->Mahoatdong;
		$ins->manv = $key->Staff_ID;
		$ins->ngaythamgia = $key->Ngayhoatdong;
		$ins->TL = $key->TL;
		$ins->KT = $key->KT;
		$ins->KN = $key->KN;
		$ins->CM = $key->CM;
		$ins->NT = $key->NT;
		$ins->CD = $key->CD;
		$ins->TC = $key->TC;
		$ins->save();
	}
});

Route::get('migrate5',function(){
	$data = \DB::connection('sqlsrv2')->select(\DB::raw("select * FROM STAFF"));
	foreach ($data as $key ) {
		NhanVienModel::updateOrCreate(['manv'=>$key->Staff_ID],
			[
				'manv'=>$key->Staff_ID,
				'tennv'=>$key->Full_name,
				'sdt'=>$key->DTDD,
				'congty'=>$key->Company,
				'ngaysinh'=>$key->DOB

		]);
	}
});
