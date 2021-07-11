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
        return array_merge(parent::share($request), [
            'establishment' => "AAAAAAAAAA"
        ]);
    }
}
