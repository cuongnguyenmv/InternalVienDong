<?php

namespace App\Model\NhanSu\CongHien;

use Illuminate\Database\Eloquent\Model;

class DT_KhaiBaoModel extends Model
{
    protected $table = 'NHANSU_DAOTAO_KhaiBao';
    protected $fillable = [
    	'madaotao','tenhoatdong','TL','KT','KN','CM','CD','NT','TC','nguoidexuat','ngaydexuat','ngayhieuluc'
    ];
}
