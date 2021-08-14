<?php

namespace App\Observers\Order;

use App\Models\Order\Order;
use App\Models\Order\OrderStatusChanges;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        OrderStatusChanges::create([
            'order_id' => $order->id,
            'status' => Order::CREATED
        ]);
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        if(!empty($order->status)) {
            $orderChange = $order->statusChanges()->where('status', $order->status)->first();
            if(empty($orderChange)){
                OrderStatusChanges::create([
                    'order_id' => $order->id,
                    'status' => $order->status
                ]);
            }
        }
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
