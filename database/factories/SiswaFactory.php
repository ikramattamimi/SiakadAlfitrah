<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Siswa;
use Faker\Generator as Faker;

$factory->define(Siswa::class, function (Faker $faker) {
    return [
        'nomor_induk' => $faker->randomNumber(9, true),
        'nis' => $faker->randomNumber(8, true),
        'nama_siswa' => $faker->name(),
        'jk' => $faker->randomElement(['L', 'P']),
        'telp' => $faker->randomNumber(12, true),
        'tmp_lahir' => $faker->word(),
        'tgl_lahir' => $faker->date(),
        'kelas_id' => $faker->numberBetween(1, 10),
        'foto' => $faker->word(),
    ];
});
