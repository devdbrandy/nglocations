<?php

namespace App\Http\Resources;

use App\Http\Resources\CityResource;
use Illuminate\Http\Resources\Json\JsonResource;

class StateCollection extends JsonResource
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
            'alias' => $this->alias,
            'capital' => $this->when($request->has('capital'), $this->capital),
            'href' => route('api.states.show', $this->alias),
            'lgas' => $this->when($request->has('lgas'), CityResource::collection($this->lgas)),
            'cities' => $this->when($request->has('cities'), CityResource::collection($this->cities)),
            $this->mergeWhen($request->has('total'), [
                'total' => [
                    'lgas' => $this->lgas->count(),
                    'cities' => $this->cities->count(),
                ],
            ]),
        ];
    }
}
