<?php

namespace App\Models;

use App\Models\BaseModel;

class City extends BaseModel
{
    /**
     * The table default primary key
     *
     * @var string
     */
    protected $primaryKey = 'alias';

    /**
     * Define the primary key type
     *
     * @var string
     */
    protected $keyType = 'string';
}
