<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\NhanSu\NhanVien;
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
    
}
