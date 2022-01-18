<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(private User $user)
    {
    }

    public function build(): self
    {
        return $this->view('mail.welcome', [
            'user' => $this->user,
        ]);
    }
}
