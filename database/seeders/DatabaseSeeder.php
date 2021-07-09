<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\AdditionalSeeder;
use Database\Seeders\EstablishmentSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(AdditionalSeeder::class);
        $this->call(EstablishmentSeeder::class);

        $this->call(OrderSeeder::class);
    }
}
