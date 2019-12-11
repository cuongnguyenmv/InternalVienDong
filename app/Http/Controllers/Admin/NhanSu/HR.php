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
use Illuminate\Http\Request;
use App\Model\NhanSu\Luong\BangBDModel;
use App\Model\NhanSu\Luong\BangCDModel;
use App\Model\NhanSu\Luong\BangKhaiBaoModel;
use App\Model\NhanSu\Luong\LuongThangModel;

/**
 * 
 */
class HR 
{	
	function __construct()
	{
		$this->time = Today();
		$this->ngay = $this->time->format('d');
		$this->thang = $this->time->format('m');
		$this->nam = $this->time->format('Y');
	}
	function ThemNhanVien(){

	}
	function ChotLuong(){
		
	}

}