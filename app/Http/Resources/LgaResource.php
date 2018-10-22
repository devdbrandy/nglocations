<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LgaResource extends JsonResource
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
            'state' => $this->when($request->has('state'), $this->state->name),
            'name' => $this->name,
            'alias' => $this->alias,
            'latitude' => $this->lat,
            'longitude' => $this->lon,
        ];
    }
}
