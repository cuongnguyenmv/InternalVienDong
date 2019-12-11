<?php

namespace App\Model\NhanSu;

use Illuminate\Database\Eloquent\Model;

class MaNhanVienModel extends Model
{
    protected $table = 'NHANSU_MaNhanVien';
    protected $primaryKey = 'manv';
    protected $keyType = 'string';
    protected $fillable = [
    	'manv','hoten','ngaythuviec','ngayvaolam','ngaychinhthuc','ngayketthuc','trangthai','congty','idcard'
    ];
    public function ThongTiNhanVien(){
    	 return $this->hasOne('App\Model\NhanSu\NhanVienModel','manv','manv');
    }
}
