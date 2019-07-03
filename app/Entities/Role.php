<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Role extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'title', 'level'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'int',
        'level' => 'int',
    ];

    /**
     * The abilities relationship.
     *
     * @return MorphToMany
     */
    public function abilities()
    {
        return $this->morphToMany(
            'App\Entities\Ability',
            'entity',
            'permissions'
        )->withPivot('forbidden', 'scope');
    }

    public function allow($ability = null, $model = null)
    {

    }
}
