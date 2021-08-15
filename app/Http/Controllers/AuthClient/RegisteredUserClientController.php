<?php

namespace App\Http\Controllers\AuthClient;

use App\Http\Controllers\Controller;
use App\Http\Resources\Establishment\EstablishmentResource;
use App\Models\Establishment\Establishment;
use App\Models\User\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class RegisteredUserClientController extends Controller
{
    public function create($public_link_name)
    {
        $establishment =  Establishment::where('public_link_name', $public_link_name)->firstOrFail();

        return Inertia::render('Auth/Register', [
            'establishment'         => new EstablishmentResource($establishment),
            'type'                  => 'client',
        ]);
    }

    public function store($public_link_name, Request $request)
    {
        $establishment =  Establishment::where('public_link_name', $public_link_name)->firstOrFail();

        $request->validate([
            'name'              => 'required|string|max:255',
            'phone'             => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users',
            'password'          => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([
            'name'             => $request->name,
            'phone'            => $request->phone,
            'email'            => $request->email,
            'password'         => Hash::make($request->password),
            'establishment_id' => $establishment->id,
        ]);

        $user->assignRole('user');

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('establishmentShowPublic', $establishment->public_link_name));
    }
}
