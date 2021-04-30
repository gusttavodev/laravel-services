<?php

namespace Database\Factories\Establishment;

use App\Models\Establishment\OpeningHour;
use Illuminate\Database\Eloquent\Factories\Factory;

class OpeningHourFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OpeningHour::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'start_time' => "05:05",
            'end_time' => "05:05",
            'day' =>  "monday",
        ];
    }
}
