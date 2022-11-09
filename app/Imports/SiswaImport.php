<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Models\Kelas;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiswaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $kelas = Kelas::where('nama_kelas', $row[3])->first();
        if ($row[2] == 'L') {
            $foto = 'uploads/siswa/52471919042020_male.jpg';
        } else {
            $foto = 'uploads/siswa/50271431012020_female.jpg';
        }
        DB::table('users')->insert([
            'name' => $row[0],
            'email' => $row[1],
            'password' => Hash::make($row[4]),
            'no_induk' => $row[1],
            'role' => 'Siswa',
        ]);

        return new Siswa([
            'nama_siswa' => $row[0],
            'no_induk' => $row[1],
            'jk' => $row[2],
            'foto' => $foto,
            'kelas_id' => $kelas->id,
        ]);
    }
}
