<?php

namespace Database\Seeders;

use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Establishment\Address;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::all()->each(function($user) {
            $user->assignRole('user');
        });
        $address = Address::factory()->create();
        User::factory(2)->create(['address_id' => $address->id]);
        User::all()->each(function($user) {
            $user->assignRole('user');
        });

        User::create([
            'address_id' => $address->id,
            'phone' => "(31) 982001123",
            'name' => "Gustavo Silva",
            'email' => "gusttavo212@gmail.com",
            'password' => Hash::make('12345678'),
        ])->assignRole('admin');
    }
}
