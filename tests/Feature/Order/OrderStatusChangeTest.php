<?php
use App\Models\Order\Order;

use function Pest\Laravel\assertDatabaseHas;

it('should be record order status on create order', function () {
    $order = Order::factory()->create(['status' => Order::CREATED]);

    assertDatabaseHas('order_status_changes', [
        'status'    => $order->status,
        'order_id'  => $order->id
    ]);
});

it('should be record order status on update order', function () {
    $order = Order::factory()->create(['status' => Order::CREATED]);

    assertDatabaseHas('order_status_changes', [
        'status'    => Order::CREATED,
        'order_id'  => $order->id
    ]);

    $order->update(['status' => Order::ACCEPTED]);

    assertDatabaseHas('order_status_changes', [
        'status'    => Order::ACCEPTED,
        'order_id'  => $order->id
    ]);
});
