<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/','PublicController@Index')->name('index');
Route::get('nhan-vien/{idcard}','HomeController@ThongTinCaNhanSearch');
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
		
	});
});
Auth::routes();

Route::get('test','Admin\NhanSu\NhanSuController@test');

Route::get('/',function(){
	return 'YOU HAVE BEEN HACKED !!! ';
});
