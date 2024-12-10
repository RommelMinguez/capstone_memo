<?php

namespace App\Notifications;

use App\Models\User;
use Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomOrderStatusUpdated extends Notification
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
            'title' => 'Custom Order Status Updated',
            'message' => 'Custom Order Status Updated: '.$this->details['status'],
            'url' =>'/user/custom-order?order_number='.$this->details['item_id']
        ];
    }
}