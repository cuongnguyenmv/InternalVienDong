<?php
namespace App\Http\Controllers\Admin\NhanSu;
use App\Model\NhanSu\DonViModel;
use App\Model\NhanSu\DangKyHatNhanModel;
use App\Model\NhanSu\NhanVienModel;
use App\Model\NhanSu\QuaTrinhCongHienModel;
use App\Model\NhanSu\ThongKeCongHienModel;
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
class DaoTao 
{	
	public static function import_GioDaoTao($file)
	{
			Excel::selectSheets('Sheet1')->load($file,function($reader){
				dd($reader->take(100)->get());
			});

	}
	public static function migrate(){
		$data = DB::connection('sqlsrv2')->table('DIEMDANHHOATDONG')->get();
		foreach ($data as $key) {
			$ins = new DaoTaoModel;
			$ins->manv = $key->Staff_ID;
			$ins->ngaythamgia = $key->Ngayhoatdong;
			$ins->madaotao = $key->Mahoatdong;
			$ins->TL = $key->TL;
			$ins->KT = $key->KT;
			$ins->KN = $key->KN;
			$ins->CM = $key->CM;
			$ins->NT = $key->NT;
			$ins->CD = $key->CD;
			$ins->TC = $key->TC;
			$ins->save();
		}
	}
}
