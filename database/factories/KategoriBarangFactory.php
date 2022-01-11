<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\kategoribarang;
use App\Model;
use App\Suplier;
use Faker\Generator as Faker;

$factory->define(kategoribarang::class, function (Faker $faker) {
    return [
        'id' => $faker->ean8,
        'kategori' => $faker->jobTitle,
        'nama' => $faker->userName
    ];
});
