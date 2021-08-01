<?php

namespace Database\Factories\Establishment;

use App\Models\Establishment\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'zip_code' => $this->faker->postcode(),
            'street' => $this->faker->streetName(),
            'city' =>  $this->faker->city(),
            'country' =>  $this->faker->country(),
            'district' => $this->faker->streetName(),
            'state' => $this->faker->state(),
            'number' => $this->faker->buildingNumber(),
            'complement' => $this->faker->secondaryAddress(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
        ];
    }
}
