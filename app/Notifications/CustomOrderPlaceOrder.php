<?php

namespace App\Notifications;

use Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomOrderPlaceOrder extends Notification
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
            'message' => 'has Place Order an Approved Custom Cake Design',
            'url' =>'/admin/custom?order_number='.$this->details['item_id']
        ];
    }
}
