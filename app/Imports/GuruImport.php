<?php

namespace App\Imports;

use App\Models\Guru;
use App\Models\User;
use App\Models\Mapel;
use Maatwebsite\Excel\Concerns\ToModel;

class GuruImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $max = Guru::max('id');
        $kode = $max + 1;
        if (strlen($kode) == 1) {
            $id = "0000" . $kode;
        } else if (strlen($kode) == 2) {
            $id = "000" . $kode;
        } else if (strlen($kode) == 3) {
            $id = "00" . $kode;
        } else if (strlen($kode) == 4) {
            $id = "0" . $kode;
        } else {
            $id = $kode;
        }
        $mapel = Mapel::where('nama_mapel', $row[3])->first();
        if ($row[2] == 'L') {
            $foto = 'uploads/guru/35251431012020_male.jpg';
        } else {
            $foto = 'uploads/guru/23171022042020_female.jpg';
        }

        return new Guru([
            'id' => $id,
            'nama_guru' => $row[0],
            'nip' => $row[1],
            'jk' => $row[2],
            'foto' => $foto,
            'mapel_id' => $mapel->id,
            'password' => $row[4],
        ]);

        return new User([
            'name' => $row[0],
            'role' => 'Guru',
            'password' => $row[5],
        ]);
    }
}
