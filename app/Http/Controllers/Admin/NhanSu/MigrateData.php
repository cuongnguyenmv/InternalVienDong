<?php
namespace App\Http\Controllers\Admin\NhanSu;
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
use Session;
use Auth;
use Carbon\Carbon;
use DB;
use Excel;
/**
 * 
 */
class MigrateData
{	

	//  mirgate data from STAFF
	public static function migrateStaff(){
		$staff = DB::connection('sqlsrv2')->table('STAFF')->get();
		// dd($staff);
		foreach($staff as $key){
			MaNhanVienModel::firstOrCreate([
				'manv'=>$key->Staff_ID
			],['manv'=>$key->Staff_ID,'hoten'=>$key->Full_name,'ngaychinhthuc'=>$key->Start_work,'ngayvaolam'=>$key->Start_work,'trangthai'=>$key->Status_WK]);
		}
	}

	// mirgate data from Cống hiến
	public static function migrateData(){
		$staff = DB::connection('sqlsrv2')->table('ThongKeDiemCongHien')->select('Staff_ID')->groupBy('Staff_ID')->get();
		foreach($staff as $key){
			MigrateData::mirgate($key->Staff_ID);
		}
	}
	//  migrate điểm cống hiến
	public static function mirgate($manv){	
			$data = \DB::connection('sqlsrv2')->select(\DB::raw("select NgayCapNhat,TraiNghiem,VanHoa FROM ThongKeDiemCongHien where Staff_ID = '$manv' group by NgayCapNhat,TraiNghiem,VanHoa order by NgayCapNhat"));
			foreach ($data as $key ) {
				ThamNienModel::firstOrCreate(
				['manv'=>$manv,'ngaycapnhat'=>$key->NgayCapNhat,'trainghiem'=>$key->TraiNghiem,'VanHoa'=>$key->VanHoa],
				['manv'=>$manv,'ngaycapnhat'=>$key->NgayCapNhat,'trainghiem'=>$key->TraiNghiem,'vanhoa'=>$key->VanHoa]
			);
			}
			
	}
	// migrate Điểm Đào Tạo
	public static function migrateDaoTao(){
		
		$data = DB::connection('sqlsrv2')->table('HOATDONGNOIBO')->get();
		foreach ($data as $key ) {
			DT_KhaiBaoModel::firstOrCreate([
				'madaotao'=>$key->Mahoatdong,
			],[
				'madaotao'=>$key->Mahoatdong,'tenhoatdong'=>$key->Tenhoatdong,'ngayhieuluc'=>$key->Ngaydienra,
				'TL'=>$key->TL,'KT'=>$key->KT,'KN'=>$key->KN,'CM'=>$key->CM,'NT'=>$key->NT,'CD'=>$key->CD,'TC'=>$key->TC,
				'ngaydexuat'=>$key->Ngaydexuat,'nguoidexuat'=>$key->Nguoidexuat
			]);
		}
	}
	public static function migrateDiemDanh(){
		$manv = MaNhanVienModel::select('manv')->get();
		$data = DB::connection('sqlsrv2')->table('DIEMDANHHOATDONG')->whereIn('Staff_ID',$manv)->get();
		foreach ($data as $key ) {
			$manv = $key->Staff_ID;
			$ngaythamgia = $key->Ngayhoatdong;
			$madaotao = $key->Mahoatdong;
			$tl = $key->TL;
			$kt = $key->KT;
			$kn = $key->KN;
			$cm = $key->CM;
			$nt = $key->NT;
			$cd = $key->CD;
			$tc = $key->TC;
			DaoTaoModel::firstOrCreate([
				'manv'=>$key->Staff_ID,'madaotao'=>$key->Mahoatdong,'ngaythamgia'=>$key->Ngayhoatdong
			],[
				'manv'=>$key->Staff_ID,'madaotao'=>$key->Mahoatdong,'ngaythamgia'=>$key->Ngayhoatdong,
				'TL'=>$tl, 'KT'=>$kt ,'KN'=>$kn,'CM'=>$cm,'NT'=>$nt,'CD'=>$cd,'TC'=>$tc
			]);
		}
	}
}
