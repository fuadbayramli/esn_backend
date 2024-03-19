<?php

namespace App\Notifications;

use Closure;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;

/**
 * VerifyEmailNotification notification
 *
 * * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class VerifyEmailNotification extends Notification
{
    /**
     * The callback that should be used to create the verify email URL.
     *
     * @var Closure|null
     */
    public static ?Closure $createUrlCallback;

    /**
     * Get the notification's channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail(mixed $notifiable): MailMessage
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return $this->buildMailMessage($verificationUrl);
    }

    /**
     * Get the verify email notification mail message for the given URL.
     *
     * @param string $url
     * @return MailMessage
     */
    protected function buildMailMessage(string $url): MailMessage
    {
        return (new MailMessage)
            ->subject(Lang::get('Verify Email Address'))
            ->line(Lang::get('Please click the button below to verify your email address.'))
            ->action(Lang::get('Verify Email Address'), $url)
            ->line(Lang::get('If you did not create an account, no further action is required.'));
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function verificationUrl(mixed $notifiable): string
    {
        $url = URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );

        return str_replace("api/", "",$url);
    }

    /**
     * Set a callback that should be used when creating the email verification URL.
     *
     * @param Closure $callback
     * @return void
     */
    public static function createUrlUsing(Closure $callback): void
    {
        static::$createUrlCallback = $callback;
    }
}
