<?php

namespace App\Model\NhanSu\Luong;

use Illuminate\Database\Eloquent\Model;

class BangKhaiBaoModel extends Model
{
   	protected $table = 'NHANSU_NHANVIEN_BANGLUONG_KhaiBao';
   	protected $primaryKey = 'madieukhoan';
   	protected $keyType = 'string';
   	protected $fillable = [
   		'madieukhoan','dieukhoan','loai','tien'
   	];
}
