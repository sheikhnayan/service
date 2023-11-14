<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notification extends Mailable
{
    use Queueable, SerializesModels;

    public array $content2;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $content2) {
        $this->content = $content2;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->content['subject'])
            ->view('emails.notification');
    }
}
