<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 300; $i++) {
            DB::table('jadwal')->insert([
                'hari_id' => $faker->numberBetween(1, 5),
                'kelas_id' => $faker->numberBetween(1, 10),
                'mapel_id' => $faker->numberBetween(1, 10),
                'guru_id' => $faker->numberBetween(1, 3),
                'jam_mulai' => $faker->time('H:i:s'),
                'jam_selesai' => $faker->time('H:i:s'),
                'ruang_id' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
