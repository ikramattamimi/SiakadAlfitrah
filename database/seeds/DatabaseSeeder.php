<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KelasSeeder::class);
        $this->call(MapelSeeder::class);
        $this->call(HariSeeder::class);
        $this->call(KehadiranSeeder::class);
        $this->call(RuangSeeder::class);
        $this->call(UsersSeeder::class);
        // $this->call(SiswaSeeder::class);
        // $this->call(GuruSeeder::class);
        // $this->call(JadwalSeeder::class);
    }
}
