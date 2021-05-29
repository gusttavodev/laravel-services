<?php

namespace Database\Factories\Product;


use App\Models\Product\Additional;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdditionalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Additional::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'price' => 10.4,
            'quantity_limit' => 5
        ];
    }
}
