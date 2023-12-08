<?php

namespace App\Exports;

use Illuminate\Http\Request;
use App\Models\Prestasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportExcelPrestasi implements FromCollection, WithHeadings
{
    use Exportable;

    public function collection()
    {
        return Prestasi::all();
    }

    public function headings(): array
    {
        return [
            'no',
            'id_prestasi',
            'nim',
            'nama_prestasi',
            'dokumen',
            'tingkat_prestasi',
            'tanggal_pengeluaran',
            'tahun_angkatan',
            'jenis_sertifikat',
            'status_verifikasi',
            'waktu dibuat',
            'waktu diubah'
        ];
    }
}
