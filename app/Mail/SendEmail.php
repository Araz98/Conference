<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $s;
     public $m;

    public function __construct($subject, $message)
    {
        $this->s = $subject;
        $this->m = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_subject = $this->s;
        $e_message = $this->m;

        return $this->view('mail.sendmail',compact("e_message"))->subject($e_subject);
    }
}
