<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderUpdateRequest;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Resources\Establishment\EstablishmentResource;
use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\User\UserResource;
use App\Models\Establishment\Establishment;
use App\Models\Order\Order;
use App\Models\Product\Product;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Inertia\Inertia;

class OrderController extends Controller
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
        // $this->middleware('auth');
        // $this->middleware('verified');
    }

    public function index(Request $request)
    {
        $establishments = Establishment::where('user_id', $request->user()->id)->get();
        $orders         = Order::whereIn('establishment_id', $establishments->pluck('id'));

        return Inertia::render('Order/Index', [
            'orders' => OrderResource::collection($orders->paginate(5)),
        ]);
    }

    public function establishmentOrderCreate(Request $request, $public_link_name)
    {
        $establishment =  Establishment::where('public_link_name', $public_link_name)->firstOrFail();

        // If User Not Registered go to register
        if (empty($request->user())) {
            return Inertia::render('Establishment/Menu/Order/Register', [
                'establishment' => new EstablishmentResource($establishment),
            ]);
        }

        $deliveryOptions    = Order::DELIVERY_MODES;
        $paymentModeOptions = Order::PAYMENT_MODES;

        return Inertia::render('Establishment/Menu/Order/Steps/Index', [
            'user'                  => new UserResource($request->user()),
            'establishment'         => new EstablishmentResource($establishment),
            'delivery_mode_options' => $deliveryOptions,
            'payment_mode_options'  => $paymentModeOptions,
        ]);
    }

    public function store(StoreOrderRequest $request)
    {
        $input = $request->validated();

        $establishment = Establishment::find($input['establishment_id']);

        $input['change_price'] = 0;
        $input['total_price']  = 0;
        $input['user_id']      = $request->user()->id;

        $order = $establishment->orders()->create($input);

        // TODO link product to establishment
        // TODO validate establishment has this products
        // TODO store address

        $this->orderService->storeOrderProducts($input['products'], $order);

        $this->orderService->storeOrderPrice(
            $order,
            $input['payment_mode'],
            $input['need_change'],
            floatval($input['value_paid_cash'])
        );

        $order->update(['tracking_link' =>  Str::random(20)]);

        return Redirect::route('establishmentOrderShow', [
            'tracking_link'    => $order->tracking_link,
            'public_link_name' => $establishment->public_link_name,
        ]);
    }

    public function establishmentOrderShow(Request $request, $public_link_name, $tracking_link)
    {
        $order              =  Order::where('tracking_link', $tracking_link)->firstOrFail();
        $establishment      =  $order->establishment;
        $orderStatusChanges =  $this->orderService->formatOrderStatusChanges($order->statusChanges);

        // If User Not Registered go to register Middleware to this
        if (empty($request->user())) {
            return Inertia::render('Establishment/Menu/Order/Register', [
                'establishment' => new EstablishmentResource($establishment),
            ]);
        }

        return Inertia::render('Establishment/Menu/Order/Tracking/Index', [
            'order'              => new OrderResource($order),
            'establishment'      => new EstablishmentResource($establishment),
            'orderStatusChanges' => $orderStatusChanges,
        ]);
    }

    public function edit(Order $order)
    {
        $statusOptions = Order::STATUSES;

        $orderStatusChanges =  $this->orderService->formatOrderStatusChanges($order->statusChanges);

        return Inertia::render('Order/Form', [
            'order'               => new OrderResource($order),
            'orderStatusChanges'  => $orderStatusChanges,
        ]);
    }

    public function update(OrderUpdateRequest $request, Order $order)
    {
        $input = $request->validated();

        $order->update($input);

        return Redirect::route('orderEdit', $order->id)->with('success', 'Pedido atualizado com sucesso !!!.');
    }

    public function orderNextStatus(Order $order)
    {
        if ($order->status + 1 < 5) {
            $order->update(['status' => $order->status + 1]);

            return Redirect::route('orderEdit', $order->id)->with('success', 'Status do Pedido Atualizado com sucesso !!!.');
        }
    }
}
