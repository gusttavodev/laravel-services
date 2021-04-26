<?php

namespace Database\Seeders;

use App\Models\User\User;
use App\Models\Product\Product;
use Illuminate\Database\Seeder;
use App\Models\Product\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Registra de forma encadeadas
        User::all()->each(function ($user) {
            $user->categories()->saveMany(
                Category::factory(5)->make()
            )->each(function ($category) {
                $category->products()->saveMany(
                    Product::factory(10)->make(['user_id' => $category->user_id])
                );
            });
        });
    }
}
