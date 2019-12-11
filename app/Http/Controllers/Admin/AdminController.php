<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PHPExcel;
class AdminController extends Controller
{
   	public function dashboard(){
   		return view('Admin.dashboard');
   	}
   	public function infoNV($manv){
   		return view('Admin.NhanSu.infonv');
   	}
   	
}
