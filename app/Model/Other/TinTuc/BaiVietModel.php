<?php

namespace App\Model\Other\TinTuc;

use Illuminate\Database\Eloquent\Model;

class BaiVietModel extends Model
{
    protected $table = 'NHANSU_TRUYENTHONG_News';
    protected $fillable = [
    	'tieude','gioithieu','noidung','ngaydang','hinh'
    ];
}
