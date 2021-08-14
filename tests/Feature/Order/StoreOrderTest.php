<?php
use App\Models\Order\Order;

use function Pest\Laravel\post;
use function Pest\Laravel\seed;
use function Pest\Laravel\assertDatabaseHas;

it('should be create order', function () {
    $user = createUser();

    seed(CategorySeeder::class);
    seed(AdditionalSeeder::class);

    $firstEstablishment     = createEstablishment($user);

    $productData           = getProductsWithAdditionals(5, 3);
    $order                  = createOrder($firstEstablishment);
    $order['products']      = $productData['products'];

    post(route('orderStore'), $order)
        ->assertStatus(302)
        ->assertRedirect(route('establishmentOrderShow', [
            'tracking_link'    => $user->orders()->first()->tracking_link
        ]));

    $createdOrder = $user->orders()->first();

    assertDatabaseHas('orders', [
        'user_id' => $user->id,
        'establishment_id' => $firstEstablishment->id,

        'contact_phone' => $order['contact_phone'],
        'contact_name'  => $order['contact_name'],
        'payment_mode'  => $order['payment_mode'],
        'total_price'   => $productData['total_price']
    ]);

    assertDatabaseHas('order_status_changes', [
        'status'    => $createdOrder->status,
        'order_id'  => $createdOrder->id
    ]);

    foreach ($productData['products'] as $keyProduct => $valueProduct) {
        assertDatabaseHas('order_products', [
            'order_id'   => 1,
            'product_id' => $valueProduct["id"],
            'quantity'   => $valueProduct["quantity"]
        ]);
        foreach ($valueProduct["additionals"] as $keyAdditional => $valueAdditional) {
            assertDatabaseHas('order_product_additionals', [
                'order_id'      => 1,
                'product_id'    => $valueProduct["id"],
                'additional_id' => $valueAdditional["id"],
                'quantity'      => $valueAdditional["quantity"]
            ]);
        }
    }
});

it('should be create order with money', function () {
    $user = createUser();
    seed(CategorySeeder::class);
    seed(AdditionalSeeder::class);
    $firstEstablishment         = createEstablishment($user);
    $productData                = getProductsWithAdditionals(5, 3);
    $orderData                  = createOrder($firstEstablishment);
    $orderData['payment_mode']  = Order::MONEY;
    $orderData['need_change']   = true;

    // #TODO DEVE SER MAIOR QUE O TOTAL
    $orderData['value_paid_cash']   = 50.00;
    $orderData['products']          = $productData['products'];

    post(route('orderStore'), $orderData)
        ->assertStatus(302)
        ->assertRedirect(route('establishmentOrderShow', [
            'tracking_link'    => $user->orders()->first()->tracking_link
        ]));

    $order = $user->orders()->first();

    $totalPrice = $order->additionals_total_price + $order->products_total_price;
    $calculatedChange = $totalPrice - $orderData['value_paid_cash'];

    assertDatabaseHas('orders', [
        'user_id' => $user->id,
        'establishment_id' => $firstEstablishment->id,

        'total_price' => floatval($totalPrice),
        'need_change'   => true,
        'change_price'  => floatval($calculatedChange)
    ]);
});
