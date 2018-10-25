<?php

namespace App\Models;

/**
 * @OA\Schema(
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="The LGA name"
 *     ),
 *     @OA\Property(
 *         property="alias",
 *         type="string",
 *         description="The LGA alias"
 *     ),
 *     @OA\Property(
 *         property="latitude",
 *         type="string",
 *         description="The LGA latitude cordinate"
 *     ),
 *     @OA\Property(
 *         property="longitude",
 *         type="string",
 *         description="The LGA longitude cordinate"
 *     ),
 * )
 */
class LGA extends BaseModel
{
    use StateTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lgas';

    /**
     * Get the state that owns the lga.
     */
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
}
