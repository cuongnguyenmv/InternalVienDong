<?php

namespace App\Model\HoatDong\ChayBo;

use Illuminate\Database\Eloquent\Model;

class SoLieuChayGiaiModel extends Model
{
     protected $table = 'HOATDONG_CHAYBO_SoLieuChayGiai';
     protected $fillable = [
   			'idcard','ngaychay','batdau'
   	];
}
