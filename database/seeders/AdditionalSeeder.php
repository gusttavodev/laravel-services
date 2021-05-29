<?php

namespace Database\Seeders;

use App\Models\User\User;
use Illuminate\Database\Seeder;
use App\Models\Product\Additional;

class AdditionalSeeder extends Seeder
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
            $user->products()->each(function ($product) {
                $product->additionals()->saveMany(
                    Additional::factory(2)->make(['user_id' => $product->user_id])
                );
            });
        });
    }
}
