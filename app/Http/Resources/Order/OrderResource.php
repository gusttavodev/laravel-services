<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\Establishment\AddressResource;
use App\Http\Resources\Establishment\EstablishmentResource;
use App\Http\Resources\Product\ProductResource;
use App\Models\Order\Order;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        $productsInvoice    = collect($this->invoice->toArray());

        // Create collection function
        $invoice =  $productsInvoice->map(function ($invoice) {
            $additionalsInvoice = collect($invoice['order_additionals']);

            return [
                'id'       => $invoice['id'],
                'name'     => $invoice['name'],
                'picture'  => asset('/imagecache/large/' . $invoice['picture']),

                'quantity'       => $invoice['pivot']['quantity'],
                'unity_price'    => number_format((float) $invoice['pivot']['unity_price'], 2, '.', ''),

                'additionals'       => $additionalsInvoice->map(function ($additional) {
                    return [
                        'id'              => $additional['additional_id'],
                        'name'            => $additional['name'],
                        'quantity'        => $additional['quantity'],
                        'unity_price'     => number_format((float) $additional['unity_price'], 2, '.', ''),
                    ];
                }),

                'order_total'       => 10,
            ];
        });

        return [
            'id' => $this->id,

            'contact_phone'   => (string) $this->contact_phone,
            'contact_name'    => (string) $this->contact_name,

            'need_change'   => $this->need_change,
            'change_price'  => $this->change_price,
            'total_price'   => $this->total_price,
            'delivery_tax'  => $this->delivery_tax,
            'tracking_link' => $this->tracking_link,

            'status'        => $this->status,

            'status_label'        => Order::STATUSES[$this->status],
            'payment_mode_label'  => Order::PAYMENT_MODES[$this->payment_mode],
            'delivery_mode_label' => Order::DELIVERY_MODES[$this->delivery_mode],

            'delivery_mode' => $this->delivery_mode,

            'invoice' => $invoice,

            // 'user' => !empty($this->user) ? UserResource::collection($this->user) : null,
            // 'wpp_user' => !empty($this->wppUser) ? WppUserResource::collection($this->wppUser) : null,

            // 'user' => !empty($this->user_id) ? UserResource::collection($this->user) : null,
            // 'wpp_user' => !empty($this->wppUser) ? $this->wppUser : null,

            'wpp_user' => !empty($this->wppUser) ? $this->wppUser : null,
            'user'     => !empty($this->user) ? $this->user : null,

            'date' => Carbon::parse($this->created_at)->format('d/m/Y'),

            'establishment' => new EstablishmentResource($this->establishment),
            'address'       => new AddressResource($this->address),

            'products'       => ProductResource::collection($this->products),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
