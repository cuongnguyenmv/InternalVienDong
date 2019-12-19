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
use App\Model\ThanhLy\DauGiaThanhLyModel;
use App\Model\ThanhLy\TaiSanThanhLyModel;          
use Session;
use Auth;
use DB;
use Excel;
class CoSoVatChatController extends Controller
{
	function __construct()
	{
       $this->middleware('csvc-auth');
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
      // Thanh Lý
      public function ChiTietThanhLy(){
         $sp = \DB::select("select a.* , b.sdt , c.email, c.name 
from CSVC_TAISAN_ThanhLy a, NHANSU_Nhanvien b, users c
where b.manv = c.manv and a.nguongoc = b.manv");
         return view('Other.ThanhLy.Admin.taisandoiduyet')->with(['sp'=>$sp]);
      }
      public function DuyetThanhLy($matl){
         $sp = collect(\DB::select("select a.* , b.sdt , c.email, c.name 
            from CSVC_TAISAN_ThanhLy a, NHANSU_Nhanvien b, users c
            where a.matl = '$matl' and b.manv = c.manv and a.nguongoc = b.manv"))->first();
   
         return view('Other.ThanhLy.Admin.duyetthanhly')->with(['sp'=>$sp]);
      }
      public function pDuyetThanhLy($matl, Request $Request){
         $mess = [
            'required' => 'Không bỏ trống các trường',
            'image' => 'phải là hình ảnh',
            'mimes' => 'Chỉ chấp nhận đuôi .jpg|jpeg|png',
            'max' => 'Hình không lớn hơn 4MB'
        ];
        $Request->validate([
            'matl'=>'required',
            'tents'=>'required|string',
            'mota' =>'required'
           
        ],$mess);
         $data = $Request->all();
         if($Request->has('hinh1')){
          $hinh = $Request->hinh1->getClientOriginalName();
          $extension = substr($hinh, strpos($hinh, "."));
          $hinh = str_replace($hinh, 'ThanhLy/'.$data['matl'].'1'.$extension, $hinh);
          $Request->hinh1->move('images/TaiSan/ThanhLy',$hinh); 
          $data['hinh1'] = $hinh;
         }
          if($Request->has('hinh2')){
            $hinh2 = $Request->hinh2->getClientOriginalName();
            $extension = substr($hinh2, strpos($hinh2, "."));
            $hinh2 = str_replace($hinh2, 'ThanhLy/'.$data['matl'].'2'.$extension, $hinh2);
            $Request->hinh2->move('images/TaiSan/ThanhLy',$hinh2); 
            $data['hinh2'] = $hinh2;
          }
          if($Request->has('hinh3')){
            $hinh3 = $Request->hinh3->getClientOriginalName();
            $extension = substr($hinh3, strpos($hinh3, "."));
            $hinh3 = str_replace($hinh3, 'ThanhLy/'.$data['matl'].'3'.$extension, $hinh3);
            $Request->hinh3->move('images/TaiSan/ThanhLy',$hinh3); 
            $data['hinh3'] = $hinh3;
          }
           if($Request->has('hinh4')){
            $hinh4 = $Request->hinh4->getClientOriginalName();
            $extension = substr($hinh4, strpos($hinh4, "."));
            $hinh4 = str_replace($hinh4, 'ThanhLy/'.$data['matl'].'4'.$extension, $hinh4);
            $Request->hinh4->move('images/TaiSan/ThanhLy',$hinh4); 
            $data['hinh4'] = $hinh4;
          }
          if(TaiSanThanhLyModel::updateOrCreate(['matl'=>$matl],$data))
            Session::flash('status','Đã cập nhật lên sàn');
         return back();
      }
      public function TheoDoiThanhLy(){
        $sp = TaiSanThanhLyModel::where('trangthai',1)->get();
        return view('Other.ThanhLy.Admin.ketquathanhly')->with(['sp'=>$sp]);
      }
      public function KetQuaDauGia($madaugia){
        $info = DB::select("select  a.*,b.manv,b.sohat,c.tennv FROM CSVC_TAISAN_ThanhLy a, CSVC_TAISAN_DauGiaThanhLy b, NHANSU_Nhanvien c
          where a.madaugia  = b.madaugia and a.matl = b.matl and b.manv = c.manv and b.madaugia = '$madaugia' and b.trangthai = 0 order by sohat
          ");
        $sp = TaiSanThanhLyModel::where('madaugia',$madaugia)->get()->first();
        return view('Other.ThanhLy.Admin.ketquathanhly')->with(['info'=>$info,'sp'=>$sp]);
      }
      public function NhanDauGia(){
        return view('Other.ThanhLy.Admin.nhandaugia');
      }
      public function pNhanDauGia(Request $Request){
        
      }
}
