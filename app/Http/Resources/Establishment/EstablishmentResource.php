<?php

namespace App\Http\Resources\Establishment;

use Illuminate\Support\Facades\Storage;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Establishment\ThemeResource;
use App\Http\Resources\Establishment\AddressResource;
use App\Http\Resources\Establishment\OpeningHoursResource;

class EstablishmentResource extends JsonResource
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
            'public_link_name' => $this->public_link_name,
            'name' => $this->name,
            'description' => $this->description,
            'phone' => $this->phone,
            'picture' => Storage::url($this->picture),
            'background_picture' => Storage::url($this->background_picture),
            'delivery_time' => $this->delivery_time,

            'default_delivery_tax' => number_format((float)$this->default_delivery_tax, 2, '.', ''),
            'min_value' => number_format((float)$this->min_value, 2, '.', ''),

            'address' => new  AddressResource($this->address),
            'opening_hours' => OpeningHoursResource::collection($this->openingHours),
            'theme' => new ThemeResource($this->theme),
            'user' => new UserResource($this->user),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
