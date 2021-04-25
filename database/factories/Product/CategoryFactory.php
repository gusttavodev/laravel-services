<?php

namespace Database\Factories\Product;

use App\Models\Model;
use App\Models\Product\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

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
            'priority' => 1,
            'enable' => true
        ];
    }
}
