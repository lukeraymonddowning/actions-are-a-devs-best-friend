<?php

namespace App\Actions;

use App\Contracts\SendsWelcomeMail;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Contracts\Mail\Mailer;

class SendWelcomeMail implements SendsWelcomeMail
{
    public function __construct(private Mailer $mail)
    {
    }

    public function __invoke(User $user): void
    {
        $this->mail->to($user)->send(new WelcomeMail($user));
    }
}
