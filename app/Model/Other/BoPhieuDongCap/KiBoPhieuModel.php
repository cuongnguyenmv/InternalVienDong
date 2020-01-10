<?php

namespace App\Model\Other\BoPhieuDongCap;

use Illuminate\Database\Eloquent\Model;

class KiBoPhieuModel extends Model
{
    protected $table = 'NHANSU_KiBoPhieu';
    protected $fillable = [ 
    	'kibophieu','ngaybophieu','ngayketthuc'
    ];
}
