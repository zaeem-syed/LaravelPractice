<?php

namespace App\Listeners;

use App\Models\Order;
use App\Events\OrderPlaced;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOrderConfirmationEmail
{
    /**
     * Create the event listener.
     */

    public function __construct()
    {

       
    }

    /**
     * Handle the event.
     */
    public function handle(OrderPlaced $event): void
    {
        //
        \Log::info('EVENT FIRED: OrderPlaced event dispatch hua for Order #' . $event->order->id);
    }
}
