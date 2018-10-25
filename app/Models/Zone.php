<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
* @OA\Schema(
*     @OA\Property(
*         property="code",
*         type="string",
*         description="The unique identifier for the zone resource"
*     ),
*     @OA\Property(
*         property="name",
*         type="string",
*         description="The zone name"
*     )
* )
*
*/
class Zone extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'zones';

    /**
     * The table default primary key.
     *
     * @var string
     */
    protected $primaryKey = 'code';

    /**
     * Define the primary key type.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the cities for the state.
     */
    public function states()
    {
        return $this->hasMany(State::class, 'zone_code', 'code');
    }
}
