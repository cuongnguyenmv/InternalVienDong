<?php

namespace App\Model\NhanSu\Luong;

use Illuminate\Database\Eloquent\Model;

class LuongThangModel extends Model
{
	protected $table = 'NHANSU_NHANVIEN_BANGLUONG_Thang';
    protected $fillable = [
   		'manv','banga','bangb','bangc','bangd','bange','bangf','bangg','luongthuclanh','thang','batdau','denngay','congchuan'
   	];
}
