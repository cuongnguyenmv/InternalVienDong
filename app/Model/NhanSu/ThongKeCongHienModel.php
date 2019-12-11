<?php

namespace App\Model\NhanSu;

use Illuminate\Database\Eloquent\Model;

class ThongKeCongHienModel extends Model
{
    protected $table = 'NHANSU_ThongKeCongHien';
    protected $primaryKey = 'manv';
    protected $keyType = 'string';
    protected $fillable = [
    	'manv','vanhoa','trainghiem','daotao','tanggiam'
    ];
}
