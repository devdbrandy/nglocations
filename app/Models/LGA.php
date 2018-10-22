<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\StateTrait;

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
