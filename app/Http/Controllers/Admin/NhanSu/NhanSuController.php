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
use App\Model\NhanSu\HatNhan\HocKiHatNhanModel;
use App\Model\NhanSu\HatNhan\ThanhVienHatNhanModel;
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
		$manv = Auth::User()->manv;
		$congty = MaNhanVienModel::where('manv',$manv)->get()->first()->congty;
		$hoso = MaNhanVienModel::where('congty',$congty)->where('trangthai',1)->get();
		return view('Admin.NhanSu.infonv')->with(['hoso'=>$hoso]);
	}
	public function vCapNhatNhanSu(){
		$bophan = DonViModel::get();
		return view('Admin.NhanSu.addNV')->with(['bophan'=>$bophan]);
	}
	public function pCapNhatNhanSu(Request $Request){

	}
	public function vCapNhatHoSo($manv){
		$bophan = DonViModel::get();
		$manhanvien = MaNhanVienModel::
			join('NHANSU_Donvi','NHANSU_Donvi.madv','=','NHANSU_MaNhanVien.bophan')->
			where('manv',$manv)->get()->first();
		$nhanvien = NhanVienModel::where('manv',$manv)->get()->first();
		return view('Admin.NhanSu.updateNV')->with(['bophan'=>$bophan,'manhanvien'=>$manhanvien,'nhanvien'=>$nhanvien]);
	}
	public function pCapNhatHoSo(Request $Request){
		$mess = [
			'required' => 'Kiểm tra các trường :Attribute không được bỏ trống',
			'image' => 'phải là hình ảnh',
			'mimes' => 'Chỉ chấp nhận đuôi .jpg|jpeg|png',
			'max' => 'Hình không lớn hơn 4MB'
		];
		$Request->validate([
			'manv'=>'required',
			'hoten'=>'required',
			'ngaysinh'=>'required',
			'ngayvaolam'=>'required',
			'ngayketthuc'=>'required_if:trangthai,0'
		],$mess);
		$data = $Request->all();
		if($Request->has('hinh')){
			$hinh = $Request->hinh->getClientOriginalName();
			$extension = substr($hinh, strpos($hinh, "."));
          	$hinh = str_replace($hinh,$data['manv'].$extension, $hinh);
          	$Request->hinh->move('images/NhanVien',$hinh); 
          	$data['hinh'] = $hinh;
		}
		$up = NhanVienModel::findorfail($data['manv']);
		$manhanvien = MaNhanVienModel::findorfail($data['manv']);
		if($up->update($data) && $manhanvien->update($data)){
			Session::flash('status','Cập nhật thành công');
			return back();
		}else return back()->withErrors(['errors','Có lỗi xảy ra']);
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
		$conghien = ThongKeCongHienModel::where('manv',$manv)->get()->first();
      $info = collect(\DB::select(" select a.*,b.email,b.sdt,b.chucvu,b.hinh,b.ngaysinh,b.diachi FROM NHANSU_MaNhanVien a, NHANSU_Nhanvien b
 where a.manv = b.manv and a.manv = '$manv'"))->first();
      $daotao =  collect(\DB::select("select manv, sum(TL) as 'TL' , sum(KT) as 'KT', sum(KN) as 'KN' , SUM(NT) as 'NT' , sum(CD) as 'CD' , SUM(TC) as 'TC',sum(Tong) as 'Tong'
 from NHANSU_CONGHIEN_DaoTao where manv = '$manv'
 group by manv"))->first();
      $thuongphat = \DB::select("select b.tentg,b.noidungtg,a.diem,a.ngayhieuluc FROM NHANSU_CONGHIEN_TangGiam a , NHANSU_TANGGIAM_KhaiBao b
where a.matg = b.matg and manv = '$manv'");
      $banga = collect(\DB::select(" select * FROM NHANSU_NHANVIEN_LUONG_TuoiVaoLam where manv='$manv'"))->first();
		return view('Admin.NhanSu.ajax.detailinfo')->with(['conghien'=>$conghien,'info'=>$info,
        'daotao'=>$daotao,
        'thuongphat'=>$thuongphat,
        'banga' =>$banga,
        // 'bangb' =>$bangb

      ]);
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
	public function KhaiBaoHocKi(){
		$hocki = HocKiHatNhanModel::orderBy('id','DESC')->get();
		return view('Other.HatNhanVanHoa.khaibaohocki')->with(['hocki'=>$hocki]);
	}
	public function pKhaiBaoHocKi(Request $Request){
		$data = $Request->all();
		if(HocKiHatNhanModel::updateOrCreate(['mahk'=>$Request->mahk],$data))
			Session::flash('status','Cập nhật thành công');
		else return back()->withErrors(['errors','Lỗi']);
		return back();
	}
	public function DangKiHatNhan(){

	}
}
