<?php

namespace App\Model\NhanSu\CongHien;

use Illuminate\Database\Eloquent\Model;

class DaoTaoModel extends Model
{
    protected $table = 'NHANSU_CONGHIEN_DaoTao';
    protected $fillable = [
    	'manv','ngaythamgia','madaotao','TL','KT','KN','CM','NT','CD','TC'
    ];
}
