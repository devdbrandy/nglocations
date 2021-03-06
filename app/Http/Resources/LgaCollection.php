<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LgaCollection extends JsonResource
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
            'state' => $this->getState(),
            'alias' => $this->getStateAlias(),
            'lga' => [
                'name' => $this->name,
                'alias' => $this->alias,
                'href' => route('api.lgas.show', $this->alias),
            ],
        ];
    }
}
