<?php

namespace App\Http\Controllers\Admin\NhanSu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Other\TinTuc\BaiVietModel;
use Session;
class TruyenThongController extends Controller
{
   public function DangTinTuc(){
   	$id= BaiVietModel::select('id')->orderBy('id','DESC')->get()->first();
   	if(!empty($id))
   		$id = ++$id->id;
   	else 
   		$id = 1;
   		return view('Other.TinTuc.dangtintuc',compact('id'));
   }
   public function pDangTinTuc(Request $Request){
   	$mess = [
   		'required' =>' Không bỏ trống các trường còn thiếu',
   		'image' => 'phải là hình ảnh',
        'mimes' => 'Chỉ chấp nhận đuôi .jpg|jpeg|png',
        'max' => 'Hình không lớn hơn 4MB'
   	];
   	$Request->validate([
   		'tieude'=>'required|string',
   		'gioithieu'=>'required|string',
   		'noidung'=>'required',
   		'hinh'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
   	],$mess);
   	$data = $Request->all();
   		$hinh = $Request->hinh->getClientOriginalName();
        $extension = substr($hinh, strpos($hinh, "."));
        $hinh = str_replace($hinh, 'TinTuc/'.$data['id'].$extension, $hinh);
        $Request->hinh->move('images/TinTuc/',$hinh); 
        $data['hinh'] = $hinh;
        if(BaiVietModel::create($data))
        	Session::flash('status','Successfull');
        else return back()->withErrors(['errors','Có lỗi xảy ra']);
        return back();
   }
   public function DangLichHangNgay(){

   }
   public function pDangLichHangNgay(Request $Request){

   }
}
