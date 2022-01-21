<?php

use App\Jobs\SendWelcomeEmail;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Mail;

it('sends the specified user a welcome email', function () {
    Mail::fake();

    $user = User::factory()->create(['email' => 'joe@blogs.com']);

    Bus::dispatchSync(new SendWelcomeEmail($user));

    Mail::assertSent(WelcomeMail::class, function (WelcomeMail $mail) {
        return $mail->hasTo('joe@blogs.com');
    });
});
