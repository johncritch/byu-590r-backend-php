<?php

use Illuminate\Mail\Mailable;

class ResetPasswordMail extends Mailable
{
    public $name;
    public $token;

    public function __construct($name, $token)
    {
        $this->name = $name;
        $this->token = $token;
    }

    public function build()
    {
        return $this->view('emails.resetPassword')->with([
            'name' => $this->name,
            'token' => $this->token
        ]);
    }
}
