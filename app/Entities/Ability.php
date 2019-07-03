<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Ability extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'abilities';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['name', 'title'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'int',
        'entity_id' => 'int',
        'only_owned' => 'boolean',
    ];

    /**
     * The roles relationship.
     *
     * @return MorphToMany
     */
    public function roles()
    {
        return $this->morphedByMany(
            'App\Entities\Role',
            'entity',
            'permissions'
        )->withPivot('forbidden', 'scope');
    }
}
