<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNewMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $author;
    protected $authorEmail;
    protected $messageContent;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($author, $authorEmail, $messageContent)
    {
        $this->author = $author;
        $this->authorEmail = $authorEmail;
        $this->messageContent = $messageContent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->replyTo($this->authorEmail)->view('emails.body', ["author" => $this->author, "email" => $this->authorEmail, "messageContent" => $this->messageContent]);
        //se passo "message" iso "messageContent" si incavola perché sovrascrivo quelche funzionalità (?)base(?) e lo vede come object
    }
}
