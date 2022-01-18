<?php

namespace App\Jobs;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private User $user)
    {
    }

    public function handle(Mailer $mail): void
    {
        $mail->to($this->user)->send(new WelcomeMail($this->user));
    }
}
