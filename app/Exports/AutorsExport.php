<?php

namespace App\Exports;

use App\Models\Autor;
use Maatwebsite\Excel\Concerns\FromCollection;

class AutorsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Autor::all();
    }
}
