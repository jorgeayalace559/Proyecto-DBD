<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyBuy extends Mailable
{
    use Queueable, SerializesModels;

    public $distressCall;

    public function __construct(DistressCall $distressCall)
    {
        $this->distressCall = $distressCall;
    }

    public function build()
    {
        return $this->view('mails.emergency_call');
    }
}
