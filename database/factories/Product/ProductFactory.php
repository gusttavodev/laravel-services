<?php

namespace Database\Factories\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name'        => $this->faker->name,
            'picture'     => '',
            'enable'      => $this->faker->boolean(80),
            'priority'    => 1,
            'description' => Str::random(10),
            'price'       => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
