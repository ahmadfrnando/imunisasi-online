<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PenyuluhanNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {   
        return (new MailMessage)
            ->subject('Penyuluhan Imunisasi Puskesmas Pembantu Sumber Mulyorejo Binjai')
            ->greeting('Hi Bapak/Ibu!')
            ->line('Jangan lupa untuk datang kembali ke  Puskesmas Pembantu Sumber Mulyorejo Binjaai Pada tanggal')
            
            ->line('Terima kasih telah datang ke Puskesmas Pembantu Sumber Mulyorejo Binjai');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}