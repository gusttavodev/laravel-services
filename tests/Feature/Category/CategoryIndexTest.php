<?php

use App\Http\Resources\Product\CategoryResource;
use App\Models\Product\Category;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Inertia\Testing\Assert;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\postJson;
use function Pest\Laravel\seed;

// VERIFY IS ADMIN with admin

it('should be render index categories with admin', function () {
    $user = createUser();

    seed(CategorySeeder::class);

    $categories = $user->categories();

    get(route('categoryIndex'))->assertStatus(200)
    ->assertInertia(fn (Assert $page) => $page
            ->component('Product/Category/Index')
            ->where('categories', CategoryResource::collection($categories->paginate(5)))
    );
});

it('should be render create category with admin', function () {
    createUser();

    get(route('categoryCreate'))->assertStatus(200)
    ->assertInertia(fn (Assert $page) => $page
        ->component('Product/Category/Form')
    );
});

it('should be store category with admin', function () {
    $user = createUser();

    Storage::fake('public');

    $category = Category::factory()->make()->toArray();
    $category['picture'] = UploadedFile::fake()->image('picture.jpg');

    post(route('categoryStore'), $category)->assertStatus(302);

    Storage::disk('public')->assertExists('images/categoryPicture/' . $category['picture']->hashName());

    assertDatabaseHas('categories', [
        'name'     => $category['name'],
        'priority' => $category['priority'],
        'enable'   => $category['enable'],
        'user_id'  => $user->id,
    ]);
});

it('should be not store category with validation rules messages', function () {
    $user = createUser();

    $response = postJson(route('categoryStore'));
    $data = json_decode($response->getContent(), true);

    $this->assertEquals($data['message'], 'The given data was invalid.');
    $this->assertEquals($data['errors'], [
        'name' => [
            0 => 'The name field is required.',
        ],
        'priority' => [
            0 => 'The priority field is required.',
        ],
        'enable' => [
            0 => 'The enable field is required.',
        ],
        'picture' => [
            0 => 'The picture field is required.',
        ],
    ]);
})->group('current');
