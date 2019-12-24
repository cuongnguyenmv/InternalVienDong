<?php

namespace App\Http\Controllers\Admin\KeToan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\KeToan\GiaoDichModel;
use App\Model\KeToan\QuyDoiModel;
use App\Model\NhanSu\ThongKeCongHienModel;
use App\Mail\NapHatMail;
use App\User;
use Mail;
use Session;
class ViTienController extends Controller
{
    function __construct()
    {
        $this->middleware('ketoan-auth');
    }
    public function CapNhatBangQuyDoi(){
    	$data = QuyDoiModel::get();
    	return view('Admin.KeToan.bangquydoi',compact('data'));
    }
    public function pCapNhatBangQuyDoi(Request $Request){
    	$mess = [
    		'required' => 'Các trường không bỏ trống'
    	];
    	$Request->validate([
    		'maqd'=> 'required',
    		'noidung'=>'required',
    		'sohat'=>'required',
    		'mucconghien'=>'required',
    		'tylethem'=>'required'
    	],$mess);
    	if(QuyDoiModel::create($Request->all()))
    		Session::flash('status','Thêm thành công');
    	return back();
    }
    public function CacQuyDoi(){
        $data = QuyDoiModel::get();
        return view('Admin.KeToan.cacquydoi')->with(['data'=>$data]);
    }
    public function pTienHat(Request $Request){
        $manv = $Request->naptien;
        $sotien = $Request->sotien;
        $noidung = $Request->noidung;
        $diemch = ThongKeCongHienModel::where('manv',$manv)->get()->first()->tongdiem;
        $mucquydoi = QuyDoiModel::where('mucconghien','<=',$diemch)->orderBy('mucconghien','DESC')->get()->first();
        $tyle = round($mucquydoi->tylethem,2);
        $sodu = User::where('manv',$manv)->select('sohat','email')->get()->first();
        \DB::beginTransaction();
        $nextid = GiaoDichModel::select('id')->orderBy('id','DESC')->get()->first()->id;
        $sohat = $sotien * $tyle / 1000;
        $ins =  new GiaoDichModel;
        $ins->manv = $manv;
        $ins->phiengd = 'NT'.++$nextid;
        $ins->noidung = $noidung;
        $ins->sohat = $sohat;
        $ins->nguoichuyen = 'Hệ thống chuyển đổi';
        if($ins->save())
        {
            \DB::commit();
            if(Mail::to($sodu->email)->send(new NapHatMail($sohat,$sotien,$sodu->sohat + $sohat,$diemch,$tyle)))
                {
                        
                        Session::flash('status','Nạp thành công');
                        return back();
                }
                return back()->withErrors(['errors','Không gửi được email']);
        }else
        {
            \DB::rollBack();
            return back()->withErrors(['errors','Nạp tiền thất bại']);
        }
    }
}
