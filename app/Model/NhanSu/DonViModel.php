<?php

namespace App\Model\NhanSu;

use Illuminate\Database\Eloquent\Model;

class DonViModel extends Model
{
    protected $table = 'NHANSU_DonVi';
    protected $fillable = [	
    	'madv',	'tendv','truongdv',
    ];
}
