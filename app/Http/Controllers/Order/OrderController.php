<?php

namespace App\Http\Controllers\Order;

use Inertia\Inertia;
use App\Models\Order\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Order\OrderResource;

class OrderController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index(Request $request)
    {
        // $orders = $request->user()->additionals();
        $orders = Order::where('id', '>', 0);

        return Inertia::render('Order/Index', [
            'orders' => OrderResource::collection($orders->paginate(5))
        ]);
    }

    // public function create()
    // {
    //     return Inertia::render('Product/Category/Form');
    // }

    // public function store(CategoryStoreRequest $request)
    // {
    //     $input = $request->validated();

    //     $input['picture'] = Storage::disk(env('FILESYSTEM_DRIVER'))->put('images/categoryPicture', $request->file('picture'));

    //     $request->user()->categories()->create($input);

    //     return Redirect::route('categoryIndex')->with('success', 'Categoria Criada.');
    // }

    // public function show(Category $category)
    // {
    //     //
    // }

    // public function edit(Request $request, Category $category)
    // {
    //     $category =  $request->user()->categories()->findOrFail($category->id);

    //     return Inertia::render('Product/Category/Form', ['category' => new CategoryResource($category)]);
    // }

    // public function update(CategoryUpdateRequest $request, Category $category)
    // {
    //     $category =  $request->user()->categories()->findOrFail($category->id);

    //     if ($request->picture) {
    //         $category->picture =  Storage::disk(env('FILESYSTEM_DRIVER'))->put('images/categoryPicture', $request->file('picture'));
    //     }

    //     $category->name = $request->name;
    //     $category->priority = $request->priority;
    //     $category->enable = $request->enable;
    //     $category->save();

    //     return Redirect::route('categoryIndex')->with('success', 'Categoria Atualizada.');
    // }

    // public function destroy(Request $request, Category $category)
    // {
    //    $request->user()->categories()->findOrFail($category->id)->delete();

    //     return Redirect::back()->with('success', 'Categoria Removida.');
    // }
}
