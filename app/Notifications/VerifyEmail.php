<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;

class VerifyEmail extends VerifyEmailBase
{
    use Queueable;

    protected $customer_nr;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($customer_nr)
    {
        $this->customer_nr = $customer_nr;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback)
        {
            return call_user_func(static::$toMailCallback, $notifiable);
        }
        return (new MailMessage)
            ->subject(Lang::getFromJson('Verifieer email adres'))
            ->line(Lang::getFromJson('Met de knop hieronder verifieerd u uw email adres'))
            ->line(Lang::getFromJson('na het verifieren kunt u inloggen met uw wachtwoord en klantnummer:' . $this->customer_nr ))
            ->action(
                Lang::getFromJson('Verifieer email adres'),
                $this->verificationUrl($notifiable)
            )
            ->line(Lang::getFromJson('als u geen account heeft gecrieerd hoef u hier niks mee te doen.'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
