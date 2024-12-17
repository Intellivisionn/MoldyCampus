<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AttemptedLoginMail extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this->subject('Unsuccessful Login Attempt')
                    ->view('emails.attempted-login');
    }
}
