<?php

namespace App\Listeners;

use App\Events\ProductSoldOut;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Product;
use App\Models\User;
use App\Notifications\SoldOut;

class SendSoldOutNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ProductSoldOut  $event
     * @return void
     */
    public function handle(ProductSoldOut $event)
    {
        $seller = User::find($event->product->seller_id);
        $seller->notify(new SoldOut($event->product));
    }
}
