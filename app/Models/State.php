<?php

namespace App\Models;

class State extends BaseModel
{
    /**
     * Get the geopolitical zone that owns the state.
     */
    public function zone()
    {
        return $this->belongsTo(Zone::class, 'zone_code', 'code');
    }

    /**
     * Get the cities for the state.
     */
    public function cities()
    {
        return $this->hasMany(City::class, 'state_id', 'id');
    }

    /**
     * Get the lgas for the state.
     */
    public function lgas()
    {
        return $this->hasMany(LGA::class, 'state_id', 'id');
    }

    /**
     * Get the name of the zone that owns the state.
     *
     * @return void
     */
    public function getZone()
    {
        return $this->zone->name;
    }
}
