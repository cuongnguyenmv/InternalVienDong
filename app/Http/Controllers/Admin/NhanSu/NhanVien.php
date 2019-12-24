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
use App\Model\KeToan\QuyDoiModel;
use Session;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
/**
 * 
 */
class NhanVien 
{	
	public $manv ;
	function __construct($manv)
	{	
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->manv = $manv;
	}
	function getInfo(){
		return  MaNhanVienModel::where('manv',$this->manv)->orWhere('idcard',$this->manv)->get()->first();
	}
	function MucQuyDoiHat(){
		$manv = MaNhanVienModel::where('manv',$this->manv)->orWhere('idcard',$this->manv)->get()->first()->manv;
		$diemch = ThongKeCongHienModel::where('manv',$manv)->get()->first()->tongdiem;
		$mucquydoi = QuyDoiModel::where('mucconghien','<=',$diemch)->orderBy('mucconghien','DESC')->get()->first();
		return ['diemch'=>$diemch,'mucquydoi'=>round($mucquydoi->tylethem,2)];
	}
	function getLuong(){
		
	}
	function addNhanVien(){

	}
	function updateNhanVien(){

	}
	function updateCongHien(){
			NhanVien::calcThamNien();
			$curthamnien = NhanVien::followThamNien();
			$curvanhoa = $curthamnien->vanhoa;
			$curtrainghiem = $curthamnien->trainghiem;
			$curdaotao = NhanVien::followDaoTao();
			$curtangiam = NhanVien::followTangGiam();
			ThongKeCongHienModel::updateOrCreate(['manv'=>$this->manv],['vanhoa'=>$curvanhoa,'trainghiem'=>$curtrainghiem,'daotao'=>$curdaotao,'tanggiam'=>$curtangiam]);
	}
	function followThamNien(){
		return ThamNienModel::where('manv',$this->manv)->orderBy('ngaycapnhat',"DESC")->get()->first();
	}
	function calcThamNien(){
		$info = NhanVien::getInfo();
		$thamnien = NhanVien::followThamNien();
		if(ThamNienModel::where("manv",$this->manv)->get()->isEmpty()) 
			$ngaycapnhat = Carbon::createFromFormat('Y-m-d',$info->ngaychinhthuc);
		else 
			$ngaycapnhat =  Carbon::createFromFormat('Y-m-d',$thamnien->ngaycapnhat)->modify('+1 month');
		while ($ngaycapnhat < Today()) {
			// Trừ ngày 1/11/2019 công ty nghĩ 1 tháng
			if($ngaycapnhat != Carbon::createFromFormat('Y-m-d','2019-11-01'))
			ThamNienModel::firstOrCreate(['manv'=>$this->manv,'ngaycapnhat'=>$ngaycapnhat],['manv'=>$this->manv,'ngaycapnhat'=>$ngaycapnhat,'trainghiem'=>$thamnien->trainghiem,'vanhoa'=>$thamnien->vanhoa+100]);
			else 
				ThamNienModel::firstOrCreate(['manv'=>$this->manv,'ngaycapnhat'=>$ngaycapnhat],['manv'=>$this->manv,'ngaycapnhat'=>$ngaycapnhat,'trainghiem'=>$thamnien->trainghiem,'vanhoa'=>$thamnien->vanhoa]);
			 $ngaycapnhat->modify('+1 month');
		}
	}
	function followDaoTao(){
		return DaoTaoModel::where('manv',$this->manv)->select('manv','tong')->sum('tong');
	}
	function followTangGiam(){
		return TangGiamModel::where('manv',$this->manv)->select('manv','diem')->sum('diem');
	}
}
?>