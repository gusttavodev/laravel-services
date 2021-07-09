<?php

namespace Database\Factories\Order;

use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'need_change' => true,
            'change_price' => $this->faker->numberBetween(10, 15),
            'total_price' => $this->faker->numberBetween(20, 100),

            'delivery_tax' => $this->faker->numberBetween(0, 20),
            'tracking_link' => $this->faker->uuid()
        ];
    }
}
