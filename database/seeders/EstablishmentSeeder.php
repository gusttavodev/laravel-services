<?php

namespace Database\Seeders;

use App\Models\User\User;
use Illuminate\Database\Seeder;
use App\Models\Establishment\Theme;
use App\Models\Establishment\Address;
use App\Models\Establishment\OpeningHour;
use App\Models\Establishment\Establishment;

class EstablishmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            // Theme
            User::all()->each(function($user) {
                $user->categories()->saveMany(
                    Theme::factory(1)->make(['user_id' => $user->user_id])
                );
            });

            // Address
            Address::factory(1)->create();


            // Establishment
            User::all()->each(function($user) {
                $address = Address::first();
                $theme = Theme::first();
                $user->establishments()->saveMany(
                    Establishment::factory(1)->make([
                        'user_id' => $user->id, 'address_id' => $address->id, 'theme_id' => $theme->id
                    ])
                )->each(function($establishment) {
                    $establishment->openingHours()->saveMany(
                        OpeningHour::factory(1)->make([
                            'establishment_id' => $establishment->id
                        ])
                    );
                });
            });
    }
}
