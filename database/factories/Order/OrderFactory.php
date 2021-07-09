<?php

namespace Database\Factories\Order;

use App\Models\Order\Order;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $paymentMode = array_search(Arr::random(Order::PAYMENT_MODES), Order::PAYMENT_MODES);
        $deliveryMode = array_search(Arr::random(Order::DELIVERY_MODES), Order::DELIVERY_MODES);
        $status = array_search(Arr::random(Order::STATUSES), Order::STATUSES);

        return [
            'need_change' => $this->faker->boolean(50),
            'change_price' => $this->faker->numberBetween(0, 15),

            'total_price' => $this->faker->numberBetween(20, 100),

            'delivery_tax' => $this->faker->numberBetween(0, 20),
            'tracking_link' => $this->faker->uuid(),

            'payment_mode' => $paymentMode,
            'status' => $deliveryMode,
            'delivery_mode' => $status
        ];
    }
}
