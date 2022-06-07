<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrderShipped extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order_item, $product, $order, $user)
    {
        $this->order_item = $order_item;
        $this->product = $product;
        $this->order = $order;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/order/my-orders'); 
        return (new MailMessage)
                    ->subject('Il tuo ordine è stato spedito')
                    ->greeting('Ciao '.$this->user->name.',')
                    ->line('Il tuo ordine di '.$this->product->name.' è stato spedito.')
                    ->action('Visualizza la sezione ordini', $url)
                    ->line('Ci auguriamo di rivederti presto.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'name' => $this->product->name,
            'order_number' => $this->order->id,
            'order_date' => $this->order->order_date,
            'shipped_date' => $this->order->shipped_date,
            'order_total' => $this->order->order_total
        ];
    }
}
