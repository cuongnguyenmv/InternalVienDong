<?php

namespace App\Model\KeToan;

use Illuminate\Database\Eloquent\Model;

class QuyDoiModel extends Model
{
    protected $table = 'USERS_VITIEN_MaQuyDoi';
    protected $primaryKey  = 'maqd';
    protected $keyType = 'string';
    protected $fillable = [
    	'maqd','noidung','sohat','mucconghien','tylethem'
    ];
}
