<?php

namespace App\Models;

/**
 * @OA\Schema(
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="The city name"
 *     ),
 *     @OA\Property(
 *         property="alias",
 *         type="string",
 *         description="The city alias"
 *     ),
 * )
 *
 * @OA\Schema(
 *     schema="Cities",
 *     type="array",
 *     description="A list of Cities",
 *     @OA\Items(ref="#/components/schemas/City")
 * )
 *
 */
class City extends BaseModel
{
    /**
     * Get the state that owns the city.
     */
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
}
