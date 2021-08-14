<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Establishment\AddressResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UserResource extends JsonResource
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
            'id'      => $this->id,
            'name'    => $this->name,
            'phone'   => $this->phone,
            'picture' => Storage::url($this->picture),
            'email'   => $this->email,

            'roles' => $this->roles->pluck('name'),

            'address' => new AddressResource($this->address),

            'email_verified_at' => $this->email_verified_at,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
        ];
    }
}
