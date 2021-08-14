<?php

namespace App\Http\Controllers\Establishment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Establishment\Theme\ThemeStoreRequest;
use App\Http\Requests\Establishment\Theme\ThemeUpdateRequest;
use App\Http\Resources\Establishment\ThemeResource;
use App\Models\Establishment\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ThemeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index(Request $request)
    {
        $themes = $request->user()->themes();

        return Inertia::render('Establishment/Theme/Index', [
            'themes' => ThemeResource::collection($themes->paginate(5)),
        ]);
    }

    public function create()
    {
        return Inertia::render('Establishment/Theme/Form');
    }

    public function store(ThemeStoreRequest $request)
    {
        $input = $request->validated();

        $request->user()->themes()->create($input);

        return Redirect::route('themeIndex')->with('success', 'Tema criado com sucesso !!!.');
    }

    public function show($id)
    {
    }

    public function edit(Request $request, Theme $theme)
    {
        $theme =  $request->user()->themes()->findOrFail($theme->id);

        return Inertia::render('Establishment/Theme/Form', ['theme' => new ThemeResource($theme)]);
    }

    public function update(ThemeUpdateRequest $request, Theme $theme)
    {
        $input = $request->validated();

        $theme =  $request->user()->themes()->findOrFail($theme->id);

        $theme->update($input);

        return Redirect::route('themeIndex')->with('success', 'Tema Atualizado.');
    }

    public function destroy(Request $request, Theme $theme)
    {
        $request->user()->themes()->findOrFail($theme->id)->delete();

        return Redirect::back()->with('success', 'Tema Removido.');
    }
}
