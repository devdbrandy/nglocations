<?php

namespace App\Models;

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
