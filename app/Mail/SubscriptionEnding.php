<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriptionEnding extends Mailable
{
    use Queueable, SerializesModels;
    public $subend;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subend)
    {
        $this->subend = $subend;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.subend');
    }
}
