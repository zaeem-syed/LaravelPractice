<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdminNewOrder
{
    /**
     * Create the event listener.
     */
    
    public function __construct()
    {
        //
        
       
    }

    /**
     * Handle the event.
     */
    public function handle(OrderPlaced $event): void
    {
        //

         \Log::info('LISTENER 2: Admin ko notify kar raha hoon for Order #' . $event->order->id);
    }
}
