<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id'       => $this->id,
            'name'     => $this->name,
            'picture'  => asset('/imagecache/large/' . $this->picture),
            'priority' => $this->priority,
            'enable'   => $this->enable,

            'price'       => number_format((float) $this->price, 2, '.', ''),
            'description' => $this->description,

            'categories'  => CategoryResource::collection($this->categories),

            'additionals' => AdditionalWithNotProductResource::collection($this->additionals),

            'unity_price'       => number_format((float) $this?->pivot?->unity_price, 2, '.', ''),
            'quantity'          => $this?->pivot?->quantity,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
