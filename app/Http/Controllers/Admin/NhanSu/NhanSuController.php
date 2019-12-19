<?php

namespace App\Http\Controllers\Admin\NhanSu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NhanSu\DonViModel;
use App\Model\NhanSu\DangKyHatNhanModel;
use App\Model\NhanSu\NhanVienModel;
use App\Model\NhanSu\QuaTrinhCongHienModel;
use App\Model\NhanSu\ThongKeCongHienModel;
use App\Model\NhanSu\MaNhanVienModel;
use App\Model\NhanSu\CongHien\DT_KhaiBaoModel;
use App\Model\NhanSu\CongHien\TG_KhaiBaoModel;
use App\Model\NhanSu\CongHien\DaoTaoModel;
use App\Model\NhanSu\CongHien\TangGiamModel;
use App\Model\NhanSu\CongHien\ThamNienModel;
use App\Model\NhanSu\Luong\BangBDModel;
use App\Model\NhanSu\Luong\BangCDModel;
use App\Model\NhanSu\Luong\BangKhaiBaoModel;
use App\Model\NhanSu\Luong\LuongThangModel;
use Session;
use Auth;
use DB;
use ImportExcel;
use Excel;
class NhanSuController extends Controller
{
	function __construct()
	{
		$this->mess = [
			'required' => 'Kiểm tra các trường :Attribute không được bỏ trống',
			'image' => 'phải là hình ảnh',
			'mimes' => 'Chỉ chấp nhận đuôi .jpg|jpeg|png',
			'max' => 'Hình không lớn hơn 4MB'
		];
	}
	public function vHoSoNhanVien(){
		$hoso = 1;
		return view('Admin.NhanSu.infonv')->with(['hoso'=>$hoso]);
	}
	public function vCapNhatNhanSu(){
		return view('Admin.NhanSu.addNV');
	}
	public function pCapNhatNhanSu(Request $Request){

	}
	public function vKhaiBaoLuong(){
		$dieukhoan = BangKhaiBaoModel::get();
		return view ("Admin.NhanSu.khaibaoluong",compact('dieukhoan'));
	}
	public function pKhaiBaoLuong(Request $Request){
		$mess = [
			'required'=>"Không bỏ trống các trường bắt buộc",
			'tien.min' => "Số tiền phải lớn hơn 0"
		];
		$Request->validate([
			'dieukhoan' =>'required|string',
			'loai' => 'required',
			'tien' => 'required|min:1'
		],$mess);
		$luong = new Luong;
		$luong->KhaiBaoDieuKhoan($Request);
		return back();
	}
	public function vBangLuongNhanVien(){
		$luongthang = LuongThangModel::select('thang')->groupBy('thang')->orderBy('thang',"DESC")->get();
		return view('Admin.NhanSu.luongnhanvien')->with(['luongthang'=>$luongthang]);
	}
	public function vThongKeLuongTheoThang($thang){
		$luongthang = DB::select(DB::raw("select a.manv,a.hoten,b.banga,b.bangb,b.bangc,b.bangd,b.bange,b.bangf,b.bangg,b.luongct,b.luongthuclanh,b.thang
			from NHANSU_MaNhanVien a ,  NHANSU_NHANVIEN_BANGLUONG_Thang b
			where a.manv = b.manv and b.thang ='$thang'"));
		return view('Admin.NhanSu.ajax.bangluongtheothang',compact('luongthang'));
	}
	public function ChotLuong(){
		$luong = new Luong;
		$luong->ChotLuongThang(7,'170605195A');
	}
	public function ViewInfo($manv){
		$thongtincanhan = MaNhanVienModel::with(['ThongTiNhanVien'])->where('manv',$manv)->get()->first();

		return view('Admin.NhanSu.ajax.detailinfo');
	}
	// public function test(Request $req){
	// 		$file = $req->file;
	// 		Excel::load($file,function($reader){
	// 			$nv = $reader->all();
	// 			foreach ($nv as $manv) {
	// 				// NhanSuController::updateCongHienHienTai($manv->manv);
	// 			}
	// 		});
	// }
	public function test(Request $Request){
		$file = $Request->file;
		// Excel::selectSheets('Sheet1')->load($file,function($reader){
		// 	$data = $reader->all();
		// 	// dd($data);
		// 	foreach ($data as $key ) {
		// 		TG_KhaiBaoModel::updateOrCreate(['matg'=>$key->matg],
		// 			['matg'=>$key->matg,'tentg'=>$key->noidung,'ngayhieuluc'=>$key->ngay,'diemtg'=>$key->diem
		// 		]);
		// 	}
		// });
		Excel::selectSheets('Sheet2')->load($file,function($reader){
			$data = $reader->all();
			// dd($data);
			foreach ($data as $key ) {
				TangGiamModel::updateOrCreate(
					['manv'=>$key->manv,'matg'=>$key->matg,'ngayhieuluc'=>$key->ngay],
					['manv'=>$key->manv,'matg'=>$key->matg,'ngayhieuluc'=>$key->ngay,'diem'=>$key->diem]
				);
			}
		});
	}
	public function updateThang12($manv){
		$last = ThamNienModel::where('manv',$manv)->orderBy('ngaycapnhat','DESC')->get()->first();
			ThamNienModel::updateOrCreate(['manv'=>$last->manv,'ngaycapnhat'=>'2019-12-01'],
					[	'manv'=>$last->manv,
						'ngaycapnhat'=>'2019-12-01',
						'trainghiem'=>$last->trainghiem,
						'vanhoa'=>$last->vanhoa +100
					]);
	}
	public function updateCongHienHienTai($manv){
		 $daotao = DaoTaoModel::where('manv',$manv)->select('Tong')->sum('Tong');
		 $conghien = ThamNienModel::where('manv',$manv)->orderBy('ngaycapnhat','DESC')->get()->first();
		 $trainghiem = $conghien->trainghiem;
		 $vanhoa = $conghien->vanhoa;
		ThongKeCongHienModel::updateOrCreate(['manv'=>$manv],['trainghiem'=>$trainghiem,'vanhoa'=>$vanhoa,'daotao'=>$daotao]);
	}
}
