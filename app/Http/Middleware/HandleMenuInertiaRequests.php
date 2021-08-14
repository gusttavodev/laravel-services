<?php

namespace App\Http\Middleware;

use App\Models\Establishment\Establishment;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleMenuInertiaRequests extends Middleware
{
    public function share(Request $request)
    {
        $establishment = Establishment::where('public_link_name', $request->public_link_name)->firstOrFail();

        return array_merge(parent::share($request), [
            'establishment' => $establishment,
        ]);
    }
}
