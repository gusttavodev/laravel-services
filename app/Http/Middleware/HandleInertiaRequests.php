<?php

namespace App\Http\Middleware;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array
     */
    public function share(Request $request)
    {
        $user = null;
        if (!empty($request->user())) {
            $request->user()->picture = Storage::url($request->user()->picture);
            $user                     = new UserResource($request->user());
            // $user = $user['data'];
        }

        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $user,
            ],
            'flash' => function () use ($request) {
                return [
                    'success' => $request->session()->get('success'),
                    'error'   => $request->session()->get('error'),
                ];
            },
        ]);
    }
}
