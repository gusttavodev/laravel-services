<?php

namespace App\Http\Controllers\Order;

use Inertia\Inertia;
use App\Models\Order\Order;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Resources\Order\OrderResource;
use App\Models\Establishment\Establishment;
use App\Http\Requests\Order\StoreOrderRequest;
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

    public function establishmentOrderCreate(Request $request, $public_link_name)
    {
        $establishment =  Establishment::where('public_link_name', $public_link_name)->firstOrFail();

        // If User Not Registered go to register
        if(empty($request->user())){
            return Inertia::render('Establishment/Menu/Order/Register', [
                'establishment' => new EstablishmentResource($establishment)
            ]);
        }

        $deliveryOptions = Order::DELIVERY_MODES;
        $paymentModeOptions = Order::PAYMENT_MODES;
        return Inertia::render('Establishment/Menu/Order/Steps/Index', [
            'establishment' => new EstablishmentResource($establishment),
            'delivery_mode_options' =>  $deliveryOptions,
            'payment_mode_options' =>  $paymentModeOptions
        ]);

    }

    public function store(StoreOrderRequest $request)
    {
        $input = $request->validated();

        /*
            TODO  Implementar Troco cao seja dinheiro
            $table->boolean('need_change')->default(0);
            $table->decimal('change_price', 8, 2);
        */

        $input['change_price'] = 0;
        $input['total_price'] = 0;

        $order = Order::create($input);

        foreach ($input['products'] as $productKey => $productValue) {
            $selectedProduct = Product::find($productValue['id']);
            $orderProduct = $order->products()->save(
                $selectedProduct,
                [
                    'quantity' => $productValue['quantity'],
                    'unity_price' => $selectedProduct->price
                ]
            );
            foreach ($productValue['additionals'] as $additionalKey => $additionalValue) {
                $selectedAdditional = $selectedProduct->additionals()->find($additionalValue["id"]);
                $orderProduct->order_additionals()->save($selectedAdditional,  [
                    'quantity' => $additionalValue['quantity'],
                    'unity_price' => $selectedAdditional->price,
                    'order_id' => $order->id
                ]);
            }
        }

        $additionalsPrice = $order->additionals_total_price;
        $productsPrice = $order->products_total_price;

        $order->update([
            'total_price' => $productsPrice + $additionalsPrice
        ]);

        response()->json(["data" => $order]);
    }
}
