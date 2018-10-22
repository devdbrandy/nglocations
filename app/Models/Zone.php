<?php

namespace App\Models;

use App\Models\State;
use Illuminate\Database\Eloquent\Model;

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
     * @var boolean
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
