<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\WppUserResource;
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
        return [
            'id' => $this->id,

            'need_change'   => $this->need_change,
            'change_price'  => $this->change_price,
            'total_price'   => $this->total_price,
            'delivery_tax'  => $this->delivery_tax,
            'tracking_link' => $this->tracking_link,

            'status_label'        => Order::STATUSES[$this->status],
            'payment_mode_label'  => Order::PAYMENT_MODES[$this->payment_mode],
            'delivery_mode_label' => Order::DELIVERY_MODES[$this->delivery_mode],

            // 'user' => !empty($this->user) ? UserResource::collection($this->user) : null,
            // 'wpp_user' => !empty($this->wppUser) ? WppUserResource::collection($this->wppUser) : null,

            // 'user' => !empty($this->user_id) ? UserResource::collection($this->user) : null,
            // 'wpp_user' => !empty($this->wppUser) ? $this->wppUser : null,

            'wpp_user' => !empty($this->wppUser) ? $this->wppUser : null,
            'user'     => !empty($this->user) ? $this->user : null,

            'date' => Carbon::parse($this->created_at)->format('d/m/Y'),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
