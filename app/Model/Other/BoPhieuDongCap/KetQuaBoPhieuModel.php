<?php

namespace App\Model\Other\BoPhieuDongCap;

use Illuminate\Database\Eloquent\Model;

class KetQuaBoPhieuModel extends Model
{
    protected $table = 'NHANSU_NHANVIEN_BoPhieuTinhNhiem';
    protected $fillable = [
    	'kibophieu','nguoibophieu','bophieucho','thutubinhchon','diemch','sodiem'
    ];
}
