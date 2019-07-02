<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Entities\Ability;
use Faker\Generator as Faker;

$factory->define(Ability::class, function (Faker $faker) {
    $word = $faker->word;

    return [
        'name' => $word,
        'title' => ucfirst($word),
    ];
});
