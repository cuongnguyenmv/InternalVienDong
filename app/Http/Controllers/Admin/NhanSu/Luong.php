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
class Luong 
{	
	function KhaiBaoDieuKhoan($rq){
		$loai = $rq->loai;
		$tien = $rq->tien;
		$dieukhoan = $rq->dieukhoan;
		if(BangKhaiBaoModel::where("loai",$loai)->count('*') == 0 )
			{
				$stt =  1;
				$madieukhoan = $loai.$stt;
			}
		else {
			$madieukhoan = BangKhaiBaoModel::where("loai",$loai)->select('madieukhoan')->orderBy('madieukhoan','DESC')->first()->madieukhoan ;
			$madieukhoan = ++$madieukhoan;
		}
	
		if(BangKhaiBaoModel::create(['madieukhoan'=>$madieukhoan,'dieukhoan'=>$dieukhoan,'tien'=>$tien,'loai'=>$loai]))
			Session::flash('status','Khai báo thành công');
		else{
			return back()->withErrors(['errors','Có lỗi xảy ra']);
		}
	}
	function BangCoDinh($manv,$madieukhoan){
		if(BangCDModel::firstOrCreate(['manv'=>$manv,'madieukhoan'=>$madieukhoan]))
			Session::flash('status','Cập nhật thành công');
		else
			return back()->withErrors(['errors','Có lỗi xảy ra']);

	}
	function BangBienDong($manv,$madieukhoan,$ngayhieuluc){
		
	}
	function ChotLuongThang($thang,$manv){
		$banga = DB::table('NHANSU_NHANVIEN_LUONG_TuoiVaoLam')->select('manv','tien');
		$bangb = DB::select(DB::raw("select b.tien
				 FROM NHANSU_NHANVIEN_BANGLUONG_CoDinh a, NHANSU_NHANVIEN_BANGLUONG_KhaiBao b 
				 where a.madieukhoan = b.madieukhoan and a.manv = '$manv'"));
		$bangbiendong = BangBDModel::join('NHANSU_NHANVIEN_BANGLUONG_KhaiBao','NHANSU_NHANVIEN_BANGLUONG_KhaiBao.madieukhoan','=','NHANSU_NHANVIEN_BANGLUONG_BienDong.madieukhoan')->where(['NHANSU_NHANVIEN_BANGLUONG_BienDong.manv'=>$manv,'NHANSU_NHANVIEN_BANGLUONG_BienDong.trangthai'=>1])->select(DB::raw("NHANSU_NHANVIEN_BANGLUONG_BienDong.manv, NHANSU_NHANVIEN_BANGLUONG_KhaiBao.loai,sum(NHANSU_NHANVIEN_BANGLUONG_KhaiBao.tien) as 'tien'"))->groupBy('NHANSU_NHANVIEN_BANGLUONG_BienDong.manv', 'NHANSU_NHANVIEN_BANGLUONG_KhaiBao.loai')->get();
		$bangc = $bangbiendong->where("loai",'C')->first()->tien;
		$bangd =  $bangbiendong->where("loai",'D')->first()->tien;
		$bange =  $bangbiendong->where("loai",'E')->first()->tien;
		$bangf =  $bangbiendong->where("loai",'F')->first()->tien;
		$bangg  = $bangbiendong->where("loai",'G')->first()->tien;
	}
}