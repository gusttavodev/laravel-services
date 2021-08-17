<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\Additional\AdditionalStoreRequest;
use App\Http\Requests\Product\Additional\AdditionalUpdateRequest;
use App\Http\Resources\Product\AdditionalResource;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product\Additional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class AdditionalController extends Controller
{
    public function index(Request $request)
    {
        $additionals = $request->user()->additionals();

        return Inertia::render('Product/Additional/Index', [
            'additionals' => AdditionalResource::collection($additionals->paginate(5)),
        ]);
    }

    public function create(Request $request)
    {
        $products = $request->user()->products;

        return Inertia::render('Product/Additional/Form', [
            'products' => ProductResource::collection($products),
        ]);
    }

    public function store(AdditionalStoreRequest $request)
    {
        $input = $request->validated();

        $additional = $request->user()->additionals()->create($input);

        if (!empty($input['products'])) {
            $additional->products()->sync($input['products']);
        }

        return Redirect::route('additionalIndex')->with('success', 'Adicional criado com sucesso !!!.');
    }

    public function show($id)
    {
    }

    public function edit(Request $request, Additional $additional)
    {
        $additional =  $request->user()->additionals()->findOrFail($additional->id);

        $products = $request->user()->products;

        return Inertia::render('Product/Additional/Form', [
            'additional' => new AdditionalResource($additional),
            'products'   => ProductResource::collection($products),
        ]);
    }

    public function update(AdditionalUpdateRequest $request, Additional $additional)
    {
        $input = $request->validated();

        $additional =  $request->user()->additionals()->findOrFail($additional->id);

        $additional->update($input);

        $additional->products()->sync($input['products']);

        return Redirect::route('additionalIndex')->with('success', 'Adicional atualizado com sucesso !!!.');
    }

    public function destroy(Request $request, Additional $additional)
    {
        $request->user()->additionals()->findOrFail($additional->id)->delete();

        return Redirect::back()->with('success', 'Adicional Removido.');
    }
}
