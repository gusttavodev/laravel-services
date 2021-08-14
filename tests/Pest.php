<?php

use App\Models\User\User;
use App\Models\Order\Order;
use Illuminate\Support\Arr;
use App\Models\Product\Product;
use App\Models\Establishment\Theme;

use App\Models\Establishment\Address;

use App\Models\Establishment\OpeningHour;

use App\Models\Establishment\Establishment;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Faker\faker;
use function Pest\Laravel\seed;
use function Pest\Laravel\actingAs;

uses(Tests\TestCase::class)->in('Feature');
uses(RefreshDatabase::class)->in('Feature');

uses(Tests\TestCase::class)->in('Unit');
uses(RefreshDatabase::class)->in('Feature');

function createUser($role = 'admin'): User
{
    seed(RoleSeeder::class);

    $user = User::factory()->create();
    $user->assignRole($role);
    actingAs($user);

    return $user;
}

function createOrder(Establishment $establishment): array
{
    $order['need_change'] = false;
    $order['value_paid_cash'] = null;
    $order['establishment_id'] = $establishment->id;
    $order['contact_phone'] = faker()->phoneNumber;
    $order['contact_name']  = faker()->name;
    $order['delivery_mode'] = Arr::random(array_keys(Order::DELIVERY_MODES));
    $order['payment_mode']  = Arr::random(array_keys(Order::PAYMENT_MODES));
    $order['address']       = Address::factory()->make()->toArray();

    return $order;
}

function createEstablishment(User $user ): Establishment
{
    $theme = Theme::factory()->create(['user_id' => $user->id]);
    $address = Address::factory()->create();

    $establishment = Establishment::factory()->create([
        'user_id' => $user->id,
        'address_id' => $address->id,
        'theme_id' => $theme->id
    ]);

    $establishment->openingHours()->saveMany(
        OpeningHour::factory(1)->make([
            'establishment_id' => $establishment->id
        ])
    );

    return $establishment;
}

function getProductsWithAdditionals(int $numberOfProducts = 5, int $numberOfAdditionals = 5): array
{
    $products = Product::take($numberOfProducts)->select('id', 'price')->get();
    $selectedProducts = $products->toArray();

    $productsPrice = 0;
    $additionalsPrice = 0;

    foreach ($products as $key => $value) {
        $productQuantity = faker()->numberBetween(1, 5);
        $selectedProducts[$key]['quantity'] = $productQuantity;
        $productsPrice += $value->price*$productQuantity;

        $selectedProducts[$key]['additionals'] = $value->additionals()->inRandomOrder()->limit($numberOfAdditionals)
            ->select('additionals.id', 'additionals.price')->get()->toArray();

        foreach ($selectedProducts[$key]['additionals'] as $keyAdditional => $valueAdditional) {
            $additionalsQuantity = faker()->numberBetween(1, 5);
            $additionalsPrice += $valueAdditional['price']*$additionalsQuantity;
            $selectedProducts[$key]['additionals'][$keyAdditional]['quantity'] = $additionalsQuantity;
        }
    }

    $response = [
        'products' => $selectedProducts,
        'products_price' => $productsPrice,
        'additionals_price' => $additionalsPrice,
        'total_price' => $productsPrice+$additionalsPrice
    ];

    return $response;
}
