<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Entities\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    $word = $faker->word;

    return [
        'name' => $word,
        'title' => ucfirst($word),
    ];
});
