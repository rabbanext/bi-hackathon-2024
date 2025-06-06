<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPassword extends ResetPasswordNotification
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from('noreply-hackathonfekdi@gmail.com', 'Hackathon Team')
            ->subject('BI - OJK Hackathon 2025 - Reset Password Anda')
            ->view('emails.reset', [
                'url' => url(route('password.reset', [
                    'token' => $this->token,
                    'email' => $notifiable->getEmailForPasswordReset(),
                ], false)),
                'user' => $notifiable,
            ]);
    }
}
