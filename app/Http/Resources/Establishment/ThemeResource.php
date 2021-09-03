<?php

namespace App\Http\Resources\Establishment;

use Illuminate\Http\Resources\Json\JsonResource;

class ThemeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'   => $this->id,
            'name' => $this->name,

            'colors_settings'      => (array) $this->formatColor($this->colors),
            'colors'               => (array) $this->colors,
        ];
    }

    private function formatColor($colors): array
    {
        $formated = [];

        foreach ($colors as $key => $value) {
            $formated['--' . str_replace('_', '-', $key)] = $value;
        }

        return $formated;
    }
}
