<?php

namespace App\Model\NhanSu;

use Illuminate\Database\Eloquent\Model;

class QuaTrinhCongHienModel extends Model
{
    protected $table = 'NHANSU_QuaTrinhCongHien';
    protected $fillable = [
    	'manv','ngaycapnhat'
    ];
}
