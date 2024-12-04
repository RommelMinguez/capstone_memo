<?php

namespace App\Notifications;

use Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserRegistered extends Notification
{
    use Queueable;

    // private $details;

    // public function __construct($details)
    // {
    //     $this->details = $details;
    // }


    public function via(object $notifiable): array
    {
        return ['database'];
    }


    public function toDatabase($notifiable)
    {
        // return [
        //     'sender_id' => Auth::user()->id,
        //     'title' => $this->details['title'],
        //     'message' => $this->details['message'],
        //     'url' => $this->details['url']
        // ];
        return [
            'sender_id' => Auth::user()->id,
            'title' => 'New User Registered',
            'message' => 'New User Registered!',
            'url' => '/admin'
        ];
    }
}
