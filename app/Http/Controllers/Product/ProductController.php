<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Http\Resources\Product\AdditionalResource;
use App\Http\Resources\Product\CategoryResource;
use App\Http\Resources\Product\ProductCategoryResource;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index(Request $request)
    {
        $categories  = $request->user()->categories();
        $products    = $request->user()->products()->search();

        return Inertia::render('Product/Index', [
            'products'    => ProductCategoryResource::collection($products->paginate(5)),
            'categories'  => CategoryResource::collection($categories->paginate(20)),
        ]);
    }

    public function create(Request $request)
    {
        $categories  = $request->user()->categories();
        $additionals = $request->user()->additionals();

        return Inertia::render('Product/Form', [
            'categories'  => CategoryResource::collection($categories->paginate(20)),
            'additionals' => AdditionalResource::collection($additionals->paginate(20)),
        ]);
    }

    public function store(ProductStoreRequest $request)
    {
        $input = $request->validated();

        $input['picture'] = Storage::disk(env('FILESYSTEM_DRIVER'))->put('images/productPicture', $request->file('picture'));

        $product = $request->user()->products()->create($input);

        if (!empty($input['categories'])) {
            $categories = json_decode($input['categories']);
            $product->categories()->sync($categories);
        }
        if (!empty($input['additionals'])) {
            $additionals = json_decode($input['additionals']);
            $product->additionals()->sync($additionals);
        }

        return Redirect::route('productIndex')->with('success', 'Categoria Criada.');
    }

    public function show(Product $product)
    {
    }

    public function edit(Request $request, Product $product)
    {
        $product     =  $request->user()->products()->findOrFail($product->id);
        $categories  = $request->user()->categories();
        $additionals = $request->user()->additionals();

        return Inertia::render('Product/Form', [
            'product'     => new ProductCategoryResource($product),
            'categories'  => CategoryResource::collection($categories->paginate(5)),
            'additionals' => AdditionalResource::collection($additionals->paginate(5)),
        ]);
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product =  $request->user()->products()->findOrFail($product->id);

        if ($request->categories) {
            $categories = json_decode($request->categories);
            $product->categories()->sync($categories);
        }

        if ($request->additionals) {
            $additionals = json_decode($request->additionals);
            $product->additionals()->sync($additionals);
        }

        if ($request->picture) {
            $product->picture =  Storage::disk(env('FILESYSTEM_DRIVER'))->put('images/productPicture', $request->file('picture'));
        }

        $product->name        = $request->name;
        $product->priority    = $request->priority;
        $product->price       = $request->price;
        $product->description = $request->description;
        $product->enable      = $request->enable == '1' ? true : false;

        $product->save();

        return Redirect::route('productIndex')->with('success', 'Produto Atualizado.');
    }

    public function destroy(Request $request, Product $product)
    {
        $request->user()->products()->findOrFail($product->id)->delete();

        return Redirect::back()->with('success', 'Produto Removido.');
    }
}
