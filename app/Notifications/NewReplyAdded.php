<?php

namespace LaravelForum\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use LaravelForum\Discussion;

class NewReplyAdded extends Notification implements ShouldQueue
{
    use Queueable;
    public $discussion;

    public function __construct(Discussion $discussion)
    {
        $this->discussion = $discussion;
    }

    public function via($notifiable)
    {
        return ['mail','database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('A new reply was added to your discussion.')
                    ->action('View discussion', route('discussions.show', $this->discussion->slug))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'discussion' => $this->discussion
        ];
    }
}
