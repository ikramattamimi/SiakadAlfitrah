<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            'nama_kelas' => 'Kelas A',
            'guru_id' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('kelas')->insert([
            'nama_kelas' => 'Kelas B',
            'guru_id' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('kelas')->insert([
            'nama_kelas' => 'Kelas C',
            'guru_id' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('kelas')->insert([
            'nama_kelas' => 'Kelas D',
            'guru_id' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('kelas')->insert([
            'nama_kelas' => 'Kelas E',
            'guru_id' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('kelas')->insert([
            'nama_kelas' => 'Kelas F',
            'guru_id' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('kelas')->insert([
            'nama_kelas' => 'Kelas G',
            'guru_id' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('kelas')->insert([
            'nama_kelas' => 'Kelas H',
            'guru_id' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('kelas')->insert([
            'nama_kelas' => 'Kelas I',
            'guru_id' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('kelas')->insert([
            'nama_kelas' => 'Kelas J',
            'guru_id' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
