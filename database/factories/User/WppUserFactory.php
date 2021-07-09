<?php

namespace Database\Factories\User;

use App\Models\User\WppUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class WppUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WppUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone' =>  $this->faker->phoneNumber
        ];
    }
}
