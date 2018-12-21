<?php

namespace App\Notifications;

use App\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserUnSubscribeNotification extends Notification
{
    use Queueable;

    public $event;

    /**
     * Create a new notification
     *
     * @return void
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * Get notificatie delivery channels
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Notificatie in versie van email
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Hi ' . $notifiable->name . ' You have unsubscribed from the event' . $this->event->naam . ' with success')
            ->line('Begin ' . $this->event->begindate . '. End ' . $this->event->enddate)
            ->action('Go to home', url('/homepage'))
            ->line('Thank you for using our application!');
    }

    /**
     * Array representatie van de notificatie
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'event' => $this->event,
            'notifiable' => $notifiable,
            'message' => 'You have unsubscribed from the event' . $this->event->naam . ' with success',
        ];
    }
}
