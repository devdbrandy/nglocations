<?php

namespace App\Models;

/**
 * Helper function for eager loading state resources
 */
trait StateTrait
{
    /**
     * Get the name of the state that owns the lga
     *
     * @return void
     */
    public function getState()
    {
        return $this->state->name;
    }

    /**
     * Get the alias of the state that owns the lga
     *
     * @return void
     */
    public function getStateAlias()
    {
        return $this->state->alias;
    }
}
