<?php

namespace App\Model\ThanhLy;

use Illuminate\Database\Eloquent\Model;

class DauGiaThanhLyModel extends Model
{
	protected $table = 'CSVC_TAISAN_DauGiaThanhLy';
    protected $fillable = [
    	'madaugia','matl','manv','trangthai','sohat',
    ];
}
