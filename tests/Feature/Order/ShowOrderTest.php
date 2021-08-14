<?php

use App\Http\Resources\Establishment\EstablishmentResource;
use App\Http\Resources\Order\OrderResource;
use App\Models\Order\Order;
use App\Services\OrderService;
use Inertia\Testing\Assert;
use function Pest\Laravel\get;

it('should be show order with tracking link', function () {
    $orderService   = new OrderService();
    $user  = createUser();
    $firstEstablishment  = createEstablishment($user);
    $firstEstablishment->orders()->saveMany(
        Order::factory(1)->create()
    );

    $firstOrder = $firstEstablishment->orders()->first();

    get(route('establishmentOrderShow', [
        'tracking_link'    => $firstOrder->tracking_link,
        'public_link_name' => $firstEstablishment->public_link_name,
    ]))
        ->assertStatus(200)
        ->assertInertia(fn (Assert $page) => $page
            ->component('Establishment/Menu/Order/Tracking/Index')
            ->where('order', new OrderResource($firstOrder))
            ->where('establishment', new EstablishmentResource($firstEstablishment))
            ->where('orderStatusChanges', $orderService->formatOrderStatusChanges($firstOrder->statusChanges))
        );
});
