<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class accountCreate extends Mailable
{
    use Queueable, SerializesModels;

    public $utilisateur;
    public $data;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->utilisateur = $user;
        $this->data = new \stdClass();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = __('auth.custom.attribute-name.rule-name');
        $this->data->username = $this->utilisateur->name;
        $this->data->message = __('passwords.reset');
        $this->subject($subject)->view('emails.template');
    }
}
