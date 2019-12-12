<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\NhanSu\NhanVien;
use Session;
use App\Model\ThanhLy\DauGiaThanhLyModel;
use App\Model\ThanhLy\TaiSanThanhLyModel;
use App\Model\NhanSu\MaNhanVienModel;
use App\User;
use Auth;
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
        return view('home');
    }
    public function ThongTinCaNhanSearch($idcard){
        $info = new NhanVien($idcard);
        $info = $info->getInfo();
        
        // return view('Other.NhanVien.thongtincanhan')->with(['']);
    }
    public function SanPhamThanhLy(){
        $sp = TaiSanThanhLyModel::where('trangthai',1)->get();
        return view('Other.ThanhLy.cacsanpham')->with(['sp'=>$sp]);
    }
    public function ChiTietSanPhamThanhLy($matl){
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
                $count = TaiSanThanhLyModel::count('*');
                $matl = 'CN'. ++$count;
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
        if(TaiSanThanhLyModel::create($data))
            Session::flash('status','Đăng thành công quá trình thỏa thuận bắt đầu');
        return back();
    }
    public function GuiDauGia(Request $Request){
      dd($Request->all());
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

      $data['manv'] = Auth::User()->manv;
      if(DauGiaThanhLyModel::create($data))
        Session::flash('status','Gửi giá thành công');
      return back();
    }
    
}
