<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        ];
});
