<?php

namespace App\Model\NhanSu\CongHien;

use Illuminate\Database\Eloquent\Model;

class TG_KhaiBaoModel extends Model
{
    protected $table = 'NHANSU_TANGGIAM_KhaiBao';
    protected $fillable = [
    	'matg','tentg','diemtg','noidungtg','ngayhieuluc'
    ];
}
