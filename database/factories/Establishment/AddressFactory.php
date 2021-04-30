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
            'zip_code' => "33030120",
            'street' => "Rua alto do tanque",
            'city' =>  "Santa Luzia",
            'country' =>  "Brasil",
            'district' => "Nossa Senhora das Graças",
            'state' => "Minas Gerais",
            'number' => "780",
            'complement' => "Casa 7",
            'latitude' => 19.7750216,
            'longitude' => -43.872851,
        ];
    }
}
