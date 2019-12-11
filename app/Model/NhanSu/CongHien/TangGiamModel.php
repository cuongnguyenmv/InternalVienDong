<?php

namespace App\Model\NhanSu\CongHien;

use Illuminate\Database\Eloquent\Model;

class TangGiamModel extends Model
{
    protected $table = 'NHANSU_CONGHIEN_TangGiam';
    protected $fillable =  [ 
    	'manv','matg','ngayhieuluc','diem'
    ];
}
