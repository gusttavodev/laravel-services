<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\UpdateAddressRequest;
use App\Http\Requests\User\Profile\UpdateProfileRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index(Request $request)
    {
        $user = new UserResource($request->user());

        return Inertia::render('User/Profile/Index', [
            'user' => $user,
        ]);
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $input = $request->validated();
        $user  = $request->user();

        $user->update($input);

        return Redirect::route('profileIndex')->with('success', 'Informações de Acesso Atualizadas.');
    }

    public function updateAddress(UpdateAddressRequest $request)
    {
        $input = $request->validated();
        $user  = $request->user();

        $user->address()->update($input);

        return Redirect::route('profileIndex')->with('success', 'Endereço de Entrega Atualizado.');
    }
}
