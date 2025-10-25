<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class resetPassword extends Mailable
{
    use Queueable, SerializesModels;
    private $url;
    /**
     * Create a new message instance.
     */
    public function __construct($url)
    {
        $this->url=$url;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(

            //Defenir la persona que lo envia
            //from:new Address('correo','nombre') ruta uuse Illuminate\Mail\Mailables\Address;
            subject: 'Reset Password',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'user.resetPassword',
            with:['url'=>$this->url]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
