<?php

namespace App\Model\HoatDong\ChayBo;

use Illuminate\Database\Eloquent\Model;

class DangKyChayGiaiModel extends Model
{
    protected $table = 'HOATDONG_CHAYBO_DangKyChayGiai';
   	protected $fillable = [
   			'idcard','madk','magiai','hoten','checkin','trangthai'
   	];
}
