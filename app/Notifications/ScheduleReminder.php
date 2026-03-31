<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ScheduleReminder extends Notification
{
    use Queueable;

    public function __construct(public $schedule)
    {
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'title' => 'Reminder',
            'message' => 'Waktunya: ' . $this->schedule->title,
        ];
    }
    
}
