<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryProductResource extends JsonResource
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
            'picture' =>   Storage::url($this->picture),
            'priority' => $this->priority,
            'enable' => $this->enable,

            'products' => ProductResource::collection($this->products),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
