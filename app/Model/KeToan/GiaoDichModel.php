<?php

namespace App\Model\KeToan;

use Illuminate\Database\Eloquent\Model;

class GiaoDichModel extends Model
{
	protected $table = 'USERS_VITIEN_GiaoDich';
	protected $primaryKey = 'manv';
	protected $keyType = 'string';
	protected $fillable = [
		'phiengd','manv','noidung','sohat','trangthai','nguoichuyen','nguoinhan'
	];
}
