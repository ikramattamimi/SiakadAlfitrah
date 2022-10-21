<?php

use App\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 300; $i++) {
            DB::table('siswa')->insert([
                'no_induk' => $faker->unique()->randomNumber(4, true),
                'nis' => $faker->unique()->randomNumber(4, true),
                'nama_siswa' => $faker->name(),
                'jk' => $faker->randomElement(['L', 'P']),
                'telp' => $faker->randomNumber(4, true),
                'tmp_lahir' => $faker->word(),
                'tgl_lahir' => $faker->date(),
                'kelas_id' => $faker->numberBetween(1, 10),
                'foto' => $faker->word(),
            ]);
        }
    }
}
