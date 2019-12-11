<?php

namespace App\Http\Controllers\Admin\CSVC;

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
use App\Model\Other\ElectionEvents\DanhSachSuKienModel;
use App\Model\Other\ElectionEvents\KetQuaBinhChonModel;
use Session;
use Auth;
use DB;
use Excel;
class CoSoVatChatController extends Controller
{
	function __construct()
	{
		$this->election = new ElectionEvents;
	}
   	public function ElectionIndex(){
   		$list = DanhSachSuKienModel::get();
   		return view('Other.Election.admin.index')->with(['list'=>$list]);
   	}
   	public function pElectionIndex(Request $Request){
   		$tensk = $Request->tensk;
   		$thoigian = $Request->thoigian;
   		if(DanhSachSuKienModel::firstOrCreate(['tensk'=>$tensk,'thoigian'=>$thoigian],['tensk'=>$tensk,'thoigian'=>$thoigian]))
   		Session::flash('status','Successfull');
   		else Session::flast('error','Lỗi xảy ra');
   		return back();
   	}
   	public function resElection($id){
   		$data = DanhSachSuKienModel::where('mask',$id)->get()->first();
   		return view('Other.Election.admin.room')->with(['id'=>$id,'chude'=>$data]);
   	}
  
}
