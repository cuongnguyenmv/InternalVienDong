<?php

namespace App\Model\Other\ElectionEvents;

use Illuminate\Database\Eloquent\Model;

class DanhSachSuKienModel extends Model
{
    protected $table = 'OTHER_BinhChon_DanhSachSuKien';
  	protected $fillable = [
  		'tensk','thoigian'
  	];
}
