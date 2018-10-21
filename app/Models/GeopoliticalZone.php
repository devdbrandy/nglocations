<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeopoliticalZone extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'gp_zones';

    /**
     * The table default primary key
     *
     * @var string
     */
    protected $primaryKey = 'code';

    /**
     * Define the primary key type
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the model should be timestamped
     *
     * @var boolean
     */
    public $timestamps = false;
}
