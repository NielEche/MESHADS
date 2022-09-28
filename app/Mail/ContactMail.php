<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var array
     */
    private $payload;

    /**
     * Create a new message instance.
     *
     * @param array $payload
     */
    public function __construct(array $payload)
    {
        //
        $this->payload = $payload;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Contact Inquiry: ' . $this->payload['name'])
            ->from($this->payload['email'])
            ->view('mail.contact')
            ;
//        return $this->view('view.name');
    }
}
