<?php

namespace App\Model\NhanSu\Luong;

use Illuminate\Database\Eloquent\Model;

class BangCDModel extends Model
{
   protected $table = 'NHANSU_NHANVIEN_BANGLUONG_CoDinh';
   protected $fillable = [
   	'manv','madieukhoan'
   ];
}
