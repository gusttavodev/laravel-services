<?php

namespace App\Http\Middleware;

use App\Http\Resources\Establishment\EstablishmentResource;
use App\Models\Establishment\Establishment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Middleware;

class HandleMenuInertiaRequests extends Middleware
{
    public function share(Request $request)
    {
        if (Session::get('current_establishment')) {
            $establishment = Establishment::findOrFail(Session::get('current_establishment'));
        } else {
            $establishment = Establishment::where('public_link_name', $request->public_link_name)->firstOrFail();
        }

        return array_merge(parent::share($request), [
            'establishment' => new EstablishmentResource($establishment),
        ]);
    }
}
