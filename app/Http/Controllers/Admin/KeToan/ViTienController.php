<?php

namespace App\Http\Controllers\Admin\KeToan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\KeToan\GiaoDichModel;
use App\Model\KeToan\QuyDoiModel;
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
}
