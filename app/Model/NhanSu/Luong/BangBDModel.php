<?php

namespace App\Model\NhanSu\Luong;

use Illuminate\Database\Eloquent\Model;

class BangBDModel extends Model
{
    protected $table = 'NHANSU_NHANVIEN_BANGLUONG_BienDong';
    protected $fillable = [
    	'manv','madieukhoan','trangthai','batdau','ketthuc'
    ];
}
