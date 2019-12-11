<?php

namespace App\Listeners;

use App\Events\TinhDaoTaoEve;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Model\Other\ElectionEvents\DanhSachSuKienModel;
use App\Model\Other\ElectionEvents\KetQuaBinhChonModel;
use App\Model\NhanSu\ThongKeCongHienModel;
use App\Model\NhanSu\MaNhanVienModel;

class TinhDaoTaoLis
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TinhDaoTaoEve  $event
     * @return void
     */
    public function handle(KetQuaBinhChonModel $event)
    {
       
        
    }
}
