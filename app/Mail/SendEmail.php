<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    var $view;
    var $data;
    var $emplois;
    public function __construct($data, $view, $emplois)
    {
        $this->view = $view;
        $this->data = $data;
        $this->emplois = $emplois;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;
        return $this->subject($data['subject'])->view($this->view, compact('data','emplois'));
    }
}