<?php

use App\Models\Product\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Faker\faker;


uses(Tests\TestCase::class)->in('Feature');
uses(RefreshDatabase::class)->in('Feature');

uses(Tests\TestCase::class)->in('Unit');
uses(RefreshDatabase::class)->in('Feature');

/**
 * Get Number Of Products and Number Of Additionals
 *
 * @return TestCase
 */
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
