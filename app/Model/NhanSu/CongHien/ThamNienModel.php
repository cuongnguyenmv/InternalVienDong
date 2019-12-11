<?php

namespace App\Model\NhanSu\CongHien;

use Illuminate\Database\Eloquent\Model;

class ThamNienModel extends Model
{
    protected $table = 'NHANSU_CONGHIEN_ThamNien';
    protected $fillable = [
    	'manv','ngaycapnhat','trainghiem','vanhoa'
    ];
}
