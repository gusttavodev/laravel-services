<?php

namespace App\Http\Controllers\Product;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Product\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Resources\Product\CategoryResource;
use App\Http\Requests\Product\CategoryStoreRequest;
use App\Http\Requests\Product\CategoryUpdateRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = $request->user()->categories();

        return Inertia::render('Product/Category/Index', [
            'categories' => CategoryResource::collection($categories->paginate(5))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Product/Category/Form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $input = $request->validated();

        $input['picture'] = Storage::disk(env('FILESYSTEM_DRIVER'))->put('images/categoryPicture', $request->file('picture'));

        $request->user()->categories()->create($input);

        return Redirect::route('categoryIndex')->with('success', 'Categoria Criada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Category $category)
    {
        $category =  $request->user()->categories()->findOrFail($category->id);

        return Inertia::render('Product/Category/Form', ['category' => new CategoryResource($category)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CategoryUpdateRequest  $request
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category =  $request->user()->categories()->findOrFail($category->id);

        if ($request->picture) {
            $category->picture =  Storage::disk(env('FILESYSTEM_DRIVER'))->put('images/categoryPicture', $request->file('picture'));
        }

        $category->name = $request->name;
        $category->priority = $request->priority;
        $category->enable = $request->enable;
        $category->save();

        return Redirect::route('categoryIndex')->with('success', 'Categoria Atualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category)
    {
        $category =  $request->user()->categories()->findOrFail($category->id)->delete();

        return Redirect::back()->with('success', 'Categoria Removida.');
    }
}
