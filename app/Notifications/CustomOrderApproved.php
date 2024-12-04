<?php

namespace App\Notifications;

use Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomOrderApproved extends Notification
{
    use Queueable;

    private $details;

    public function __construct($details)
    {
        $this->details = $details;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }


    public function toDatabase($notifiable)
    {
        return [
            'sender_id' =>  Auth::user()->id,
            'title' => 'Custom Cake Design Approved',
            'message' => 'Custom Cake Design Approved!'.PHP_EOL.'price: '.$this->details['given_price'].' '.PHP_EOL.'note: '.$this->details['given_note'],
            'url' =>'/user?order_number='.$this->details['item_id']
        ];
    }
}
