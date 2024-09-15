<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Procedure;
use App\Models\Subcategory;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class ProcedureImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Procedure([
            'number' => $row[0],
            'title' => $row[1],
            'subcategory_id' => Subcategory::where('title', $row[2])->first()->id,
            'status' => $row[3],
            'procurement_method' => $row[4],
            'type' => $row[5],
            'start' => gmdate('Y-m-d', (($row[6] - 25569) * 86400)),
            'finish' => gmdate('Y-m-d', (($row[7] - 25569) * 86400)),
            'url' => $row[8]
        ]);
    }
}
