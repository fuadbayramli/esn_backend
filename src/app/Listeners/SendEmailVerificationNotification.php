<?php

namespace App\Listeners;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

/**
 * SendEmailVerificationNotification listener
 *
 * * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class SendEmailVerificationNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->member instanceof MustVerifyEmail && ! $event->member->hasVerifiedEmail()) {
            $event->member->sendEmailVerificationNotification();
        }
    }
}
