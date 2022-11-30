<?php

namespace App\Exports;

use App\Models\Absen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Reader\Xml\Style\NumberFormat;

class AbsenGuruExport implements FromCollection, WithHeadings, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function headings(): array
    {
        return ["Tanggal", "Nama Guru", "Status Absensi"];
    }

    public function collection()
    {
        $absen = Absen::join('guru', 'guru.id', '=', 'absensi_guru.guru_id')
            ->join('kehadiran', 'kehadiran.id', '=', 'absensi_guru.kehadiran_id')
            ->select('absensi_guru.tanggal', 'guru.nama_guru', 'kehadiran.ket')
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
