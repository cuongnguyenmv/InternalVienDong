<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Other\ElectionEvents\DanhSachSuKienModel;
use App\Model\Other\ElectionEvents\KetQuaBinhChonModel;
use App\Model\NhanSu\ThongKeCongHienModel;
use App\Model\NhanSu\MaNhanVienModel;
use App\Events\ElectionEve;
use Auth;
class PublicController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
	}
	public function Index(){
		return view('home');
	}
    public function Events(){
    	return view('Other.News.events');
    }
    
}
