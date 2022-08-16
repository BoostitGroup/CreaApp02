<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CotisationsNotification extends Notification
{
    use Queueable;
    private $cotisationsData;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($cotisationsData)
    {
        $this->cotisationsData=$cotisationsData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
            'cotisation_id' => $this->cotisationsData['cotisation_id'],

            'Adherent' => $this->cotisationsData['Adherent'],
            'Contenu' => $this->cotisationsData['Contenu'],
            'Type' => $this->cotisationsData['Type'],

        ];
    }
}
