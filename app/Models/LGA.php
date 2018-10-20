<?php

namespace App\Models;

use App\Models\BaseModel;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class LGA extends BaseModel
{
    use HasSlug;

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'lgas';
}
