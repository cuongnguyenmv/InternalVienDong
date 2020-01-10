<?php

namespace App\Http\Controllers\Admin\CSVC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NhanSu\CongHien\DaoTaoModel;
use App\Model\NhanSu\CongHien\DT_KhaiBaoModel;
use Excel;
class DaoTaoController extends Controller
{
    public function TrangDaoTao(){
    	$daotao = DT_KhaiBaoModel::orderBy('ngayhieuluc','DESC')->get();
    	return view('Admin.NhanSu.DaoTao.trangdaotao')->with(['daotao'=>$daotao]);
    }
    public function ImportDaoTao(Request $Request){
    	$file = $Request->file;
    	Excel::load($file,function($reader){
    		$data = $reader->all();
    		foreach ($data as $key ) {
    			$manv = $key->manv;
    			$madaotao = $key->madaotao;
    			$ngaythamgia = $key->ngaythamgia;
    			$TL = $key->tl;
				$KT = $key->kt;
				$KN = $key->kn;
				$CM = $key->cm;
				$CD = $key->cd;
				$TC = $key->tc;
				$NT = $key->nt;
    			DaoTaoModel::updateOrCreate(
    				['manv'=>$manv,'madaotao'=>$madaotao,'ngaythamgia'=>$ngaythamgia],
    				 ['TL' => $TL,'KT' => $KT,'KN' => $KN,'CM' => $CM,'CD' => $CD,'TC' => $TC,'NT' => $NT	
    				]
    			);
    			// $check = DaoTaoModel::where(['manv'=>$manv,'madaotao'=>$madaotao,'ngaythamgia'=>$ngaythamgia])->get();

    			// if($check->isEmpty())
    			// 	echo $manv.'-'.$madaotao.'-'.$ngaythamgia.'<br>';
    		}
    	});
    }
}
