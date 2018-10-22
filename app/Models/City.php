<?php

namespace App\Models;

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
