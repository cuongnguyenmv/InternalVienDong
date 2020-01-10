<?php

namespace App\Model\HoatDong\ChayBo;

use Illuminate\Database\Eloquent\Model;

class GiaiChayBoModel extends Model
{
    protected $table = 'HOATDONG_CHAYBO_GiaiChayBo';
    protected $primaryKey = 'machaybo';
    protected $keyType = 'string';
    protected $fillable = [
   			'machaybo','giaichay','sokm','sovong','ngaytochuc','batdau','ketthuc','trangthai'
   	];
}
