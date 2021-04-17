<?php

namespace Database\Seeders;

use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(2)->create();
        User::all()->each(function($user) {
            $user->assignRole('user');
        });

        User::create([
            'name' => "Gustavo Silva",
            'email' => "gusttavo212@gmail.com",
            'password' => Hash::make('12345678'),
        ])->assignRole('admin');
    }
}
