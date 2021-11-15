<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterContactMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.registerContact')
            ->from($this->data['email'])
            ->subject('Demande nouveau formateur')
            ->with([
                'user' => $this->data,
                'lastname'=> $this->data['lastname'],
                'firstname'=> $this->data['firstname'],
                'email' => $this->data['email'],
            ]);
    }
}
