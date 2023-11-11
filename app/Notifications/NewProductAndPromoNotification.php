<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewProductAndPromoNotification extends Notification
{
    protected $productOrPromo;

    public function __construct($productOrPromo)
    {
        $this->productOrPromo = $productOrPromo;
    }

    public function toMail($notifiable)
    {
        $message = new MailMessage();

        if ($this->productOrPromo instanceof \App\Models\Product) {
            $message->line('New product has been added!')
                ->line('Product Name: ' . $this->productOrPromo->name)
                ->action('View Product', url('/buyer/product/detail/' . $this->productOrPromo->id));
        } elseif ($this->productOrPromo instanceof \App\Models\Promo) {
            $message->line('New promo has been created!')
                ->line('Promo Name: ' . $this->productOrPromo->name)
                ->action('View Promo', url('/buyer/product/detail/' . $this->productOrPromo->id));
        }

        return $message;
    }

    // Add the via method for email notification
    public function via($notifiable)
    {
        return ['mail'];
    }
}
