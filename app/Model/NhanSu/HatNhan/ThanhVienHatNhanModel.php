<?php

namespace App\Model\NhanSu\HatNhan;

use Illuminate\Database\Eloquent\Model;

class ThanhVienHatNhanModel extends Model
{
    protected $table = 'NHANSU_DangKyHatNhan';
    protected $fillable = [
    	'manv','mahk','hocki','ngaydk','ketthucdk'
    ];
}
