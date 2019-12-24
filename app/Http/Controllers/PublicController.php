<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Other\ElectionEvents\DanhSachSuKienModel;
use App\Model\Other\ElectionEvents\KetQuaBinhChonModel;
use App\Model\NhanSu\ThongKeCongHienModel;
use App\Model\NhanSu\MaNhanVienModel;
use App\Events\ElectionEve;
use Auth;
use App\Model\Other\TinTuc\BaiVietModel;
class PublicController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
	}
	public function Index(){
		  $tintuc = BaiVietModel::orderBy('ngaydang','DESC')->get();
		return view('home')->with(['tintuc'=>$tintuc]);
	}
    public function Events(){
    	return view('Other.News.events');
    }
    public function DocTinTuc($id){
    	$tintuc = BaiVietModel::where('id',$id)->get()->first();
    	return view('Other.TinTuc.tintuc')->with(['tintuc'=>$tintuc]);
    }
    
}
