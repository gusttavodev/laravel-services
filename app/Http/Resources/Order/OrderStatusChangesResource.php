<?php

namespace App\Http\Resources\Order;

use App\Models\Order\Order;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class OrderStatusChangesResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'status'       => $this->status,
            'status_label' => Order::STATUSES[$this->status],

            'date' => Carbon::parse($this->created_at)->format('d/m/Y'),
            'time' => Carbon::parse($this->created_at)->format('H:i'),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
