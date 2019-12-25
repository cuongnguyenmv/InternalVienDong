<?php

namespace App\Model\NhanSu\HatNhan;

use Illuminate\Database\Eloquent\Model;

class HocKiHatNhanModel extends Model
{
    protected $table = 'HATNHAN_HocKiHatNhan';
    protected $primaryKey = 'mahk';
    protected $keyType = 'string';
    protected $fillable = [
    	'mahk','ki','batdau','ketthuc'
    ];
}
