<?php
use App\Models\User\User;
use App\Models\Order\Order;
use App\Models\Establishment\Address;

use Illuminate\Support\Arr;

use function Pest\Faker\faker;
use function Pest\Laravel\post;
use function Pest\Laravel\seed;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;

it('should be create order', function () {
    seed(RoleSeeder::class);

    $user = User::factory()->create();
    $user->assignRole('admin');
    actingAs($user);

    seed(CategorySeeder::class);
    seed(EstablishmentSeeder::class);
    seed(AdditionalSeeder::class);

    $expectedData = getProductsWithAdditionals(5, 3);
    $products = $expectedData['products'];

    $order['contact_phone'] = faker()->phoneNumber;
    $order['contact_name']  = faker()->name;
    $order['delivery_mode'] = Arr::random(array_keys(Order::DELIVERY_MODES));
    $order['payment_mode']  = Arr::random(array_keys(Order::PAYMENT_MODES));
    $order['products']      =   $products;
    $order['address']       = Address::factory()->make()->toArray();

    $response = post(route('orderStore'), $order);

    $response->assertStatus(200);
    assertDatabaseHas('orders', [
        'id'            => 1,
        'contact_phone' => $order['contact_phone'],
        'contact_name'  => $order['contact_name'],
        'payment_mode'  => $order['payment_mode'],
        'total_price'  => $expectedData['total_price']
    ]);

    foreach ($products as $keyProduct => $valueProduct) {
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


})->group('current');
