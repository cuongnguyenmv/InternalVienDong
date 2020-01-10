<?php

namespace App\Http\Controllers\Admin\CSVC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\HoatDong\ChayBo\DangKyChayGiaiModel;
use App\Model\HoatDong\ChayBo\GiaiChayBoModel;
use App\Model\HoatDong\ChayBo\SoLieuChayGiaiModel;
use App\Model\NhanSu\MaNhanVienModel;
use Carbon\Carbon;
use Session;
use Excel;
use DB;
class HoatDongChayBoController extends Controller
{
    public function TrangChayBo(){
    	$giaichay = GiaiChayBoModel::get();

    	return view('Other.HoatDong.GiaiChay.trangquanly')->with(['giaichay'=>$giaichay]);
    }
    public function KhoiTaoGiaiChay(Request $Request){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    	$mess = [
    		'required' => "Không được bỏ trống :attribute ",
    	];
    	$Request->validate(
    		[
    			'machaybo'=>'required',
    			'sokm' => 'required|numeric',
				'batdau' =>'required',
				'sovong' => 'required|numeric',
				'giaichay' =>'required'
    		]
    		,$mess);
    	$data = $Request->all();
    	$data['batdau'] = Carbon::createFromFormat('Y-m-d\TH:i',$Request->batdau);
    	$data['ngaytochuc'] = Carbon::createFromFormat('Y-m-d\TH:i',$Request->batdau);
    	if($Request->has('ketthuc'))
    	$data['ketthuc'] =  Carbon::createFromFormat('Y-m-d\TH:i',$Request->ketthuc);
    	if(GiaiChayBoModel::updateOrCreate(['machaybo'=>$data['machaybo']],$data))
    	{
    		Session::flash('status','Thành công');
    		return back();
    	}
    	return back();
    }
    public function DangKyGiaiChay(Request $Request){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    	$file = $Request->file;
    	Excel::load($file,function($reader){
    		$data = $reader->all();
            foreach ($data as $key ) {
                    $idcard = $key->so_the;
                    $congty = $key->cong_ty;
                    $hoten = $key->ho_ten;
                    $culy = $key->cu_ly;
                    $magiai = $key->ma_giai;
                    $quytac = ['VAS'=>'VA','Toàn Lực'=>'TL','Tâm An'=>'TA'];
                    if($congty == 'Viễn Đông'){
                        $madk = MaNhanVienModel::where('idcard',$idcard)->get()->first()->manv;
                    }
                    else{
                        if(DangKyChayGiaiModel::where('madk','like',$quytac[$congty].'%')->get()->isEmpty())
                            $madk = $quytac[$congty].'01';
                        else
                            $madk = DangKyChayGiaiModel::where('madk','like',$quytac[$congty].'%')->orderBy('madk','DESC')->get()->first()->madk++;
                    }
                    DangKyChayGiaiModel::updateOrCreate(
                        ['idcard'=>$idcard,'madk'=>$madk,'magiai'=>$magiai],
                        ['idcard'=>$idcard,'madk'=>$madk,'magiai'=>$magiai,'hoten'=>$hoten]
                    );
                }
            
    	});
    }
    public function TrangGhiNhan(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = now();
        $time = '2020-01-12';
        $checked = DB::select("select a.idcard,a.hoten,a.madk,a.magiai,a.trangthai,b.sovong,a.checkin
                FROM HOATDONG_CHAYBO_DangKyChayGiai a , HOATDONG_CHAYBO_GiaiChayBo b 
                where a.magiai = b.machaybo and ngaytochuc = '$time' and checkin is not null ");
    	return view('Other.HoatDong.GiaiChay.ghinhanketqua')->with(['checked'=>$checked]);
    }
    public function CheckIn($idcard){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = now();
        $time = '2020-01-12 08:30:00';
        $check = collect(DB::select("
            select a.idcard,a.hoten,a.madk,a.magiai,a.trangthai,a.checkin
            FROM HOATDONG_CHAYBO_DangKyChayGiai a , HOATDONG_CHAYBO_GiaiChayBo b 
            where a.magiai = b.machaybo and ngaytochuc = '$time' and a.idcard = '$idcard' and checkin is null"
        ))->first();
        if(!empty($check)){
            DB::update(DB::RAW("update HOATDONG_CHAYBO_DangKyChayGiai 
                set checkin = '$time' 
                from HOATDONG_CHAYBO_DangKyChayGiai a , HOATDONG_CHAYBO_GiaiChayBo b 
                where a.magiai = b.machaybo and ngaytochuc = '$time' and a.idcard = '$idcard'"));
            $checked = DB::select("select a.idcard,a.hoten,a.madk,a.magiai,a.trangthai,b.sovong,a.checkin
                FROM HOATDONG_CHAYBO_DangKyChayGiai a , HOATDONG_CHAYBO_GiaiChayBo b 
                where a.magiai = b.machaybo and ngaytochuc = '$time' and checkin is not null order by checkin DESC");
          return view('Other.HoatDong.GiaiChay.ajax.showcheckin')->with(['checked'=>$checked]);
        }
       else return false;
    }
    public function GiaiChayBatDau(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = '2020-01-12';
        DB::update(DB::RAW("update HOATDONG_CHAYBO_DangKyChayGiai set trangthai = 1 
                FROM HOATDONG_CHAYBO_DangKyChayGiai a , HOATDONG_CHAYBO_GiaiChayBo b 
                where a.magiai = b.machaybo and ngaytochuc = '$time' and checkin is not null"));
         $checked =DB::select("select a.idcard,a.hoten,a.madk,a.magiai,a.trangthai,b.sovong,a.checkin
                FROM HOATDONG_CHAYBO_DangKyChayGiai a , HOATDONG_CHAYBO_GiaiChayBo b 
                where a.magiai = b.machaybo and ngaytochuc = '$time' and checkin is not null order by checkin DESC");
         foreach ($checked as $key ) {
             SoLieuChayGiaiModel::firstOrCreate(['idcard'=>$key->idcard,'ngaychay'=>$time]);
         }
         $solieu = collect(DB::select("
select a.idcard,a.hoten,a.madk,a.magiai,a.trangthai,b.sovong,a.checkin,count(c.idcard) -1 as 'runned'
                FROM HOATDONG_CHAYBO_DangKyChayGiai a , HOATDONG_CHAYBO_GiaiChayBo b , HOATDONG_CHAYBO_SoLieuChayGiai c
                where a.magiai = b.machaybo and ngaytochuc = '$time' and ngaychay = '$time' and checkin is not null and c.idcard = a.idcard
                group by a.idcard,a.hoten,a.madk,a.magiai,a.trangthai,b.sovong,a.checkin
                order by checkin DESC"));
        return view('Other.HoatDong.GiaiChay.batdau')->with(['solieu'=>$solieu]);
    }
    public function GhiNhanKetQua($idcard){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = now();
        $time = '2020-01-12 11:26:00.0000';
        $lastround = SoLieuChayGiaiModel::where(['ngaychay'=>$time,'idcard'=>$idcard])->orderBy('id','DESC')->get();
        if($lastround->isEmpty())
            return 'Chưa check in';
        else{
            $lasttime = Date('H:i:s.u',strtotime($lastround->first()->batdau .'+ 1 minutes'));
            $batdau = Date('H:i:s.u',strtotime($time));
            if($lasttime < $batdau){
                SoLieuChayGiaiModel::create(['idcard'=>$idcard,'ngaychay'=>$time]);
                $calc = SoLieuChayGiaiModel::where([['idcard'=>$idcard,'ngaychay'=>$time]])->get();
                foreach ($calc as $key) {
                    $time = Date('H:i:s.u',strtotime($lastround->first()->batdau .'+ 01:01:00'));
                    dd($time);
                }
            }
            else 
                Session::flash('error','Thời gian tối thiểu là 1 phút');
            $calc = SoLieuChayGiaiModel::where(['idcard'=>$idcard,'ngaychay'=>$time])->get();
                foreach ($calc as $key) {
                    $subtime = Date('H:i:s.u',strtotime('00:01:00'));
                     $time = Date('H:i:s.u',strtotime($key->batdau);
                    dd($time);
                }
             $solieu = collect(DB::select("
                select a.idcard,a.hoten,a.madk,a.magiai,a.trangthai,b.sovong,a.checkin,a.pace,a.ttg,count(c.idcard) -1 as 'runned'
                FROM HOATDONG_CHAYBO_DangKyChayGiai a , HOATDONG_CHAYBO_GiaiChayBo b , HOATDONG_CHAYBO_SoLieuChayGiai c
                where a.magiai = b.machaybo and ngaytochuc = '$time' and ngaychay = '$time' and checkin is not null and c.idcard = a.idcard
                group by a.idcard,a.hoten,a.madk,a.magiai,a.trangthai,b.sovong,a.checkin,a.pace,a.ttg
                order by checkin DESC"));
                return view('Other.HoatDong.GiaiChay.ajax.ghinhandangchay')->with(['solieu'=>$solieu]);
        }
    	
    }

}

