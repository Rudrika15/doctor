<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $mailDetails;

    public function __construct($mailDetails)
    {
        $this->mailDetails = $mailDetails;
    }

    public function build()
    {
        return $this->subject($this->mailDetails['subject'])
                    ->markdown('emails.sendEmail', ['body' => $this->mailDetails['body']]);
    }
}
