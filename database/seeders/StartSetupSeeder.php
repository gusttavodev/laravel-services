<?php

namespace Database\Seeders;

use App\Models\Establishment\Address;
use App\Models\Establishment\Establishment;
use App\Models\Establishment\Theme;
use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StartSetupSeeder extends Seeder
{
    protected $categories = [
        [
            'name'     => 'Açai',
            'path'     => 'images/categoryPicture/',
            'asset'    => '/assets/acai/',
            'fileName' => '0.jpg',
            'products' => [
                [
                    'name'        => 'Açai de 500',
                    'path'        => 'images/productPicture/',
                    'asset'       => '/assets/acai/',
                    'fileName'    => '0.jpg',
                ],
                [
                    'name'        => 'Suco de Açai',
                    'path'        => 'images/productPicture/',
                    'asset'       => '/assets/acai/',
                    'fileName'    => '1.jpg',
                ],
                [
                    'name'        => 'Creme de Açai',
                    'path'        => 'images/productPicture/',
                    'asset'       => '/assets/acai/',
                    'fileName'    => '2.jpg',
                ],
            ],
        ],
        [
            'name'     => 'Cerveja',
            'path'     => 'images/categoryPicture/',
            'asset'    => '/assets/beear/',
            'fileName' => '1.jpeg',
            'products' => [
                [
                    'name'        => 'Cerveja Pietra',
                    'path'        => 'images/productPicture/',
                    'asset'       => '/assets/beear/',
                    'fileName'    => '3.png',
                ],
                [
                    'name'        => 'Cerveja Lata',
                    'path'        => 'images/productPicture/',
                    'asset'       => '/assets/beear/',
                    'fileName'    => '4.jpg',
                ],
                [
                    'name'        => 'Brahma Duplo Malte',
                    'path'        => 'images/productPicture/',
                    'asset'       => '/assets/beear/',
                    'fileName'    => '5.jpg',
                ],
            ],
        ],
        [
            'name'      => 'Pizza',
            'path'      => 'images/categoryPicture/',
            'asset'     => '/assets/beear/',
            'fileName'  => '2.jpeg',
            'products'  => [
                 [
                    'name'        => 'Pizza Vegana',
                    'path'        => 'images/productPicture/',
                    'asset'       => '/assets/pizza/',
                    'fileName'    => '6.jpeg',
                ],
                [
                    'name'        => 'Pizza Especial',
                    'path'        => 'images/productPicture/',
                    'asset'       => '/assets/pizza/',
                    'fileName'    => '7.jpeg',
                ],
                [
                    'name'        => 'Pizza Quatro Queijos',
                    'path'        => 'images/productPicture/',
                    'asset'       => '/assets/pizza/',
                    'fileName'    => '8.jpeg',
                ],
            ],
        ],
    ];

    public function run()
    {
        $user          =  $this->createUserAdmin();
        $establishment = $this->createEstablishment($user);

        $this->createCategories($user);
    }

    private function createUserAdmin(): User
    {
        $address = Address::factory()->create();

        return User::create([
            'address_id' => $address->id,
            'phone'      => '(31) 982001123',
            'name'       => 'Gustavo Silva',
            'email'      => 'gusttavo212@gmail.com',
            'password'   => Hash::make('12345678'),
        ])->assignRole('admin');
    }

    private function createEstablishment(User $user): Establishment
    {
        $address = $user->address;
        $theme   = Theme::factory()->create(['user_id' => $user->id]);

        return Establishment::factory()->create([
            'user_id'        => $user->id, 'address_id' => $address->id, 'theme_id' => $theme->id,
            'picture'        => 'images/establishmentPicture/0.png',
        ]);
    }

    private function createCategories(User $user)
    {
        foreach ($this->categories as $value) {
            $category = $this->createCategory($user, $value['name'], $value['path'], $value['asset'], $value['fileName']);
            $this->createProducts($category, $user, $value['products']);
        }
    }

    private function createCategory(User $user, $name, $fileBasePath, $assetBasePath, $picture): Category
    {
        $filePath  = $fileBasePath . $picture;
        $assetPath = asset($assetBasePath . $picture);

        $hasFile = Storage::disk(env('FILESYSTEM_DRIVER'))->exists($filePath);
        if (!$hasFile) {
            Storage::disk(env('FILESYSTEM_DRIVER'))->put($filePath, $assetPath);
        }

        return Category::factory()->create(['name' => $name, 'picture' => $filePath, 'user_id' => $user->id]);
    }

    private function createProducts(Category $category, User $user, $products)
    {
        foreach ($products as $value) {
            $filePath  = $value['path'] . $value['fileName'];
            $assetPath = asset($value['asset'] . $value['fileName']);

            if (!Storage::disk(env('FILESYSTEM_DRIVER'))->exists($filePath)) {
                $filePath = Storage::disk(env('FILESYSTEM_DRIVER'))->put($filePath, $assetPath);
            }

            $category->products()->saveMany(
                Product::factory(1)->make(['name' => $value['name'], 'picture' => $filePath, 'user_id' => $user->id])
            );
        }
    }
}
