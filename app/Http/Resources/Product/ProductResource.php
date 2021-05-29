<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Product\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Product\AdditionalResource;

class ProductResource extends JsonResource
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
            'picture' =>   asset('/imagecache/medium/'.$this->picture),
            'priority' => $this->priority,
            'enable' => $this->enable,

            'price' => $this->price,
            'description' => $this->description,

            'categories' => CategoryResource::collection($this->categories),
            'additionals' => AdditionalResource::collection($this->additionals),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
