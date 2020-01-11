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
                    $quytac = ['VAS'=>'VA','Toàn Lực'=>'TL','Tâm An'=>'TA','Khánh Hội'=>'KH'];
                    if($congty == 'Viễn Đông'){
                        if(MaNhanVienModel::where('idcard',$idcard)->get()->isNotEmpty())
                        $madk = MaNhanVienModel::where('idcard',$idcard)->get()->first()->manv;
                        else echo $idcard;
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
        $checked = DB::select("select a.idcard,a.hoten,a.madk,a.magiai,a.trangthai,b.sovong,a.checkin
                FROM HOATDONG_CHAYBO_DangKyChayGiai a , HOATDONG_CHAYBO_GiaiChayBo b 
                where a.magiai = b.machaybo and ngaytochuc = '$time' and checkin is not null ");
    	return view('Other.HoatDong.GiaiChay.ghinhanketqua')->with(['checked'=>$checked]);
    }
    public function CheckIn($idcard){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = now();
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
        $time = now();
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
        $lastround = SoLieuChayGiaiModel::where(['ngaychay'=>$time,'idcard'=>$idcard])->orderBy('id','DESC')->get();
        if($lastround->isEmpty()){
           Session::flash('error','Chưa check in');
           $solieu = collect(DB::select("
                select a.idcard,a.hoten,a.madk,a.magiai,a.trangthai,b.sovong,a.checkin,a.pace,a.ttg,count(c.idcard) -1 as 'runned'
                FROM HOATDONG_CHAYBO_DangKyChayGiai a , HOATDONG_CHAYBO_GiaiChayBo b , HOATDONG_CHAYBO_SoLieuChayGiai c
                where a.magiai = b.machaybo and ngaytochuc = '$time' and ngaychay = '$time' and checkin is not null and c.idcard = a.idcard
                group by a.idcard,a.hoten,a.madk,a.magiai,a.trangthai,b.sovong,a.checkin,a.pace,a.ttg
                order by checkin DESC"));
                return view('Other.HoatDong.GiaiChay.ajax.ghinhandangchay')->with(['solieu'=>$solieu]);
        }
        else{
            $lasttime = Date('H:i:s.u',strtotime($lastround->first()->batdau .'+ 1 minutes'));
            $batdau = Date('H:i:s.u',strtotime($time));
            if($lasttime < $batdau){
                 $calc = SoLieuChayGiaiModel::where(['idcard'=>$idcard,'ngaychay'=>$time])->orderBy('id','DESC')->get()->first();
                    $thoigiantruoc = Carbon::createFromFormat('Y-m-d H:i:s.u',$calc->batdau);
                    $tongtg = $thoigiantruoc->diffInSeconds($time);
                    $checksovong = collect(DB::select("select b.sovong 
                from HOATDONG_CHAYBO_DangKyChayGiai a , HOATDONG_CHAYBO_GiaiChayBo b
                where a.magiai = b.machaybo and idcard = '$idcard'"))->first();
                    $runned = SoLieuChayGiaiModel::where(['idcard'=>$idcard,'ngaychay'=>$time])->count('*');
                    if($runned <= $checksovong->sovong)
                    DB::update(DB::RAW("update HOATDONG_CHAYBO_DangKyChayGiai 
                set ttg = ttg + '$tongtg' 
                from HOATDONG_CHAYBO_DangKyChayGiai a , HOATDONG_CHAYBO_GiaiChayBo b 
                where a.magiai = b.machaybo and ngaytochuc = '$time' and a.idcard = '$idcard'"));
                SoLieuChayGiaiModel::create(['idcard'=>$idcard,'ngaychay'=>$time]);
                Session::flash('status','Đã ghi nhận số vòng hiện tại của bạn là: '.$runned.'/'.round($checksovong->sovong).' - Thời gian 1 vòng là : '.$tongtg.' (s)');
            }
            else 
                Session::flash('error','Thời gian tối thiểu là 1 phút');
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

