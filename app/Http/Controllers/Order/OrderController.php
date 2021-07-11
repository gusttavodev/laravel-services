<?php

namespace App\Http\Controllers\Order;

use Inertia\Inertia;
use App\Models\Order\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Resources\Order\OrderResource;
use App\Models\Establishment\Establishment;
use App\Http\Requests\Order\EstablishmentOrderStoreRequest;
use App\Http\Resources\Establishment\EstablishmentResource;

class OrderController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index(Request $request)
    {
        // $orders = $request->user()->additionals();
        $orders = Order::where('id', '>', 0);

        return Inertia::render('Order/Index', [
            'orders' => OrderResource::collection($orders->paginate(5))
        ]);
    }

    public function establishmentOrderCreate($public_link_name)
    {
        $establishment =  Establishment::where('public_link_name', $public_link_name)->firstOrFail();

        return Inertia::render('Establishment/Menu/Order', [
            'establishment' => new EstablishmentResource($establishment)
        ]);
    }
}
