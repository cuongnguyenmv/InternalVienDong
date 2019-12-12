<?php

namespace App\Model\ThanhLy;

use Illuminate\Database\Eloquent\Model;

class TaiSanThanhLyModel extends Model
{
    protected $table = 'CSVC_TAISAN_ThanhLy';
    protected $keyType = 'string';
    protected $primaryKey = 'matl';
    protected $fillable = [
    	'id','matl','tents','hinh1','hinh2','hinh3','mota','trangthai','nguongoc','nguoimua','ngaydaugia','ngayketthuc','dinhgia' ,'seri','madaugia'
    ];
}
