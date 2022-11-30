<?php

namespace App\Exports;

use App\Models\AbsenSiswa;
use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class AbsenSiswaExport implements FromCollection, WithHeadings, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return ["Tanggal", "Nama Siswa", "Kelas", "Status Absensi"];
    }

    public function collection()
    {
        $absen = Siswa::join('absensi_siswa', 'siswa.id', '=', 'absensi_siswa.siswa_id')
            ->join('kehadiran', 'kehadiran.id', '=', 'absensi_siswa.kehadiran_id')
            ->join('kelas', 'kelas.id', '=', 'siswa.kelas_id')
            ->select('absensi_siswa.tanggal', 'siswa.nama_siswa', 'kelas.nama_kelas', 'kehadiran.ket')
            ->orderByDesc('absensi_siswa.tanggal')
            ->orderBy('kelas.nama_kelas')
            ->get();
        return $absen;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {

                $event->sheet->getDelegate()->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('C')->setAutoSize(true);
            },
        ];
    }
}
