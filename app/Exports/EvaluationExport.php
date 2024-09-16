<?php

namespace App\Exports;

use App\Models\Evaluation;
use Maatwebsite\Excel\Concerns\FromCollection;

class EvaluationExport implements FromCollection
{
    public function collection()
    {
        return Evaluation::all();
    }
}
