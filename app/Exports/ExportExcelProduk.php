<?php

namespace App\Exports;

use App\Models\Lomba;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportExcelProduk implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lomba::all();
    }
}
