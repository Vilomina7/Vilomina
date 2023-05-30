<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewNotification extends Notification
{
    public function via($notifiable)
    {
        return ['mail', 'database']; // Mengirim notifikasi melalui email dan disimpan dalam database
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Pemberitahuan Baru')
            ->line('Anda memiliki pemberitahuan baru.')
            ->action('Lihat Pemberitahuan', url('/dashboard/notification'))
            ->line('Terima kasih!');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'Anda memiliki pemberitahuan baru.',
            'link' => '/dashboard/notification'
        ];
    }
}
