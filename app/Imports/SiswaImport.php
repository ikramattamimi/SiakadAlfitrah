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
        $kelas = Kelas::where('nama_kelas', $row[5])->first();
        if ($row[2] == 'L') {
            $foto = 'uploads/siswa/52471919042020_male.jpg';
        } else {
            $foto = 'uploads/siswa/50271431012020_female.jpg';
        }
        DB::table('users')->insert([
            'name' => $row[1],
            'email' => $row[0],
            'password' => Hash::make($row[7]),
            'no_induk' => $row[0],
            'role' => 'Siswa',
        ]);

        return new Siswa([
            'no_induk' => $row[0],
            'nama_siswa' => $row[1],
            'jk' => $row[2],
            'tmp_lahir' => $row[3],
            'foto' => $foto,
            'nis' => $row[4],
            'kelas_id' => $kelas->id,
            'tgl_lahir' => $row[6],
        ]);
    }
}
