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
