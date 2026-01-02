<?php

namespace App\Listeners;

use Log;
use App\Models\Order;
use App\Events\OrderPlaced;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DecreaseProductStock
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
   public function handle(OrderPlaced $event)
    {
        \Log::info('LISTENER 3: Stock decrease kar raha hoon for Order #' . $event->order->id);
        foreach ($event->order->items as $item) {
            $item->product->decrement('stock', $item->quantity);
        }
        \Log::info('Stock updated successfully!');
    }
}
