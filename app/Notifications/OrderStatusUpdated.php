<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderStatusUpdated extends Notification
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
            'sender_id' => User::where('is_admin', true)->value('id'),
            'title' => 'Order Status Updated',
            'message' => 'Order Status Updated: '.$this->details['status'],
            'url' => '/user?order_number='.$this->details['item_id']
        ];
    }
}
