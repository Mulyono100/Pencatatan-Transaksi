<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\suplier;

$factory->define(Suplier::class, function (Faker $faker) {
    return [
        'id' => $faker->ean8,
        'nama' => $faker->userName,
        'email' => $faker->email,
        'handphone' => $faker->numberBetween(890, 1000),
        'alamat' => $faker->address
    ];
});
