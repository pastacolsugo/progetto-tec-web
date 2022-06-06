<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SoldOut extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($product, $seller)
    {
        $this->product = $product;
        $this->seller = $seller;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/seller/listings'); 
        return (new MailMessage)
                    ->subject('Prodotto esaurito')
                    ->greeting('Ciao '.$this->seller->name.',')
                    ->line('Il prodotto  '.$this->product->name.' è esaurito. Rifornisci le scorte al più presto!')
                    ->action('Visualizza i tuoi prodotti', $url);
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
            'name'=> $this->product->name,
            'category'=>$this->product->category_id,
        ];
    }
}
