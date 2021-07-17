<?php

namespace App\Http\Middleware;

use Inertia\Middleware;
use Illuminate\Http\Request;
use App\Models\Establishment\Establishment;
use App\Http\Resources\Establishment\EstablishmentResource;

class HandleMenuInertiaRequests extends Middleware
{
    public function share(Request $request)
    {
        $establishment = Establishment::where('public_link_name', $request->public_link_name)->firstOrFail();
        return array_merge(parent::share($request), [
            'establishment' => $establishment
        ]);
    }
}
