<?php

namespace App\Exports;

use App\Models\Category;
use App\Models\Procedure;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProcedureExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Procedure::all();
    }
}
