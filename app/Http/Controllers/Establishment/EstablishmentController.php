<?php

namespace App\Http\Controllers\Establishment;

use App\Enums\DaysOfWeek;
use App\Http\Controllers\Controller;
use App\Http\Requests\Establishment\EstablishmentStoreRequest;
use App\Http\Resources\Establishment\EstablishmentResource;
use App\Http\Resources\Establishment\ThemeResource;
use App\Http\Resources\Product\CategoryProductResource;
use App\Models\Establishment\Establishment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class EstablishmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('showEstablishmentPublic');
        $this->middleware('verified')->except('showEstablishmentPublic');
    }

    public function index(Request $request)
    {
        $establishments = $request->user()->establishments();

        return Inertia::render('Establishment/Index', [
            'establishments' => EstablishmentResource::collection($establishments->paginate(5)),
        ]);
    }

    public function create()
    {
        return Inertia::render('Establishment/Form');
    }

    public function store(EstablishmentStoreRequest $request)
    {
        $input = $request->validated();

        $input['picture']            = Storage::disk(env('FILESYSTEM_DRIVER'))->put('images/establishmentPicture', $request->file('picture'));
        $input['background_picture'] = Storage::disk(env('FILESYSTEM_DRIVER'))->put('images/establishmentPicture', $request->file('background_picture'));
        $input['public_link_name']   = strtolower(str_replace(' ', '_', $input['name']));

        $request->user()->establishments()->create($input);

        return Redirect::route('establishmentIndex')->with('success', 'Estabelecimento criado com sucesso!.');
    }

    public function show(Establishment $establishment)
    {
    }

    public function edit(Request $request, Establishment $establishment)
    {
        $establishment =  $request->user()->establishments()->findOrFail($establishment->id);

        return Inertia::render('Establishment/Form', ['establishment' => new EstablishmentResource($establishment)]);
    }

    public function update(Request $request, Establishment $establishment)
    {
        $establishment =  $request->user()->establishments()->findOrFail($establishment->id);

        if ($request->picture) {
            $establishment->picture =  Storage::disk(env('FILESYSTEM_DRIVER'))->put('images/establishmentPicture', $request->file('picture'));
        }
        if ($request->background_picture) {
            $establishment->background_picture =  Storage::disk(env('FILESYSTEM_DRIVER'))->put('images/establishmentPicture', $request->file('background_picture'));
        }

        $establishment->name                 = $request->name;
        $establishment->description          = $request->description;
        $establishment->phone                = $request->phone;
        $establishment->delivery_time        = $request->delivery_time;
        $establishment->default_delivery_tax = $request->default_delivery_tax;
        $establishment->min_value            = $request->min_value;
        $establishment->need_confirm_order   = $request->need_confirm_order;

        $establishment->public_link_name = strtolower(str_replace(' ', '_', $request->name));

        $establishment->save();

        return Redirect::route('establishmentIndex')->with('success', 'Estabelecimento atualizado com sucesso!.');
    }

    public function destroy(Request $request, Establishment $establishment)
    {
        $request->user()->establishments()->findOrFail($establishment->id)->delete();

        return Redirect::back()->with('success', 'Estabelecimento Removido.');
    }

    public function customize(Request $request, Establishment $establishment)
    {
        $establishment =  $request->user()->establishments()->findOrFail($establishment->id);

        // $establishmentOpeningHours =  OpeningHoursResource::collection($establishment->openingHours);
        // if($establishment->openingHours()->count() !== 7) $establishmentOpeningHours = DaysOfWeek::List;

        $daysOfWeek = DaysOfWeek::List;

        return Inertia::render('Establishment/Customize', [
            'establishment' => new EstablishmentResource($establishment),
            'daysOfWeek'    => $daysOfWeek,
            'themesOptions' => ThemeResource::collection($request->user()->themes),
        ]);
    }

    public function showEstablishmentPublic($public_link_name)
    {
        $establishment =  Establishment::where('public_link_name', $public_link_name)->firstOrFail();

        session()->put('current_establishment', $establishment->id);

        $categories = $establishment->user->categories;

        return Inertia::render('Establishment/Menu/Index', [
            'establishment' => new EstablishmentResource($establishment),
            'categories'    => CategoryProductResource::collection($categories),
        ]);
    }
}
