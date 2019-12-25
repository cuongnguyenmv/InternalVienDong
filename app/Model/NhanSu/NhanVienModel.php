<?php

namespace App\Model\NhanSu;

use Illuminate\Database\Eloquent\Model;

class NhanVienModel extends Model
{
    protected $table = 'NHANSU_Nhanvien';
    protected $primaryKey = 'manv';
    protected $keyType = 'string';
    protected $fillable = [
			'manv','chucvu','chuyenmon','sobaohiem','ngaycongchuan','hinh','ngaysinh','diachi','quequan','sdt','email','bangcap','xeploai','truongtotnghiep','cmnd','noisinh'
    ];
    
}
