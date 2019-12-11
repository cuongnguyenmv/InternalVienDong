<?php

namespace App\Model\Other\ElectionEvents;

use Illuminate\Database\Eloquent\Model;

class KetQuaBinhChonModel extends Model
{
    protected $table = 'OTHER_BinhChon_KetQua';
    protected $fillable = [
    	'manv','mask','binhchon','sodiem'
    ];
}
