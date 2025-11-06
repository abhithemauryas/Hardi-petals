<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderStatusChange extends Notification
{
    use Queueable;
    protected $subject="Order status has changed!";
    protected $body;
    protected $products;
    protected $name;
    protected $templates = [
        "Your order{orderID} has been cancelled successfully for the products {PRODUCTS}.",
        "Your order{orderID} status for the products {PRODUCTS} has changed to pending.",
        "Your order{orderID} has been confirmed for the products {PRODUCTS}.",
        "Your order{orderID} has been packed and ready to ship with the products {PRODUCTS}.",
        "Your order{orderID} for {PRODUCTS} is now out for delivery.",
        "Your order{orderID} for {PRODUCTS} has been successfully delivered.",
        "Your request for return has been registered successfully for products: {PRODUCTS}. You will be refunded when confirmed",
        "Your request for return has been completed for products: {PRODUCTS}. You are refunded with the amount paid.",
    ];
    /**
     * Create a new notification instance.
     */
    public function __construct($products=[], $stat, $orderNumber, $customer)
    {
        $this->products = implode(", ", $products);
        $this->body = str_replace("{PRODUCTS}", $this->products, $this->templates[$stat]);
        $this->body = str_replace("{orderID}", $orderNumber, $this->body);
        $this->name = $customer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
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
            ->greeting('Hi ' . $this->name . '!')
            ->subject($this->subject)
            ->line($this->body);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
