<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->markdown('emails.contact-form')
                    ->subject('Nova mensagem do formulário de contato')
                    ->with([
                        'name' => $this->data['name'],
                        'email' => $this->data['email'],
                        'message' => $this->data['message'],
                    ]);
    }
} 