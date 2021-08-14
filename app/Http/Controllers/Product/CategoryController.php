<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CategoryStoreRequest;
use App\Http\Requests\Product\CategoryUpdateRequest;
use App\Http\Resources\Product\CategoryResource;
use App\Models\Product\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

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
            'categories' => CategoryResource::collection($categories->paginate(5)),
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
     * @param \Illuminate\Http\Request $request
     *
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
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
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
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category =  $request->user()->categories()->findOrFail($category->id);

        if ($request->picture) {
            $category->picture =  Storage::disk(env('FILESYSTEM_DRIVER'))->put('images/categoryPicture', $request->file('picture'));
        }

        $category->name     = $request->name;
        $category->priority = $request->priority;
        $category->enable   = $request->enable;
        $category->save();

        return Redirect::route('categoryIndex')->with('success', 'Categoria Atualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category)
    {
        $request->user()->categories()->findOrFail($category->id)->delete();

        return Redirect::back()->with('success', 'Categoria Removida.');
    }
}
