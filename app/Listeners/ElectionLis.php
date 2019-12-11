<?php

namespace App\Listeners;

use App\Events\ElectionEve;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use LRedis;
use App\Model\Other\ElectionEvents\DanhSachSuKienModel;
use App\Model\Other\ElectionEvents\KetQuaBinhChonModel;
use App\Model\NhanSu\ThongKeCongHienModel;
use App\Model\NhanSu\MaNhanVienModel;

class ElectionLis
{
    /**
     * Create the event listener.
     *  @param  ElectionEve  $event
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ElectionEve  $event
     * @return void
     */
    public function handle(ElectionEve $event)
    {
        $mask = $event->res->mask;
        $diembinhchon = KetQuaBinhChonModel::select('mask','sodiem')->where(['mask'=>$mask,'binhchon'=>1])->sum('sodiem');
        $tongdiem = KetQuaBinhChonModel::select('mask','sodiem')->where('mask',$mask)->sum('sodiem');
        $data = ['res'=>$diembinhchon,'tongdiem'=>$tongdiem];
        $redist = LRedis::connection();
        $redist->publish('channel-election',$diembinhchon);
        
    }
}
