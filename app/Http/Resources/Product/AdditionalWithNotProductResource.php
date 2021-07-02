<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class AdditionalWithNotProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => number_format((float)$this->price, 2, '.', ''),
            'quantity_limit' => (int) $this->quantity_limit,

            'user_id' => $this->user_id
        ];
    }
}
