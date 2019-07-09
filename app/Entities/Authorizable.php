<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Authorizable extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'authorizable';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'entity_id', 'entity'
    ];
}
