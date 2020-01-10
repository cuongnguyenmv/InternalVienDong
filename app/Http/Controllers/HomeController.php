<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\NhanSu\NhanVien;
use Session;
use App\Model\ThanhLy\DauGiaThanhLyModel;
use App\Model\ThanhLy\TaiSanThanhLyModel;
use App\Model\NhanSu\MaNhanVienModel;
use App\Model\NhanSu\ThongKeCongHienModel;
use App\Model\KeToan\QuyDoiModel;
use App\Model\KeToan\GiaoDichModel;
use App\User;
use App\NhanSu\CongHien\DaoTaoModel;
use App\Model\Other\BoPhieuDongCap\KetQuaBoPhieuModel;
use App\Model\Other\BoPhieuDongCap\KiBoPhieuModel;
use Auth;
use App\Model\Other\TinTuc\BaiVietModel;
use App\Model\NhanSu\HatNhan\ThanhVienHatNhanModel;
use App\Model\NhanSu\HatNhan\HocKiHatNhanModel;
use Carbon\Carbon;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    
        return view('home')->with(['tintuc'=>$tintuc]);
    }
    public function ThongTinCaNhanSearch($idcard){
        $nv = new NhanVien($idcard);
        $info = $nv->getInfo();
        $mucquydoi = $nv->MucQuyDoiHat();
        // dd($mucquydoi['diemch']);
        return ['info'=>$info,'mucquydoi'=>$mucquydoi['mucquydoi'],'diemch'=>$mucquydoi['diemch']];
        // return view('Other.NhanVien.thongtincanhan')->with(['']);
    }
    public function SanPhamThanhLy(){
    
        $sp = TaiSanThanhLyModel::where('trangthai',1)->get();
        return view('Other.ThanhLy.cacsanpham')->with(['sp'=>$sp]);
    }
    public function ChiTietSanPhamThanhLy($matl){
    //     $sp =  collect(\DB::select("
    // select a.*, b.email,b.sdt,c.hoten FROM CSVC_TAISAN_ThanhLy a , NHANSU_Nhanvien b,  NHANSU_MaNhanVien c
    // where a.nguongoc = b.manv and b.manv = c.manv and a.trangthai = 1"))->first();
        $sp = TaiSanThanhLyModel::where(['trangthai'=>1,'matl'=>$matl])->get()->first();
        return view('Other.ThanhLy.sanpham',compact('sp'));
    }
    public function NguoiDungThanhLy(){
        $manv = Auth::User()->manv;
        $info = collect(\DB::select("select b.manv,b.name,b.email,a.sdt
                from NHANSU_Nhanvien a, users b
                where a.manv = b.manv and a.manv = '$manv'"))->first();
        if(TaiSanThanhLyModel::count('*') <= 0 )
            $matl = 'CN0';
            else{
                $count = TaiSanThanhLyModel::select('matl','id')->orderBy('id','DESC')->get()->first();
                $matl = 'CN' . ++$count->id ;

            } 
        return view('Other.ThanhLy.dangthanhly')->with(['info'=>$info,'matl'=>$matl]);
    }
    public function pNguoiDungThanhLy(Request $Request){
        $mess = [
            'required' => 'Không bỏ trống các trường',
            'image' => 'phải là hình ảnh',
            'mimes' => 'Chỉ chấp nhận đuôi .jpg|jpeg|png',
            'max' => 'Hình không lớn hơn 4MB'
        ];
        $Request->validate([
            'matl'=>'required',
            'tents'=>'required|string',
            'mota' =>'required',
            'hinh1' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        ],$mess);
          $data = $Request->all();
        
          $hinh = $Request->hinh1->getClientOriginalName();
          $extension = substr($hinh, strpos($hinh, "."));
          $hinh = str_replace($hinh, 'ThanhLy/'.$data['matl'].'1'.$extension, $hinh);
          $Request->hinh1->move('images/TaiSan/ThanhLy',$hinh); 
          $data['hinh1'] = $hinh;
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
        if(TaiSanThanhLyModel::create($data))
            Session::flash('status','Đăng thành công quá trình thỏa thuận bắt đầu');
        return back();
    }
    public function GuiDauGia(Request $Request){
      $mess = [
        'required'=>'Không được bỏ trống',
        'min' => 'Số hạt không nhỏ hơn 0'
      ];
      $Request->validate([
        'matl'=>'required',
        'madaugia'=>'required',
        'sohat'=>'required|min:1'
      ],$mess);
      $data = $Request->all();
      // $data['trangthai'] = 4;
      $manv =Auth::User()->manv;
      $data['manv'] = $manv;
      $sohat = Auth::User()->sohat;
      $mathangmua = \DB::select("select DISTINCT madaugia,manv,max(sohat) as 'sohat'
 from CSVC_TAISAN_DauGiaThanhLy where manv = '$manv' and and trangthai = 0
 group by madaugia,manv");
      $dangmua = 0;
      foreach ($mathangmua as $key) {
        $dangmua += $key->sohat;   
      }
      $conlai = $sohat - $dangmua;
      if($conlai < $Request->sohat )
      {
        Session::flash('mess','Số hạt không đủ');
        return back();
      }
      if(DauGiaThanhLyModel::create($data))
        Session::flash('status','Gửi giá thành công');
      return back();
    }
    public function NhanMocCongHien(){
      $manv = Auth::User()->manv;
      if(ThongKeCongHienModel::where('manv',$manv)->get()->isNotEmpty())
      $diemtong = ThongKeCongHienModel::where('manv',$manv)->get()->first()->tongdiem;
      else $diemtong = 0;
      $mucconghien = QuyDoiModel::where('mucconghien','<=',$diemtong)->get();
      foreach ($mucconghien as $key ) {
          GiaoDichModel::firstOrCreate(['phiengd'=>$key->maqd,'manv'=>$manv],[
            'noidung'=>$key->noidung,'sohat'=>$key->sohat,'trangthai'=>3,'nguoichuyen'=>"Hệ thống quy đổi"
          ]);
      }
      Session::flash('status','Nhận thưởng thành công');
      return back();
    }
    public function ViTienCaNhan(){
      $manv = Auth::User()->manv;
      $history = GiaoDichModel::where('manv',$manv)->orderBy('created_at','DESC')->get();
      return view('Other.NhanVien.vitien')->with(['history'=>$history]);
    }
    public function MyProfile(){
      $manv = Auth::User()->manv;
      $idcard = MaNhanVienModel::where('manv',$manv)->select('idcard')->get()->first()->idcard;
      $conghien = ThongKeCongHienModel::where('manv',$manv)->get()->first();
      $info = collect(\DB::select(" select a.*,b.email,b.sdt,b.chucvu,b.hinh,b.ngaysinh,b.diachi FROM NHANSU_MaNhanVien a, NHANSU_Nhanvien b
 where a.manv = b.manv and a.manv = '$manv'"))->first();
      $daotao =  collect(\DB::select("select manv, sum(TL) as 'TL' , sum(KT) as 'KT', sum(KN) as 'KN' , SUM(NT) as 'NT' , sum(CD) as 'CD' , SUM(TC) as 'TC',sum(Tong) as 'Tong'
 from NHANSU_CONGHIEN_DaoTao where manv = '$manv'
 group by manv"))->first();
      $thuongphat = \DB::select("select b.tentg,b.noidungtg,a.diem,a.ngayhieuluc FROM NHANSU_CONGHIEN_TangGiam a , NHANSU_TANGGIAM_KhaiBao b
where a.matg = b.matg and manv = '$manv'");
      $banga = collect(\DB::select(" select * FROM NHANSU_NHANVIEN_LUONG_TuoiVaoLam where manv='$manv'"))->first();
      $chaybo = collect(DB::connection('sqlsrv2')->select("select a.Id_card,a.Fullname, sum(b.Count) as 'sv' 
FROM
Runner a , Running b
where a.Id_card = b.ID_Card and a.Id_card = '$idcard'
group by a.Id_card,a.Fullname 
"))->first();
      return view('Other.NhanVien.thongtincanhan')->with(['conghien'=>$conghien,'info'=>$info,
        'daotao'=>$daotao,
        'thuongphat'=>$thuongphat,
        'banga' =>$banga,
        // 'bangb' =>$bangb
        'chaybo' => $chaybo
      ]);
    }
    public function BoPhieuTinNhiem(){
      date_default_timezone_set('Asia/Ho_Chi_Minh');
      $manv = Auth::User()->manv;
      $time = now();
      $thongtinbophieu = KiBoPhieuModel::where('ngaybophieu','<=',$time)->where('ngayketthuc','>=',$time)->get();
      $thamgia = ThanhVienHatNhanModel::where('manv',$manv)->get()->isNotEmpty();

      if($thamgia && $thongtinbophieu->isNotEmpty()){
        if(KetQuaBoPhieuModel::where(['nguoibophieu'=>$manv,'maki'=>$thongtinbophieu->first()->maki])->get()->isNotEmpty())
          return "Bạn đã bỏ phiếu cho kì này";
        $nhanvien = MaNhanVienModel::where('trangthai',1)->where('congty','Viễn Đông')->whereNotIn('manv',[$manv])->whereIn('manv',[\DB::raw("SELECT manv from NHANSU_DangKyHatNhan WHERE hocki <> '0'")])->get();
      return view('Other.NhanVien.bophieutinnhiem')->with(['nhanvien'=>$nhanvien,'thongtinbophieu'=>$thongtinbophieu->first()]);
    }else return back();
      
    }
    public function pBoPhieuTinNhiem(Request $Request){
      $manv = Auth::User()->manv;
      $conghien = ThongKeCongHienModel::where('manv',$manv)->get()->first();
      if(!empty($conghien)){
        $diemtong = $conghien->tongdiem;
        if(QuyDoiModel::where('mucconghien','<=',$diemtong)->orderBy('mucconghien','DESC')->get()->isNotEmpty())
        $tyle = round(QuyDoiModel::where('mucconghien','<=',$diemtong)->orderBy('mucconghien','DESC')->get()->first()->tylebophieu,2);
        else $tyle = 1;
      }
      else $diemtong = 0 ;
      $data = $Request->all();
      for ($i=0; $i < sizeof($data['stt']); $i++) { 
         $stt = $data['stt'][$i];
         $binhchon = $data['manv'][$i];
         $kqbc = $stt * $tyle;
         $maki = $data['maki'];

          $ins = new KetQuaBoPhieuModel;
          $ins->nguoibophieu = $manv;
          $ins->maki = $maki;
          $ins->bophieucho = $binhchon;
          $ins->thutubinhchon = $stt;
          $ins->diemch = $diemtong;
          $ins->sodiem = $kqbc;
          $ins->save();
      }
      return 'Bỏ phiếu thành công';
   }
    
}
