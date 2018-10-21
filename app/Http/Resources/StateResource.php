<?php

namespace App\Http\Resources;

use App\Http\Resources\CityResource;
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
            'zone' => $this->zone->zone,
            'latitude' => $this->lat,
            'longitude' => $this->lon,
            'lgas' => $this->when($request->has('lgas'), CityResource::collection($this->lgas)),
            'cities' => $this->when($request->has('cities'), CityResource::collection($this->cities)),
            $this->mergeWhen($request->has('total'), [
                'total' => [
                    'lgas' => $this->lgas->count(),
                    'cities' => $this->cities->count()
                ]
            ])
        ];
    }
}
