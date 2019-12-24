<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NapHatMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sohat,$sotien,$sodu,$diemch,$mucquydoi)
    {
        $this->subject = 'Cơ Sở Vật Chất Viễn Đông';
        $this->sohat = $sohat;
        $this->sotien = $sotien;
        $this->sodu = $sodu;
        $this->diemch = $diemch;
        $this->mucquydoi = $mucquydoi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Mail.naphatmail')
            ->from('dautuviendong@gmail.com','Cơ Sở Vật Chất Viễn Đông')
            ->with(['sotien'=>$this->sotien,'sohat'=>$this->sohat,'sodu'=>$this->sodu,'diemch'=>$this->diemch,'mucquydoi'=>$this->mucquydoi]);
    }
}
