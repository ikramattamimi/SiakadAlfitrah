<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 30; $i++) {
            DB::table('guru')->insert([
                'nip' => $faker->unique()->randomNumber(4, true),
                'nama_guru' => $faker->name(),
                'mapel_id' => $faker->numberBetween(1, 11),
                'jk' => $faker->randomElement(['L', 'P']),
                'telp' => $faker->randomNumber(4, true),
                'tmp_lahir' => $faker->word(),
                'tgl_lahir' => $faker->date(),
            ]);
        }
    }
}
