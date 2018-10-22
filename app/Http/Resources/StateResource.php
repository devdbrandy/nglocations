<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StateResource extends JsonResource
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
            'code' => $this->code,
            'name' => $this->name,
            'capital' => $this->capital,
            'alias' => $this->alias,
            'zone' => $this->getZone(),
            'latitude' => $this->lat,
            'longitude' => $this->lon,
        ];
    }
}
