<?php

namespace App\Exports;

use App\Models\Lomba;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportExcelLomba implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lomba::all();
    }
    public function headings(): array
    {
        return [
            'no',
            'id_lomba',
            'nama_lomba',
            'tingkat_lomba',
            'tanggal_posting',
            'tanggal_berakhir',
            'deskripsi',
            'foto'
        ];
    }
}