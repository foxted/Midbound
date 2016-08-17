<?php

namespace Midbound\Listeners\Auth;

use Illuminate\Contracts\Mail\Mailer;
use Laravel\Spark\Events\Auth\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class SendWelcomeEmail
 * @package Midbound\Listeners\Auth
 */
class SendWelcomeEmail
{
    /**
     * Create the event listener.
     * @param \Illuminate\Contracts\Mail\Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $user = $event->user;
        $this->mailer->send('emails.welcome', compact('user'), function($message) use ($user) {
            $message->to($user->email, $user->name);
            $message->subject('Welcome to Midbound!');
        });
    }
}
