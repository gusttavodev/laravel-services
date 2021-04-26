<?php

namespace Database\Factories\Product;

use Illuminate\Support\Str;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'picture' => "",
            'enable' => $this->faker->boolean(80),
            'priority' => 1,
            'description' => Str::random(10),
            'price' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
