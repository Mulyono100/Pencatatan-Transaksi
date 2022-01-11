<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\barang;
use App\kategoribarang;
use App\Model;
use Faker\Generator as Faker;


$factory->define(barang::class, function (Faker $faker) {
    $kategori = \App\kategoribarang::all();
    foreach ($kategori as $id) {
        // dd($kategori);
        return [
            'id' => $faker->ean8,
            'kode' => $faker->postcode,
            'nama' => $faker->city,
            'kategoribarang_id' => $id->id,
            'stock' => $faker->randomDigit,
            'satuan' => $faker->city
        ];
    }
});
