<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderConfirmed extends Notification
{
    use Queueable;

    public $order;

    /**
     * Create a new notification instance.
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Your Order Has Been Confirmed')
            ->greeting('Hello ' . $this->order->name . '!')
            ->line('Thank you for shopping with us.')
            ->line('We have received your order and our team is now processing it.')
            // ->line('Order ID: ' . $this->order->id)
            // ->line('Total Amount: €' . number_format($this->order->total, 2))
            // ->line('We will notify you once your order is packed and ready for shipment/delivery.')
            ->salutation('Thank You,')
            ->markdown('emails.confirmed', [
                'order' => $this->order,
                'user' => $this->order
            ]);
    }
}
