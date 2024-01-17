<?php

namespace App\Notifications;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FollowNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $mail = '';
    private $website = '';
    public function __construct(private Ad $ad, private User $followed_by, private $send_via_email = 0, private $send_via_website=0)
    {
        $this->mail = $this->send_via_email ? 'mail' : '';
        $this->website = $this->send_via_website ? 'database' : '';
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [$this->mail, $this->website];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)

                    ->line('Korisnik ' . $this->followed_by->name . ' ' . $this->followed_by->lastname . ' je zapratio vas oglas'
                    . $this->ad->title . '.'
                    )
                    ->action('Pogledaj oglas', route('ads.show', ['ad' => $this->ad->id]))
                    ->line('Hvala vam sto koristite nasu aplikaciju! Podelite je sa ostalima');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'ad' => $this->ad->title,
            'followed_by' => $this->followed_by->name . ' ' . $this->followed_by->lastname,
        ];
    }
}
